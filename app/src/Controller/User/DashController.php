<?php
namespace App\Controller\User;

use App\Controller\AppController;
use Cake\I18n\Date;
use Cake\Utility\Hash;
use Cake\ORM\TableRegistry;

/**
 * Students Controller
 *
 * @property \App\Model\Table\StudentsTable $Students
 */
class DashController extends UserController
{

  public function index() {

    $studentTable = TableRegistry::get('Students');
    //print_r($this->request->session()->read('Auth.User'));
    $query = $studentTable->find('ownedBy', ['parent' => $this->request->session()->read('Auth.User')]);
    $students = $query->toArray();

    $this->set(compact('students'));
    $this->set('_serialize', ['students']);


  }
}

?>
