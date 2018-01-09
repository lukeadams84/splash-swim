<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\I18n\Date;
use Cake\Utility\Hash;
use Cake\ORM\TableRegistry;


class DashController extends AdminController
{

  public function index() {

    $studentTable = TableRegistry::get('Students');
    $userTable = TableRegistry::get('Users');
    $transactionsTable = TableRegistry::get('Transactions');
    $contactsTable = TableRegistry::get('Contacts');

    $contacts = $contactsTable->find('all', ['conditions' => ['read =' => 0]]);

    $userquery = $userTable->find('all')
      ->where(['Users.role =' => 'parent']);
    $students = $studentTable->find('all', ['contain' => ['Coursegroups']]);
    //$transactions = $transactionsTable->find('all');
    $students = $students->toArray();
    $users = $userquery->toArray();


    $tquery = $transactionsTable->find('all', [
        'groupField' => ['created', 'amount']
    ]);

    $tquery->select([
      'month' => $tquery->func()->extract('month', 'created'),
      'revenue' => $tquery->func()->sum('amount'),
      'count' => $tquery->func()->count('amount')
    ])
      ->group(['created']);


    $transactions = $tquery->toArray();


    $this->set(compact('students', 'users', 'transactions', 'contacts'));
    $this->set('_serialize', ['students', 'users', 'transactions', 'contacts']);


  }

  public function chart() {

  }
}

?>
