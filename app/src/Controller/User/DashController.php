<?php
namespace App\Controller\User;

use App\Controller\AppController;
use Cake\I18n\Date;
use Cake\Utility\Hash;
use Cake\ORM\TableRegistry;


class DashController extends UserController
{

  public function index() {

    $studentTable = TableRegistry::get('Students');
    $userTable = TableRegistry::get('Users');
    $userquery = $userTable->find('all')
      ->where(['Users.id =' => $this->request->session()->read('Auth.User.id')])
      ->limit(1);
    $query = $studentTable->find('ownedBy', ['parent' => $this->request->session()->read('Auth.User'), 'contain' => ['Coursegroups']]);
    $students = $query->toArray();
    $user = $userquery->first();

    $this->set(compact('students', 'user'));
    $this->set('_serialize', ['students', 'user']);


  }
}

?>
