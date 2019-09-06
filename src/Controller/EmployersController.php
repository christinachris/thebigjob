<?php
namespace App\Controller;
use Cake\Event\Event;
use App\Controller\AppController;
ob_start();
/**
 * Employers Controller
 *
 * @property \App\Model\Table\EmployersTable $Employers
 *
 * @method \App\Model\Entity\Employer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployersController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

    }
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['add']);


    }

    public function isAuthorized($user = null) {
        if( $this->Auth->user('type')=='Employer'){
            if (in_array($this->request->action, ['view','index','edit'])) {

                return true;
            }
        }
        else{
            return false;
        }



        return parent::isAuthorized($user);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('EmployerAdmin');
        $employers = $this->paginate($this->Employers);

        $this->set(compact('employers'));
    }

    /**
     * View method
     *
     * @param string|null $id Employer id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('EmployerAdmin');
        $employer=$this->Employers->find()->where(['user_id'=>$id])->toList();
//        var_dump($employer);
        $this->set('employer', $employer[0]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $this->viewBuilder()->setLayout('default');
        $employer = $this->Employers->newEntity();
        if ($this->request->is('post')) {
            $employer = $this->Employers->patchEntity($employer, $this->request->getData());
            $employer->user_id=$id;
            if ($this->Employers->save($employer)) {
                $this->Flash->success(__('The employer has been saved.'));

                return $this->redirect(['controller' => 'users','action' => 'login']);
            }
            $this->Flash->error(__('The employer could not be saved. Please, try again.'));
        }
        $this->set(compact('employer'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Employer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('EmployerAdmin');
        $employer=$this->Employers->find()->where(['user_id'=>$id])->toList();
//        $employer = $this->Employers->get($id, [
//            'contain' => []
//        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $employer = $this->Employers->patchEntity($employer[0], $this->request->getData());
            if ($this->Employers->save($employer)) {
                $this->Flash->success(__('The new detail has been saved.'));

                return $this->redirect(['action' => 'view',$id]);
            }
            $this->Flash->error(__('Could not be saved. Please, try again.'));
        }
        $this->set('employer',$employer[0]);
    }

    /**
     * Delete method
     *
     * @param string|null $id Employer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employer = $this->Employers->get($id);
        if ($this->Employers->delete($employer)) {
            $this->Flash->success(__('The employer has been deleted.'));
        } else {
            $this->Flash->error(__('The employer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
