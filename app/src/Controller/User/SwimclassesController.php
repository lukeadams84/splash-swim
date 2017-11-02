<?php
namespace App\Controller\User;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

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
        $class = $this->Swimclasses->get($id, [
            'contain' => ['Classevents']
        ]);


        $venues = $this->Swimclasses->Venues->find('all');

        $this->set(compact('class', 'venues'));
        
        $this->set('_serialize', ['class', 'venues']);
    }
}
