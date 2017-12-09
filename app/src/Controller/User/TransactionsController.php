<?php
namespace App\Controller\User;

use App\Controller\AppController;
use Cake\I18n\Date;
use Cake\Utility\Hash;
use Cake\ORM\TableRegistry;
use Braintree;

class TransactionsController extends UserController
{
    public function index()
    {
        $this->paginate = [ 'contain' => [ 'Students' => ['conditions' => ['parent_id' => $this->request->session()->read('Auth.User.id')]], 'Coursegroups' ]];
        $transactions = $this->paginate($this->Transactions);



        $this->set(compact('transactions'));
        $this->set('_serialize', ['transactions']);
    }

    public function payment($data = null)
    {
      $user = TableRegistry::get('Users');
      $user = $user->get($this->request->session()->read('Auth.User.id'), [
          'contain' => ['Students']
      ]);
      $coursegroup = TableRegistry::get('Coursegroups');
      $coursegroup = $coursegroup->find('all', ['contain' => ['Swimclasses', 'Classevents']]);

      $this->set(compact('user', 'coursegroup'));
      $this->set('_serialize', ['user', 'coursegroup']);

    }

    public function checkout()
    {
        $studentTable = TableRegistry::get('Students');
        $coursegroupTable = TableRegistry::get('Coursegroups');
        $data = $this->request->data();
        $result = Braintree\Transaction::sale([
          'amount'              => $data['amount'],
          'paymentMethodNonce'  => $data['payment_method_nonce'],
          'customer' => [
             'firstName' => $this->request->session()->read('Auth.User.firstname'),
             'lastName' => $this->request->session()->read('Auth.User.lastname')
          ],
          'billing'    => [
              'firstName' => $this->request->session()->read('Auth.User.firstname'),
              'lastName' => $this->request->session()->read('Auth.User.lastname'),
              'streetAddress' => $this->request->session()->read('Auth.User.address1'),
              'extendedAddress' => $this->request->session()->read('Auth.User.address2'),
              'locality' => $this->request->session()->read('Auth.User.town'),
              'region' => $this->request->session()->read('Auth.User.county')
          ],
          'options' => [
              'submitForSettlement' => true,
              'storeInVault' => true,
              'addBillingAddressToPaymentMethod' => true
          ]
      ]);

        if ($result->success || !is_null($result->transaction)) {
            $transaction = $result->transaction;
            $tn = $this->Transactions->newEntity();
            $status = $this->testtransaction($transaction->id);
            $tndata = [
              'student_id' =>  $data['chosenstudent'],
              'coursegroup_id' => $data['chosencourse'],
              'braintreeid' => $transaction->id,
              'amount' => $data['amount'],
              'processorresponse' => $transaction->processorResponseText,
              'last4' => $transaction->creditCard['last4'],
              'cardtype' => $transaction->creditCard['cardType']
            ];
            $tn = $this->Transactions->patchEntity($tn, $tndata);

            if ($status == "Success") {
                $student = $studentTable->get($data['chosenstudent']);
                $course = $coursegroupTable->get($data['chosencourse']);
                $studentTable->Coursegroups->link($student, [$course]);
                $this->Transactions->save($tn);
                $this->Flash->success(__('Thank you, your payment was successful.'));
                return $this->redirect('/user/transactions');
            } else {
                $this->Transactions->save($tn);
                $this->Flash->error(__('The transaction failed.' . $status));
                return $this->redirect('/user/transactions/payment');
            }
        } else {
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
                $this->Flash->error(__('The transaction failed.' . $errorString));
                return $this->redirect('/user/transactions/payment');
            }
        }
    }

    private function testtransaction($result)
    {
        $transaction = Braintree\Transaction::find($result);

        $transactionSuccessStatuses = [
          Braintree\Transaction::AUTHORIZED,
          Braintree\Transaction::AUTHORIZING,
          Braintree\Transaction::SETTLED,
          Braintree\Transaction::SETTLING,
          Braintree\Transaction::SETTLEMENT_CONFIRMED,
          Braintree\Transaction::SETTLEMENT_PENDING,
          Braintree\Transaction::SUBMITTED_FOR_SETTLEMENT
      ];

        if (in_array($transaction->status, $transactionSuccessStatuses)) {
            $header = "Sweet Success!";
            $icon = "success";
            $message = "Success";
            return $message;
        } else {
            $header = "Transaction Failed";
            $icon = "fail";
            $message = "Failed: " . $transaction->status;
            return $message;
        }
    }
}
