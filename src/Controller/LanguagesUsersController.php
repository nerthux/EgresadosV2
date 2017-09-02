<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LanguagesUsers Controller
 *
 * @property \App\Model\Table\LanguagesUsersTable $LanguagesUsers
 *
 * @method \App\Model\Entity\LanguagesUser[] paginate($object = null, array $settings = [])
 */
class LanguagesUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Languages', 'Users']
        ];
        $languagesUsers = $this->paginate($this->LanguagesUsers);

        $this->set(compact('languagesUsers'));
        $this->set('_serialize', ['languagesUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Languages User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $languagesUser = $this->LanguagesUsers->get($id, [
            'contain' => ['Languages', 'Users']
        ]);

        $this->set('languagesUser', $languagesUser);
        $this->set('_serialize', ['languagesUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $languagesUser = $this->LanguagesUsers->newEntity();
        if ($this->request->is('post')) {
            $languagesUser = $this->LanguagesUsers->patchEntity($languagesUser, $this->request->getData());
            if ($this->LanguagesUsers->save($languagesUser)) {
                $this->Flash->success(__('The languages user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The languages user could not be saved. Please, try again.'));
        }
        $languages = $this->LanguagesUsers->Languages->find('list', ['limit' => 200]);
        $users = $this->LanguagesUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('languagesUser', 'languages', 'users'));
        $this->set('_serialize', ['languagesUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Languages User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $languagesUser = $this->LanguagesUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $languagesUser = $this->LanguagesUsers->patchEntity($languagesUser, $this->request->getData());
            if ($this->LanguagesUsers->save($languagesUser)) {
                $this->Flash->success(__('The languages user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The languages user could not be saved. Please, try again.'));
        }
        $languages = $this->LanguagesUsers->Languages->find('list', ['limit' => 200]);
        $users = $this->LanguagesUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('languagesUser', 'languages', 'users'));
        $this->set('_serialize', ['languagesUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Languages User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $languagesUser = $this->LanguagesUsers->get($id);
        if ($this->LanguagesUsers->delete($languagesUser)) {
            $this->Flash->success(__('The languages user has been deleted.'));
        } else {
            $this->Flash->error(__('The languages user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
