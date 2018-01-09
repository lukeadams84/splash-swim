<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\I18n\Date;
use Cake\Utility\Hash;
use Cake\ORM\TableRegistry;
use Braintree;

class TransactionsController extends AdminController
{
    public function index()
    {
        $this->paginate = [
          'contain' => ['Students', 'Coursegroups']
      ];
        $transactions = $this->paginate($this->Transactions);

        $this->set(compact('transactions'));
        $this->set('_serialize', ['transactions']);
    }

    public function refund($id)
    {
        $studentTable = TableRegistry::get('Students');
        $coursegroupTable = TableRegistry::get('Coursegroups');
        $classeventsTable = TableRegistry::get('Classevents');
        $transactionData = $this->Transactions->get($id);
        $courseDetails = $coursegroupTable->get($transactionData['coursegroup_id']);
        $eventsleft = $classeventsTable->find('all', ['conditions' => ['coursegroup_id =' => $transactionData['coursegroup_id'], 'classdate >' => Date::now()]]);
        $eventsleft = count($eventsleft->toArray());
        $refundamount = ($courseDetails['price'] / $courseDetails['courselength']) * $eventsleft;

        $result = Braintree\Transaction::refund($transactionData['braintreeid'], $refundamount);
        if ($result->success || !is_null($result->transaction))
        {
          $transaction = $result->transaction;
          $tndata = [
            'braintreeid' => $transaction->id,
            'processorresponse' => 'Refunded',
            'refund' => $refundamount
          ];
          $this->Transactions->patchEntity($transactionData, $tndata, [ 'validate' => false ]);
          if($this->Transactions->save($transactionData))
          {
            $student = $studentTable->get($transactionData['student_id']);
            $course = $coursegroupTable->get($transactionData['coursegroup_id']);
            $studentTable->Coursegroups->unlink($student, [$course]);
            $this->Flash->success(__('The refund was successfully credited for £' . $refundamount));
            return $this->redirect('/admin/transactions');
        }
      }
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
             'firstName' => $data['firstname'],
             'lastName' => $data['surname'],
          ],
          'billing'    => [
              'firstName' => $data['firstname'],
              'lastName' => $data['surname'],
              'streetAddress' => $data['address1'],
              'extendedAddress' => $data['address2'],
              'locality' => $data['town'],
              'region' => $data['county'],
              'postalCode' => $data['postcode'],
          ],
          'options' => [
              'submitForSettlement' => true,
              'storeInVault' => true,
              'addBillingAddressToPaymentMethod' => true
          ]
      ]);

        if ($result->success || !is_null($result->transaction)) {
            $transaction = $result->transaction;
            $studentparent = $studentTable->get($data['chosenstudent']);
            $tn = $this->Transactions->newEntity();
            $status = $this->testtransaction($transaction->id);
            $tndata = [
              'student_id' =>  $data['chosenstudent'],
              'coursegroup_id' => $data['chosencourse'],
              'user_id' => $studentparent['parent_id'],
              'braintreeid' => $transaction->id,
              'amount' => $data['amount'],
              'processorresponse' => $transaction->processorResponseText,
              'last4' => $transaction->creditCard['last4'],
              'cardtype' => $transaction->creditCard['cardType'],
              'type' => 'card'
            ];
            $tn = $this->Transactions->patchEntity($tn, $tndata);

            if ($status == "Success") {
                $student = $studentTable->get($data['chosenstudent']);
                $course = $coursegroupTable->get($data['chosencourse']);
                $studentTable->Coursegroups->link($student, [$course]);
                $this->Transactions->save($tn);
                $this->Flash->success(__('Thank you, your payment was successful.'));
                return $this->redirect('/admin/transactions');
            } else {
                $this->Transactions->save($tn);
                $this->Flash->error(__('The transaction failed.' . $status));
                return $this->redirect('/admin/transactions');
            }
        } else {
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
                $this->Flash->error(__('The transaction failed.' . $errorString));
                return $this->redirect('/user/transactions');
            }
        }
    }

    public function cashpayment()
    {
        $studentTable = TableRegistry::get('Students');
        $coursegroupTable = TableRegistry::get('Coursegroups');
        $data = $this->request->data();

        $studentparent = $studentTable->get($data['chosenstudent']);
        $tn = $this->Transactions->newEntity();
        $tndata = [
          'student_id' =>  $data['chosenstudent'],
          'coursegroup_id' => $data['chosencourse'],
          'user_id' => $studentparent['parent_id'],
          'amount' => $data['amount'],
          'processorresponse' => 'Received',
          'type' => 'cash'
        ];
        $tn = $this->Transactions->patchEntity($tn, $tndata);
        $student = $studentTable->get($data['chosenstudent']);
        $course = $coursegroupTable->get($data['chosencourse']);
        $studentTable->Coursegroups->link($student, [$course]);
        $this->Transactions->save($tn);
        $this->Flash->success(__('Thank you, your payment was successful.'));
        return $this->redirect('/admin/transactions');
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
