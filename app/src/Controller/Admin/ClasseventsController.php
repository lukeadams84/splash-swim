<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;

/**
 * Classes Controller
 *
 * @property \App\Model\Table\ClassesTable $Classes
 */
class ClasseventsController extends AdminController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Swimclasses', 'Coursegroups' => ['Students'], 'Venues'],
            'order' => ['Classevents.classdate' => 'asc'],
            'conditions' => ['Classevents.classdate >' => Date::now() ],
            'limit' => 100
        ];
        $classes = $this->paginate($this->Classevents);
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
        $classevents = $this->Swimclasses->get($id, [
            'contain' => ['Swimclasses', 'Coursegroups', 'Venues']
        ]);


        $this->set('classevents', $classevents);
        $this->set('_serialize', ['classevents']);
    }

    public function calendar() {
      $this->paginate = [
          'contain' => ['Swimclasses', 'Venues'],
          'order' => ['Classevents.classdate' => 'asc'],
          'conditions' => ['Classevents.classdate >' => Date::now() ],
          'limit' => 100
      ];
      $classes = $this->paginate($this->Classevents);

      $this->set(compact('classes'));
      $this->set('_serialize', ['classes']);

    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $class = $this->Classes->newEntity();
        if ($this->request->is('post')) {
            $class = $this->Classes->patchEntity($class, $this->request->getData());
            if ($this->Classes->save($class)) {
                $this->Flash->success(__('The class has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The class could not be saved. Please, try again.'));
        }
        $venues = $this->Classes->Venues->find('list', ['limit' => 200]);
        $this->set(compact('class', 'venues'));
        $this->set('_serialize', ['class']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Class id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $class = $this->Classes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $class = $this->Classes->patchEntity($class, $this->request->getData());
            if ($this->Classes->save($class)) {
                $this->Flash->success(__('The class has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The class could not be saved. Please, try again.'));
        }
        $venues = $this->Classes->Venues->find('list', ['limit' => 200]);
        $this->set(compact('class','venues'));
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
}
