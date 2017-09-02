<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Generations Controller
 *
 * @property \App\Model\Table\GenerationsTable $Generations
 *
 * @method \App\Model\Entity\Generation[] paginate($object = null, array $settings = [])
 */
class GenerationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $generations = $this->paginate($this->Generations);

        $this->set(compact('generations'));
        $this->set('_serialize', ['generations']);
    }

    /**
     * View method
     *
     * @param string|null $id Generation id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $generation = $this->Generations->get($id, [
            'contain' => ['Forms', 'Users']
        ]);

        $this->set('generation', $generation);
        $this->set('_serialize', ['generation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $generation = $this->Generations->newEntity();
        if ($this->request->is('post')) {
            $generation = $this->Generations->patchEntity($generation, $this->request->getData());
            if ($this->Generations->save($generation)) {
                $this->Flash->success(__('The generation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The generation could not be saved. Please, try again.'));
        }
        $forms = $this->Generations->Forms->find('list', ['limit' => 200]);
        $this->set(compact('generation', 'forms'));
        $this->set('_serialize', ['generation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Generation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $generation = $this->Generations->get($id, [
            'contain' => ['Forms']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $generation = $this->Generations->patchEntity($generation, $this->request->getData());
            if ($this->Generations->save($generation)) {
                $this->Flash->success(__('The generation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The generation could not be saved. Please, try again.'));
        }
        $forms = $this->Generations->Forms->find('list', ['limit' => 200]);
        $this->set(compact('generation', 'forms'));
        $this->set('_serialize', ['generation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Generation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $generation = $this->Generations->get($id);
        if ($this->Generations->delete($generation)) {
            $this->Flash->success(__('The generation has been deleted.'));
        } else {
            $this->Flash->error(__('The generation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
