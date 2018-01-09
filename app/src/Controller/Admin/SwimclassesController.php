<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;
use Cake\Utility\Hash;

/**
 * Classes Controller
 *
 * @property \App\Model\Table\ClassesTable $Classes
 */
class SwimclassesController extends AdminController
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

    public function schedule()
    {
        if ($this->request->is('post')) {
            $precalculate = $this->request->getData();
            if(empty($precalculate['timeselect'])) {
              $this->Flash->error(__('Please select at least one timeslot'));
              return $this->redirect(['prefix' => 'admin', 'controller' => 'swimclasses', 'action' => 'view', $precalculate['swimclass_id']]);
            }
            else {
              foreach ($precalculate['timeselect'] as $instance) {
                $dataarray = [];
                $coursegroup = TableRegistry::get('Coursegroups');
                $newcoursegroup = $coursegroup->newEntity([
                  'swimclass_id' => $precalculate['swimclass_id'],
                  'price' => $precalculate['amount'],
                  'courselength' => $precalculate['length'],
                ]);
                $last_id = $coursegroup->save($newcoursegroup);

                for ($i = 1; $i <= $precalculate['length']; $i++) {
                    $dataarray[$i] = $precalculate;
                    $dataarray[$i]['coursegroup_id'] = $last_id->id;
                    $dataarray[$i]['weeknum'] = $i;
                    $dataarray[$i]['time'] = date('Y-m-d H:i:s', strtotime($instance)); //$precalculate['time']
                    $dataarray[$i]['duration'] = $precalculate['duration'];
                }

                for ($z = 1; $z <= $precalculate['length']; $z++) {
                    $date = date($dataarray[$z]['classdate']);
                    $dataarray[$z]['classdate'] = gmdate("Y-m-d", strtotime("+" . ($z * 7) -7 . " days", strtotime($date)));
                }
                $classevents = TableRegistry::get('Classevents');
                $entities = $classevents->newEntities($dataarray);
                $result = $classevents->saveMany($entities);
                /*foreach ($dataarray as $data) {
                    $classevent = $classevents->newEntity($data);
                    $classevents->save($classevent);
                }*/
              }
            }
            $this->Flash->success(__('The class has been scheduled.'));
            return $this->redirect(['prefix' => 'admin', 'controller' => 'swimclasses', 'action' => 'view', $precalculate['swimclass_id']]);
        }
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
        $swimclass = $this->Swimclasses->get($id, [
            'contain' => ['Classevents']
        ]);

        //$teachers = $this->Swimclasses->Teachers->find('all');
        $venues = $this->Swimclasses->Venues->find('all');

        $this->set(compact('venues'));
        $this->set('class', $swimclass);
        $this->set('_serialize', ['class']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $class = $this->Swimclasses->newEntity();
        if ($this->request->is('post')) {
            $class = $this->Swimclasses->patchEntity($class, $this->request->getData());
            if ($this->Swimclasses->save($class)) {
                $this->Flash->success(__('The class has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The class could not be saved. Please, try again.'));
        }
        $this->set(compact('class'));
        $this->set('_serialize', ['class']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Class id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id)
    {
        $class = $this->Swimclasses->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $class = $this->Swimclasses->patchEntity($class, $this->request->getData());
            if ($this->Swimclasses->save($class)) {
                $this->Flash->success(__('The class has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The class could not be saved. Please, try again.'));
        }
        $this->set(compact('class'));
        $this->set('_serialize', ['class']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Class id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $class = $this->Classes->get($id);
        if ($this->Classes->delete($class)) {
            $this->Flash->success(__('The class has been deleted.'));
        } else {
            $this->Flash->error(__('The class could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function book($id = null)
    {


      $students = TableRegistry::get('Students');
      $students = $students->find('all');
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
      $this->set(compact('courses', 'students'));

    }

    public function bookcash($id = null)
    {


      $students = TableRegistry::get('Students');
      $students = $students->find('all');
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
      $this->set(compact('courses', 'students'));

    }

    public function bookip($id = null)
    {



      $students = TableRegistry::get('Students');
      $students = $students->find('all');

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
      $this->set(compact('students', 'courses'));

    }

    public function bookipcash($id = null)
    {



      $students = TableRegistry::get('Students');
      $students = $students->find('all');

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
      $this->set(compact('students', 'courses'));

    }
}
