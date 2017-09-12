<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Generations', 'Careers']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Generations', 'Careers', 'Achievements', 'Companies', 'Questions', 'Skills']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $generations = $this->Users->Generations->find('list', ['limit' => 200]);
        $careers = $this->Users->Careers->find('list', ['limit' => 200]);
        $achievements = $this->Users->Achievements->find('list', ['limit' => 200]);
        $companies = $this->Users->Companies->find('list', ['limit' => 200]);
        $questions = $this->Users->Questions->find('list', ['limit' => 200]);
        $skills = $this->Users->Skills->find('list', ['limit' => 200]);
        $this->set(compact('user', 'generations', 'careers', 'achievements', 'companies', 'questions', 'skills'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Achievements', 'Companies', 'Questions', 'Skills']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $generations = $this->Users->Generations->find('list', ['limit' => 200]);
        $careers = $this->Users->Careers->find('list', ['limit' => 200]);
        $achievements = $this->Users->Achievements->find('list', ['limit' => 200]);
        $companies = $this->Users->Companies->find('list', ['limit' => 200]);
        $questions = $this->Users->Questions->find('list', ['limit' => 200]);
        $skills = $this->Users->Skills->find('list', ['limit' => 200]);
        $this->set(compact('user', 'generations', 'careers', 'achievements', 'companies', 'questions', 'skills'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function signup()
    {    
     $this->viewBuilder()->layout('register');

      $user = $this->Users->newEntity();

      if ($this->request->is('post')) {
        //if ($this->Recaptcha->verify()) {
          $user = $this->Users->patchEntity($user, $this->request->data);
          $user->role = 'student';
          if ($this->Users->save($user)) {
            $this->Flash->success(__('The user has been saved.'));
              return $this->redirect([ 'action' => 'personal', $user->id]);
          } else
             $this->Flash->error(__('The user could not be saved. Please, try again.'));
        //} else
          //$this->Flash->error(__('Please check your Recaptcha Box.'));
      }

      $this->set(compact('user'));
      $this->set('_serialize', ['user']);
     }

     public function education($id)
     {
        $this->viewBuilder()->layout('register');
         $user = $this->Users->get($id, [
             'contain' => []
         ]);

         if($this->request->is(['post', 'put'])){
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->stage = 3;
            if ($this->Users->save($user)) {
              $this->Flash->success(__('The user has been saved.'));
                return $this->redirect([ 'action' => 'index']);
            } else
               $this->Flash->error(__('The user could not be saved. Please, try again.'));
         }
         
        $generations = $this->Users->Generations->find('list', ['limit' => 200]);
        $careers = $this->Users->Careers->find('list', ['limit' => 200]);
         $this->set(compact('user', 'generations', 'careers'));
     }

     public function personal($id)
     {
        $this->viewBuilder()->layout('register');
         $user = $this->Users->get($id, [
             'contain' => []
         ]);

         if($this->request->is(['post', 'put'])){
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->stage = 2;
            if ($this->Users->save($user)) {
              $this->Flash->success(__('The user has been saved.'));
                return $this->redirect([ 'action' => 'education', $user->id]);
            } else
               $this->Flash->error(__('The user could not be saved. Please, try again.'));
         }

         $this->set(compact('user'));
     }
}
