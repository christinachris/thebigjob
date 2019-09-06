<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * JobHistories Controller
 *
 * @property \App\Model\Table\JobHistoriesTable $JobHistories
 *
 * @method \App\Model\Entity\JobHistory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class JobHistoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $jobHistories = $this->paginate($this->JobHistories);

        $this->set(compact('jobHistories'));
    }

    /**
     * View method
     *
     * @param string|null $id Job History id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $jobHistory = $this->JobHistories->get($id, [
            'contain' => []
        ]);

        $this->set('jobHistory', $jobHistory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $jobHistory = $this->JobHistories->newEntity();
        if ($this->request->is('post')) {
            $jobHistory = $this->JobHistories->patchEntity($jobHistory, $this->request->getData());
            if ($this->JobHistories->save($jobHistory)) {
                $this->Flash->success(__('The job history has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job history could not be saved. Please, try again.'));
        }
        $this->set(compact('jobHistory'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Job History id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $jobHistory = $this->JobHistories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $jobHistory = $this->JobHistories->patchEntity($jobHistory, $this->request->getData());
            if ($this->JobHistories->save($jobHistory)) {
                $this->Flash->success(__('The job history has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job history could not be saved. Please, try again.'));
        }
        $this->set(compact('jobHistory'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Job History id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $jobHistory = $this->JobHistories->get($id);
        if ($this->JobHistories->delete($jobHistory)) {
            $this->Flash->success(__('The job history has been deleted.'));
        } else {
            $this->Flash->error(__('The job history could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
