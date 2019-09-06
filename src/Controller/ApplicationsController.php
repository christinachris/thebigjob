<?php
namespace App\Controller;

use App\Model\Entity\Application;
use App\Model\Table\ApplicationsTable;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Datasource\ResultSetInterface;
use Cake\Http\Response;
use Cake\Network\Exception\NotFoundException;

/**
 * Applications Controller
 *
 * @property ApplicationsTable $Applications
 *
 * @method Application[]|ResultSetInterface paginate($object = null, array $settings = [])
 */
class ApplicationsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        //$this->Auth->allow(['tags', 'view']);
        $this->viewBuilder()->setLayout('EmployerAdmin');
    }

    public function isAuthorized($user = null) {
        if( $this->Auth->user('type')=='Employer'){
            if (in_array($this->request->action, ['index', 'view','add','edit'])) {
                $this->viewBuilder()->setLayout('EmployerAdmin');
                return true;
            }
        }
        elseif( $this->Auth->user('type')=='Admin'){
            if (in_array($this->request->action, ['index', 'view',])) {
                $this->viewBuilder()->setLayout('Admin');
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
     * @return Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Candidates', 'Jobs']
        ];

        $applications = $this->paginate($this->Applications);

        $this->set(compact('applications'));
        $this->set('_serialize', ['applications']);
    }

    /**
     * View method
     *
     * @param string|null $id Application id.
     * @return Response|void
     * @throws RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $application = $this->Applications->get($id, [
            'contain' => []
        ]);

        $this->set('application', $application);
    }

    /**
     * Add method
     *
     * @return Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $application = $this->Applications->newEntity();
        if ($this->request->is('post')) {
            $application = $this->Applications->patchEntity($application, $this->request->getData());
            if ($this->Applications->save($application)) {
                $this->Flash->success(__('The application has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The application could not be saved. Please, try again.'));
        }

        $this->set(compact('application'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Application id.
     * @return Response|null Redirects on successful edit, renders view otherwise.
     * @throws NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $application = $this->Applications->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->patchEntity($application, $this->request->getData());
            if ($this->Applications->save($application)) {
                $this->Flash->success(__('The application has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The application could not be saved. Please, try again.'));
        }
        $this->set(compact('application'));
    }




}
