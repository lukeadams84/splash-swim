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
class StudentsController extends UserController
{
    var $helpers = array('Time');
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $students = $this->Students->find('ownedBy', ['parent' => $this->request->session()->read('Auth.User'), 'contain' => ['Coursegroups']]);

        $this->set(compact('students'));
        $this->set('_serialize', ['students']);
    }

    /**
     * View method
     *
     * @param string|null $id Student id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function profile($id = null)
    {
        $student = $this->Students->get($id, [
            'contain' => [
              'Parent',
              'Goals',
              'Transactions' => [
                'Coursegroups' => [
                  'Swimclasses' => [
                    'fields' => [
                      'name'
                    ]
                  ]
                ]
              ],
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
              ],
              'Achievements'
            ]
        ]);
        $achievements = $this->Students->Achievements->find('all', ['contain' => ['Goals']]);
        $achieved = $this->Students->Goals->find();
        $achieved->matching('Students', function ($q) use ($id) {
            return $q->where(['Students.id' => $id ]);
        });
        $achieved = $achieved->toArray();

        $courselist = $student['coursegroups'];
        $courselist = Hash::extract($courselist, '{n}.id');

        if ($courselist) {
            $courses = $this->Students->Coursegroups->find('all', ['contain' => ['Swimclasses', 'Students', 'Classevents' => ['Venues', 'conditions' => ['classdate >' => Date::now() ]]], 'conditions' => ['Coursegroups.id not in' => $courselist]]);
        } else {
            $courses = $this->Students->Coursegroups->find('all', ['contain' => ['Swimclasses', 'Students', 'Classevents' => ['Venues', 'conditions' => ['classdate >' => Date::now() ]]]]);
        }
        $this->set(compact('student', 'achieved', 'courses', 'achievements'));
        $this->set('_serialize', ['student', 'courses']);
    }

    public function goals($id)
    {

      $achievements = $this->Students->Achievements->find('all', ['contain' => ['Students' => ['conditions' => ['student_id' => $id]]]]);
      $goals = $this->Students->Goals->find('all', ['contain' => ['Students' => ['conditions' => ['student_id =' => $id ]]]]);

      $studentid = $id;

      $this->set(compact('achievements', 'goals', 'studentid'));
    }

    public function awards()
    {
      $students = $this->Students->find('ownedBy', ['parent' => $this->request->session()->read('Auth.User'), 'contain' => ['Achievements']]);
      $achievements = $this->Students->Achievements->find('all', ['contain' => ['Goals']]);
      $achieved = $this->Students->Goals->find();

      $studentlist = $this->Students->find('ownedBy', ['parent' => $this->request->session()->read('Auth.User'), 'fields' => 'id', 'contain' => ['Achievements']]);

      $achieved->matching('Students', function ($q) use ($studentlist) {
          return $q->where(['Students.id in' => $studentlist ]);
      });
      $achieved = $achieved->toArray();


      $this->set(compact('students', 'achieved', 'achievements'));
    }


    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $student = $this->Students->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['dob'] = date('Y-m-d H:i:s', strtotime($data['dob']));
            $student = $this->Students->patchEntity($student, $data);
            if ($this->Students->save($student)) {
                $this->Flash->success(__('The student has been created.'));

                return $this->redirect('/user/dash');
            }
            $this->Flash->error(__('The student could not be saved. Please, try again.'));
            print_r($student);
        }
        $this->set(compact('student'));
        $this->set('_serialize', ['student']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Student id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $student = $this->Students->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $student = $this->Students->patchEntity($student, $this->request->getData());
            if ($this->Students->save($student)) {
                $this->Flash->success(__('The student has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The student could not be saved. Please, try again.'));
        }
        $parentStudents = $this->Students->ParentStudents->find('list', ['limit' => 200]);
        $this->set(compact('student', 'parentStudents'));
        $this->set('_serialize', ['student']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Student id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $student = $this->Students->get($id);
        if ($this->Students->delete($student)) {
            $this->Flash->success(__('The student has been deleted.'));
        } else {
            $this->Flash->error(__('The student could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
