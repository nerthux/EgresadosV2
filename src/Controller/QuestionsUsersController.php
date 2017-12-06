<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * QuestionsUsers Controller
 *
 * @property \App\Model\Table\QuestionsUsersTable $QuestionsUsers
 *
 * @method \App\Model\Entity\QuestionsUser[] paginate($object = null, array $settings = [])
 */
class QuestionsUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Questions', 'Forms']
        ];
        $questionsUsers = $this->paginate($this->QuestionsUsers);

        $this->set(compact('questionsUsers'));
        $this->set('_serialize', ['questionsUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Questions User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $questionsUser = $this->QuestionsUsers->get($id, [
            'contain' => ['Users', 'Questions', 'Forms']
        ]);

        $this->set('questionsUser', $questionsUser);
        $this->set('_serialize', ['questionsUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $questionsUser = $this->QuestionsUsers->newEntity();
        if ($this->request->is('post')) {
            $questionsUser = $this->QuestionsUsers->patchEntity($questionsUser, $this->request->getData());
            if ($this->QuestionsUsers->save($questionsUser)) {
                $this->Flash->success(__('The questions user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The questions user could not be saved. Please, try again.'));
        }
        $users = $this->QuestionsUsers->Users->find('list', ['limit' => 200]);
        $questions = $this->QuestionsUsers->Questions->find('list', ['limit' => 200]);
        $forms = $this->QuestionsUsers->Forms->find('list', ['limit' => 200]);
        $this->set(compact('questionsUser', 'users', 'questions', 'forms'));
        $this->set('_serialize', ['questionsUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Questions User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $questionsUser = $this->QuestionsUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $questionsUser = $this->QuestionsUsers->patchEntity($questionsUser, $this->request->getData());
            if ($this->QuestionsUsers->save($questionsUser)) {
                $this->Flash->success(__('The questions user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The questions user could not be saved. Please, try again.'));
        }
        $users = $this->QuestionsUsers->Users->find('list', ['limit' => 200]);
        $questions = $this->QuestionsUsers->Questions->find('list', ['limit' => 200]);
        $forms = $this->QuestionsUsers->Forms->find('list', ['limit' => 200]);
        $this->set(compact('questionsUser', 'users', 'questions', 'forms'));
        $this->set('_serialize', ['questionsUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Questions User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $questionsUser = $this->QuestionsUsers->get($id);
        if ($this->QuestionsUsers->delete($questionsUser)) {
            $this->Flash->success(__('The questions user has been deleted.'));
        } else {
            $this->Flash->error(__('The questions user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

   /**
     * saveAnswers method
     *
     * @param string|null $id Form id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function saveAnswers()
    {
        $this->autoRender = false;
        
        if ($this->request->is('ajax')) {
            $request = $this->request->getData(); 
            $questions = json_decode(json_encode($request['form']['questions']));
            $answers = $request['survey'];

            foreach ($questions as $question) {
                $questions_index["$question->name"] = $question->id;
            }

            foreach($answers as $question_name => $answer){
                $survey = $this->QuestionsUsers->newEntity();
                $survey->question_id = $questions_index[$question_name];
                $survey->value = $answer;
                $survey->form_id = $request['form']['id'];
                $survey->user_id = $this->Auth->user('id');

                $this->QuestionsUsers->save($survey);
                print_r($survey);
            }
        }
    }
}
