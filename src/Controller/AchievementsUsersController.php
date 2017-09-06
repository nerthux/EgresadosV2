<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AchievementsUsers Controller
 *
 * @property \App\Model\Table\AchievementsUsersTable $AchievementsUsers
 *
 * @method \App\Model\Entity\AchievementsUser[] paginate($object = null, array $settings = [])
 */
class AchievementsUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Achievements', 'Users']
        ];
        $achievementsUsers = $this->paginate($this->AchievementsUsers);

        $this->set(compact('achievementsUsers'));
        $this->set('_serialize', ['achievementsUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Achievements User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $achievementsUser = $this->AchievementsUsers->get($id, [
            'contain' => ['Achievements', 'Users']
        ]);

        $this->set('achievementsUser', $achievementsUser);
        $this->set('_serialize', ['achievementsUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $achievementsUser = $this->AchievementsUsers->newEntity();
        if ($this->request->is('post')) {
            $achievementsUser = $this->AchievementsUsers->patchEntity($achievementsUser, $this->request->getData());
            if ($this->AchievementsUsers->save($achievementsUser)) {
                $this->Flash->success(__('The achievements user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The achievements user could not be saved. Please, try again.'));
        }
        $achievements = $this->AchievementsUsers->Achievements->find('list', ['limit' => 200]);
        $users = $this->AchievementsUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('achievementsUser', 'achievements', 'users'));
        $this->set('_serialize', ['achievementsUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Achievements User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $achievementsUser = $this->AchievementsUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $achievementsUser = $this->AchievementsUsers->patchEntity($achievementsUser, $this->request->getData());
            if ($this->AchievementsUsers->save($achievementsUser)) {
                $this->Flash->success(__('The achievements user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The achievements user could not be saved. Please, try again.'));
        }
        $achievements = $this->AchievementsUsers->Achievements->find('list', ['limit' => 200]);
        $users = $this->AchievementsUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('achievementsUser', 'achievements', 'users'));
        $this->set('_serialize', ['achievementsUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Achievements User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $achievementsUser = $this->AchievementsUsers->get($id);
        if ($this->AchievementsUsers->delete($achievementsUser)) {
            $this->Flash->success(__('The achievements user has been deleted.'));
        } else {
            $this->Flash->error(__('The achievements user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
