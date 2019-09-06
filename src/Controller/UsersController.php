<?php
namespace App\Controller;
use Cake\Event\Event;
use App\Model\Entity\Role;
use App\Model\Entity\User;
use App\Model\Table\UsersTable;
use Cake\Datasource\ResultSetInterface;
ob_start();

/**
 * Users Controller
 *
 * @property UsersTable $Users
 *
 * @method User[]|ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

    }
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['login', 'register','logout','AdminLogin','profile','edit']);
        $this->viewBuilder()->setLayout('default');


    }

// Blank login page used for storyboarding purposes, login functionality to be completed in iteration 2
    public function login()
    {
        if ($this->getRequest()->is('post')) {
            $user = $this->Auth->identify();
            $this->Auth->user('email');
            if ($user) {

                $this->Auth->setUser($user);
                if ($this->Auth->user('type') == 'Employer') {
                    return $this->redirect(['controller' => 'EmployerAdmin', 'action' => 'index']);
                } elseif($this->Auth->user('type') == 'Candidate') {
                    return $this->redirect(['controller' => 'pages', 'action' => 'home']);
                }elseif ($this->Auth->user('type') == 'Admin'){
                    return $this->redirect(['controller' => 'admin', 'action' => 'index']);
                }


            }
            else
                return $this->Flash->error('Your username or password is incorrect.');
        }

    }

    public function logout()
    {
        $this->Flash->success('You are now logged out');
        $this->Auth->logout();
        return $this->redirect(['controller' => 'pages', 'action' => 'home']);
    }


    public function register()
    {
        $user = $this->Users->newEntity();

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->created = date("Y-m-d H:i:s");
            $user->modified = date("Y-m-d H:i:s");
            //var_dump($this->request->getData());
            if($this->request->getData()['check']=='false'){
                $this->set('errors','Please read and agree to continue.');
                // return $this->redirect(['action' => 'register']);
            }

            if ($this->Users->save($user)) {

//                $this->Flash->success(__('The user has been saved.'));
                if($user->type=='Candidate'){
                    $this->loadModel('Candidates');
                    $candidates = $this->Candidates->newEntity();
                    $candidates->user_id=$user->id;
                    if ($this->Candidates->save($candidates)) {
                        return $this->redirect(['controller' => 'Candidates', 'action' => 'profileAdd', $candidates->id]);
                    }
                }
                else{
                    return $this->redirect(['controller' => 'employers', 'action' => 'add',$user->id]);
                }
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->render('register');
    }


    public function profile()
    {
        $this->viewBuilder()->setLayout('EmployerAdmin');
        $this->loadModel('Employers');
        $employer = $this->Employers->newEntity();
        if ($this->request->is('post')) {
            $employer = $this->Employers->patchEntity($employer, $this->request->getData());
            if ($this->Employers->save($employer)) {
                $this->Flash->success(__('The employer has been saved.'));

                return $this->redirect(['controller'=>'pages','action' => 'home']);
            }
            $this->Flash->error(__('The employer could not be saved. Please, try again.'));
        }
        $this->set(compact('employer'));
    }


    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            // Don't try to save a blank password when editing an existing user and they didn't submit a password.
            // What has really happened is they edited the user, but opted not to change the password.
            $data = $this->request->getData();
            if (!$data['password']) {
                unset($data['password']);
            }

            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect([ 'action' => 'login']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

}
