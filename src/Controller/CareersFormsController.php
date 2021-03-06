<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CareersForms Controller
 *
 * @property \App\Model\Table\CareersFormsTable $CareersForms
 *
 * @method \App\Model\Entity\CareersForm[] paginate($object = null, array $settings = [])
 */
class CareersFormsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Careers', 'Forms']
        ];
        $careersForms = $this->paginate($this->CareersForms);

        $this->set(compact('careersForms'));
        $this->set('_serialize', ['careersForms']);
    }

    /**
     * View method
     *
     * @param string|null $id Careers Form id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $careersForm = $this->CareersForms->get($id, [
            'contain' => ['Careers', 'Forms']
        ]);

        $this->set('careersForm', $careersForm);
        $this->set('_serialize', ['careersForm']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $careersForm = $this->CareersForms->newEntity();
        if ($this->request->is('post')) {
            $careersForm = $this->CareersForms->patchEntity($careersForm, $this->request->getData());
            if ($this->CareersForms->save($careersForm)) {
                $this->Flash->success(__('The careers form has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The careers form could not be saved. Please, try again.'));
        }
        $careers = $this->CareersForms->Careers->find('list', ['limit' => 200]);
        $forms = $this->CareersForms->Forms->find('list', ['limit' => 200]);
        $this->set(compact('careersForm', 'careers', 'forms'));
        $this->set('_serialize', ['careersForm']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Careers Form id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $careersForm = $this->CareersForms->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $careersForm = $this->CareersForms->patchEntity($careersForm, $this->request->getData());
            if ($this->CareersForms->save($careersForm)) {
                $this->Flash->success(__('The careers form has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The careers form could not be saved. Please, try again.'));
        }
        $careers = $this->CareersForms->Careers->find('list', ['limit' => 200]);
        $forms = $this->CareersForms->Forms->find('list', ['limit' => 200]);
        $this->set(compact('careersForm', 'careers', 'forms'));
        $this->set('_serialize', ['careersForm']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Careers Form id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $careersForm = $this->CareersForms->get($id);
        if ($this->CareersForms->delete($careersForm)) {
            $this->Flash->success(__('The careers form has been deleted.'));
        } else {
            $this->Flash->error(__('The careers form could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
