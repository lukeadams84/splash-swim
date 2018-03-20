<?php
namespace App\Controller\User;

use App\Controller\AppController;
use Cake\I18n\Date;
use Cake\Utility\Hash;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Mailer\MailerAwareTrait;
use Stripe;

class TransactionsController extends UserController
{

  use MailerAwareTrait;

    public function index()
    {
        $this->paginate = [ 'conditions' => ['Transactions.user_id' => $this->request->session()->read('Auth.User.id') ], 'contain' => [ 'Students', 'Coursegroups' ]];
        $transactions = $this->paginate($this->Transactions);
        $this->set(compact('transactions'));
        $this->set('_serialize', ['transactions']);
    }

    public function charge() {
      $studentTable = TableRegistry::get('Students');
      $coursegroupTable = TableRegistry::get('Coursegroups');
      $swimclassTable = TableRegistry::get('Swimclass');
      $userTable = TableRegistry::get('Users');
      $data = $this->request->data();
      $session = $this->request->session();

      $customer = \Stripe\Customer::create(array(
          'email' => $session->read('Auth.User.email'),
          'source'  => $data['stripeToken']
      ));

      $charge = \Stripe\Charge::create(array(
        'customer' => $customer->id,
        'amount'   => $data['amount'] * 100,
        'currency' => 'gbp',
        'description' => 'Splash Swim School - ' . $data['studentname']
      ));

      if ($charge->outcome->network_status == 'approved_by_network') {
          //$transaction = $result->transaction;
          $tn = $this->Transactions->newEntity();
          $tndata = [
            'student_id' =>  $data['chosenstudent'],
            'coursegroup_id' => $data['chosencourse'],
            'user_id' => $session->read('Auth.User.id'),
            'braintreeid' => $charge->id,
            'amount' => $data['amount'],
            'processorresponse' => $charge->outcome->seller_message,
            'last4' => $charge->source->last4,
            'cardtype' => $charge->source->brand,
            'type' => 'card'
          ];
          $tn = $this->Transactions->patchEntity($tn, $tndata);


              $student = $studentTable->get($data['chosenstudent']);
              $course = $coursegroupTable->get($data['chosencourse']);
              $swimclass = $swimclassTable->get($course['swimclass_id']);
              $swimclass = $swimclass->toArray();
              $studentTable->Coursegroups->link($student, [$course]);
              $this->Transactions->save($tn);
              $maildata = [
                'email' => $session->read('Auth.User.email'),
                'user' => $session->read('Auth.User.firstname'),
                'course' => $swimclass['name'],
                'student' => $student['firstname'],
                'price' => $data['amount'],
                'paymenttype' => 'card'
              ];
              $this->getMailer('User')->send('booking', [$maildata]);
              $this->Flash->success(__('Thank you, your payment for ' . $data['studentname'] . ' was successful.'));
              return $this->redirect('/user/students/profile/' . $data['chosenstudent']);

        } else {
          $errorString = "";

          foreach ($result->errors->deepAll() as $error) {
              $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
              $this->Flash->error(__('The transaction failed.' . $errorString));
              return $this->redirect('/user/students/profile/' . $data['chosenstudent']);
          }
      }
    }

}
