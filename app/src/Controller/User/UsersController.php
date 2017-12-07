<?php
namespace App\Controller\User;

use App\Controller\AppController;
use Cake\Event\Event;
use Braintree;
require("../vendor/braintree/braintree_php/lib/autoload.php");


/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends UserController
{

  //var $scaffold;

  # needed for 'register'
  var $helpers = array('Html', 'Form');

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function profile($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Students']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['prefix' => 'user', 'controller' => 'Dash', 'action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
            return $this->redirect(['prefix' => 'user', 'controller' => 'Dash', 'action' => 'index']);
        }
    }


    public function beforeFilter(Event $event)
    {
      parent::beforeFilter($event);
      $this->Auth->allow(['logout', 'register']);

    }

    public function register()
    {
      $user = $this->Users->newEntity();
      if ($this->request->is('post')) {
          $user = $this->Users->patchEntity($user, $this->request->getData());
          if ($this->Users->save($user)) {
              $this->Flash->success(__('Your account has been created, please sign in below.'));

              return $this->redirect('/user/users/login');
          }
          $this->Flash->error(__('The user could not be saved. Please, try again.'));
      }
      $this->set(compact('user'));
      $this->set('_serialize', ['user']);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $this->Flash->success(__('Thank you for logging in'));
                return $this->redirect('/user/dash');
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function logout()
    {
        $this->Auth->logout();
        return $this->redirect('/');
    }
}
