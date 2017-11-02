<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Achievements Controller
 *
 * @property \App\Model\Table\AchievementsTable $Achievements
 */
class AchievementsController extends AdminController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
          'contain' => ['Awardbody', 'Goals']
      ];

        $achievements = $this->paginate($this->Achievements);

        $this->set(compact('achievements'));
        $this->set('_serialize', ['achievements']);
    }

    public function view($id = null)
    {
        $achievement = $this->Achievements->get($id, [
            'contain' => ['Awardbody', 'Goals']
        ]);

        $this->set('achievement', $achievement);
        $this->set('_serialize', ['achievement']);
    }

    public function addgoal()
    {
    }


    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $achievement = $this->Achievements->newEntity();
        if ($this->request->is('post')) {
            $achievement = $this->Achievements->patchEntity($achievement, $this->request->getData());
            if ($this->Achievements->save($achievement)) {
                $this->Flash->success(__('The achievement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The achievement could not be saved. Please, try again.'));
        }
        $this->set(compact('achievement'));
        $this->set('_serialize', ['achievement']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Achievement id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $achievement = $this->Achievements->get($id);
        if ($this->Achievements->delete($achievement)) {
            $this->Flash->success(__('The achievement has been deleted.'));
        } else {
            $this->Flash->error(__('The achievement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
