<?php
namespace App\Controller\User;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;

/**
 * Classes Controller
 *
 * @property \App\Model\Table\ClassesTable $Classes
 */
class SwimclassesController extends UserController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Classevents']
        ];
        $classes = $this->paginate($this->Swimclasses);

        $this->set(compact('classes'));
        $this->set('_serialize', ['classes']);
    }

    /**
     * View method
     *
     * @param string|null $id Class id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $class = $this->Swimclasses->get($id, ['contain' => ['Classevents']]);

        $courses = $this->Swimclasses->Coursegroups->find()
          ->where(['swimclass_id' => $id ])
          ->contain(['Classevents' => ['Venues'], 'Students']);

        $venues = $this->Swimclasses->Venues->find('all');

        $this->set(compact('class', 'venues', 'courses'));
        $this->set('_serialize', ['class', 'venues', 'courses']);
    }

    public function book($id = null)
    {

      $user = TableRegistry::get('Users');
      $user = $user->get($this->request->session()->read('Auth.User.id'), [
          'contain' => ['Students']
      ]);
      $courses = $this->Swimclasses->get($id, [
          'contain' => [
            'Classevents' => [
                'conditions' => ['weeknum =' => 1, 'classdate >' => Date::now() ],
                'Coursegroups' => [
                  'Students'
                ],
                'Venues'
            ]
          ]
      ]);

      $class = $this->Swimclasses->get($id, ['contain' => ['Classevents' => ['Venues']]]);

      $this->set(compact('user', 'class', 'courses'));
      
    }
}
