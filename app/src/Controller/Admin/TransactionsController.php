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

    public function payment($data = null)
    {
    }

    public function checkout()
    {
        $data = $this->request->data();
        $result = Braintree\Transaction::sale([
          'amount' => $data['amount'],
          'paymentMethodNonce' => $data['payment_method_nonce'],
          'options' => [
              'submitForSettlement' => true
          ]
      ]);

        if ($result->success || !is_null($result->transaction)) {
            $transaction = $result->transaction;
            $tn = $this->Transactions->newEntity();
            $status = $this->testtransaction($transaction->id);
            $tndata = [
              'student_id' =>  '1',
              'coursegroup_id' => '9',
              'braintreeid' => $transaction->id,
              'amount' => $data['amount'],
              'processorresponse' => $transaction->processorResponseText,
              'last4' => $transaction->creditCard['last4'],
              'cardtype' => $transaction->creditCard['cardType']
            ];
            $tn = $this->Transactions->patchEntity($tn, $tndata);

            if ($status == "Success") {

                $this->Transactions->save($tn);
                $this->Flash->success(__($status));
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
