<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CompaniesUsers Controller
 *
 * @property \App\Model\Table\CompaniesUsersTable $CompaniesUsers
 *
 * @method \App\Model\Entity\CompaniesUser[] paginate($object = null, array $settings = [])
 */
class CompaniesUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Companies', 'Users']
        ];
        $companiesUsers = $this->paginate($this->CompaniesUsers);

        $this->set(compact('companiesUsers'));
        $this->set('_serialize', ['companiesUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Companies User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $companiesUser = $this->CompaniesUsers->get($id, [
            'contain' => ['Companies', 'Users']
        ]);

        $this->set('companiesUser', $companiesUser);
        $this->set('_serialize', ['companiesUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $companiesUser = $this->CompaniesUsers->newEntity();
        if ($this->request->is('post')) {
            $companiesUser = $this->CompaniesUsers->patchEntity($companiesUser, $this->request->getData());
            if ($this->CompaniesUsers->save($companiesUser)) {
                $this->Flash->success(__('The companies user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The companies user could not be saved. Please, try again.'));
        }
        $companies = $this->CompaniesUsers->Companies->find('list', ['limit' => 200]);
        $users = $this->CompaniesUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('companiesUser', 'companies', 'users'));
        $this->set('_serialize', ['companiesUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Companies User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $companiesUser = $this->CompaniesUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $companiesUser = $this->CompaniesUsers->patchEntity($companiesUser, $this->request->getData());
            if ($this->CompaniesUsers->save($companiesUser)) {
                $this->Flash->success(__('The companies user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The companies user could not be saved. Please, try again.'));
        }
        $companies = $this->CompaniesUsers->Companies->find('list', ['limit' => 200]);
        $users = $this->CompaniesUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('companiesUser', 'companies', 'users'));
        $this->set('_serialize', ['companiesUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Companies User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $companiesUser = $this->CompaniesUsers->get($id);
        if ($this->CompaniesUsers->delete($companiesUser)) {
            $this->Flash->success(__('The companies user has been deleted.'));
        } else {
            $this->Flash->error(__('The companies user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
