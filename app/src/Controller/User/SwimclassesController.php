<?php
namespace App\Controller\User;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;
use Cake\Utility\Hash;

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
        $this->paginate = [];
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
      $courses = $this->Swimclasses->get($id, [
          'contain' => [
            'Classevents' => [
                'conditions' => ['weeknum =' => 1, 'classdate >' => Date::now() ],
                'sort' => ['classdate' => 'ASC'],
                'Coursegroups' => [
                  'Students'
                ],
                'Venues'
            ]
          ]
      ]);

        $venues = $this->Swimclasses->Venues->find('all');

        $this->set(compact('venues', 'courses'));
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
                'sort' => ['classdate' => 'ASC'],
                'Coursegroups' => [
                  'Students'
                ],
                'Venues'
            ]
          ]
      ]);
      $this->set(compact('user', 'courses'));

    }

    public function bookip($id = null)
    {

      $user = TableRegistry::get('Users');
      $user = $user->get($this->request->session()->read('Auth.User.id'), [
          'contain' => ['Students']
      ]);
      $courses = $this->Swimclasses->get($id, [
          'contain' => [
            'Coursegroups' => [
              'Students',
              'Classevents' => [
                  'conditions' => ['weeknum !=' => 1, 'classdate >' => Date::now() ],
                  'sort' => ['classdate' => 'ASC'],
                  'Venues'
                ],
            ]
          ]
      ]);
      $this->set(compact('user', 'courses'));

    }

    public function registered()
    {
      $student = TableRegistry::get('Students');
      $students = $student->find('all', [
          'conditions' => ['parent_id' => $this->request->session()->read('Auth.User.id')],
          'contain' => [
            'Coursegroups' => [
              'Classevents' => [
                'Venues',
                'conditions' => ['classdate >' => Date::now() ],
                ],
                'Swimclasses' => [
                  'fields' => [
                    'name'
                  ]
                ]
            ]
          ]
      ]);
      $students = $students->toArray($students);

      $this->set(compact('students'));
    }
}
