<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Forms Controller
 *
 * @property \App\Model\Table\FormsTable $Forms
 *
 * @method \App\Model\Entity\Form[] paginate($object = null, array $settings = [])
 */
class FormsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadModel('Questions');
        
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $forms = $this->paginate($this->Forms);

        $this->set(compact('forms'));
        $this->set('_serialize', ['forms']);
    }

    /**
     * View method
     *
     * @param string|null $id Form id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $form = $this->Forms->get($id, [
            'contain' => ['Careers', 'Generations', 'Questions', 'QuestionsUsers']
        ]);

        $this->set('form', $form);
        $this->set('_serialize', ['form']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $form = $this->Forms->newEntity();
        if ($this->request->is('post')) {
            $form = $this->Forms->patchEntity($form, $this->request->getData());
            if ($this->Forms->save($form)) {
                $this->Flash->success(__('The form has been saved.'));

                return $this->redirect(['action' => 'editor',$form->id]);
            }
            $this->Flash->error(__('The form could not be saved. Please, try again.'));
        }
        $careers = $this->Forms->Careers->find('list', ['limit' => 200]);
        $generations = $this->Forms->Generations->find('list', ['limit' => 200]);
        $this->set(compact('form', 'careers', 'generations'));
        $this->set('_serialize', ['form']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Form id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $form = $this->Forms->get($id, [
            'contain' => ['Careers', 'Generations']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $form = $this->Forms->patchEntity($form, $this->request->getData());
            if ($this->Forms->save($form)) {
                $this->Flash->success(__('The form has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The form could not be saved. Please, try again.'));
        }
        $careers = $this->Forms->Careers->find('list', ['limit' => 200]);
        $generations = $this->Forms->Generations->find('list', ['limit' => 200]);
        $this->set(compact('form', 'careers', 'generations'));
        $this->set('_serialize', ['form']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Form id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $form = $this->Forms->get($id);
        if ($this->Forms->delete($form)) {
            $this->Flash->success(__('The form has been deleted.'));
        } else {
            $this->Flash->error(__('The form could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    private function recursiveEditor($elements, $surveyid){
        //var_dump($elements);
        foreach($elements as $element){
            if($element->type == "panel")
                $this->recursiveEditor($element->elements, $surveyid);
                
            if(in_array($element->type, array('radiogroup', 'checkbox', 'matrix', 'rating'))) {
                $question = $this->Questions->newEntity();
                $question->name = $element->name;
                $question->label = $element->title ?? $element->name;
                $question->type = $element->type;
                $question->choices = isset($element->choices) ? json_encode($element->choices, JSON_UNESCAPED_UNICODE) : NULL;
                $question->required = $element->isRequired ?? NULL;
                $question->conditional = $element->visibleIf ?? NULL;
                $question->form_id = $surveyid;

                if($element->type == "matrix") {
                    $question->columns = json_encode($element->columns, JSON_UNESCAPED_UNICODE);
                    $question->rows = json_encode($element->rows, JSON_UNESCAPED_UNICODE);
                }
                if($element->type == "rating") {
                    $question->choices = json_encode($element->rateValues, JSON_UNESCAPED_UNICODE);
                }

                $this->Questions->save($question);
            }
             
        }
    }

    public function saveEditor()
    {
        $this->autoRender = false;

        if ($this->request->is('ajax')) {
            $request = $this->request->getData();
            $editor = json_decode($request['editor']);
            //var_dump(json_decode($request['editor'])); die();
            foreach($editor->pages as $page ) {
                    $this->recursiveEditor($page->elements, $request['surveyid'] );
            }

            $form = $this->Forms->get($request['surveyid'], [
                'contain' => ['Careers', 'Generations']
            ]);

            $form->name = $request['surveyname'];
            $form->description = $request['surveydescription'];
            $form->editor = $request['editor'];
            $form->status = "draft";

            $this->response->type('json');
            $this->response->body('{"status": "success"}');
            return $this->response;
        }        
    }

    /**
     * Add method
     *        $this->loadComponent('RequestHandler');

     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function editor($id = null)
    {
        $form = $this->Forms->get($id, [
            'contain' => ['Careers', 'Generations']
        ]);
        $this->viewBuilder()->layout('surveyjs');

        if ($this->request->is('post')) {
            $form = $this->Forms->patchEntity($form, $this->request->getData());
            if ($this->Forms->save($form)) {
                $this->Flash->success(__('The form has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The form could not be saved. Please, try again.'));
        }
        $careers = $this->Forms->Careers->find('list', ['limit' => 200]);
        $generations = $this->Forms->Generations->find('list', ['limit' => 200]);
        $this->set(compact('form', 'careers', 'generations'));
        $this->set('_serialize', ['form']);
    }
}
