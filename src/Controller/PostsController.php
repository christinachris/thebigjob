<?php
namespace App\Controller;
use Cake\Utility\Security;
/**
 *
 */
class PostsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Posts');
    }

    public function index()
    {
        $post = $this->Posts->find('all');
        $this->set('post', $post);
    }

    public function upload()
    {
        if ($this->request->is('post')) {

            $myname = $this->request->getData()['file']['name'];
            $mytmp = $this->request->getData()['file']['tmp_name'];
            $myext = substr(strrchr(($myname), "."), 1);
            $mypath = "upload/" . Security::hash($myname) . "." . $myext;
            $post = $this->Posts->newEntity();
            $post->name = $myname;
            $post->path = $mypath;
            $post->created = date("Y-m-d H:i:s");
            if (move_uploaded_file($mytmp, WWW_ROOT . $mypath)) {
                $this->Posts->save($post);
                return $this->redirect(['action' => 'index']);
            }
        }
    }

    public function edit()
    {
//        if ($this->request->is('delete')) {
//            $myname = $this->request->getData()['file']['name'];
//            $mytmp = $this->request->getData()['file']['tmp_name'];
//            $myext = substr(strrchr(($myname), "."), 1);
//            $mypath = "upload/" . Security::hash($myname) . "." . $myext;
//            $post = $this->Posts->deleteEntity();
//
//            $post->name = $myname;
//            $post->path = $mypath;
////                $post->deleted = date("Y-m-d H:i:s");
//            if (move_uploaded_file($mytmp, WWW_ROOT . $mypath)) {
//                $this->Posts->save($post);
//                return $this->redirect(['action' => 'index']);
//            }
//
//        }

    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('The file has been deleted.'));
        } else {
            $this->Flash->error(__('The file could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}


