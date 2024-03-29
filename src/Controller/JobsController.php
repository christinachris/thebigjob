<?php
namespace App\Controller;

use App\Model\Entity\Job;
use App\Model\Table\JobsTable;
use Cake\Database\Query;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Datasource\ResultSetInterface;
use Cake\Http\Response;
use Cake\Mailer\Email;
use Cake\Network\Exception\NotFoundException;
use Cake\ORM\TableRegistry;


/**
 * Jobs Controller
 *
 * @property JobsTable $Jobs
 *
 * @method Job[]|ResultSetInterface paginate($object = null, array $settings = [])
 */
class JobsController extends AppController
{

    /**
     * Index method
     *
     * @return Response|void
     */

    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->loadComponent('Paginator');
        $this->loadModel('Employer');
        $this->paginate = [
            'limit'=>'10'
        ];


    }
    public function isAuthorized($user = null) {
        if( $this->Auth->user('type')=='Employer'){
            if (in_array($this->request->action, ['index', 'view','add','edit','publish','restore','approval','approvalView','applyform','archive','hide','archiveIndex','search','jobApproval'])) {
                $this->viewBuilder()->setLayout('EmployerAdmin');
                return true;
            }
        }
        elseif( $this->Auth->user('type')== 'Admin') {
            if (in_array($this->request->action, ['index', 'view', 'publish', 'restore','approve','approvalView','applyform', 'archive', 'hide', 'archiveIndex', 'search','jobApproval','deny'])) {
                $this->viewBuilder()->setLayout('Admin');
                return true;
            }
        }
        else {
            return false;
        }

        return parent::isAuthorized($user);

    }

    public function index()
    {

        $queryTermsString = $this->getRequest()->getQuery('query');
        //$selectedTagId = (int)$this->getRequest()->getQuery('tag');

        // Split the query string based on one or more whitespace characters (\s+).
        $queryTermsArray = preg_split('/\s+/', $queryTermsString);

        // We want to search for each term independently. If the user provided multiple terms, such as "job interview", then
        // we should find all articles where:
        //  (The title includes "job" OR the body includes "job")
        //   AND
        //  (The title includes "interview" OR the body includes "interview")
        // We also need to search for articles that haven't been archived
        // Notice how for each term, we need to build a condition such as "title LIKE ... OR body LIKE ...".
        // This is what happens in the loop below, we build a collection of these "OR" statements.
        $queryTermConditions = [];
        foreach ($queryTermsArray as $term) {
            $queryTermConditions[] = [
                'AND' => [
                    'Jobs.archived' => false,
                    'OR' => [
                        'Jobs.name LIKE' => "%{$term}%",
                        'Jobs.job_details LIKE' => "%{$term}%",
                        'Employers.company_name LIKE' => "%{$term}%",
                        'Employers.industry LIKE' => "%{$term}%",
                        'Employers.location LIKE' => "%{$term}%"
                    ]]];
        }

        // Once we have a collection of or (title LIKE ... OR body LIKE ...) statements, then we need to combine each
        // one using an AND (see comments above for example). By default, if we provide an array of conditions to
        // the where() method, then it will join them all together using AND, which is exactly what we want.
        $jobsQuery = $this->Jobs->find('all', array('contain' => array('Employers')))->where($queryTermConditions);

        // Filtering data by associations is documented here:
        // https://book.cakephp.org/3.0/en/orm/query-builder.html#filtering-by-associated-data
        // Indeed, the example at that piece of documentation is exactly what we are trying to do here - filter articles
        // by their tags.
//        if ($selectedTagId > 0) {
//            $articlesQuery->matching('Tags', function (Query $query) use ($selectedTagId) {
//                return $query->where(['Tags.id' => $selectedTagId]);
//            });
//        }

        $this->set('jobs', $this->Paginator->paginate($jobsQuery));


        // Pass the query the user asked for to the view, so we can say something like "Results for 'Blah'..." to
        // confirm that we did indeed search what they asked us to. It also means that we can populate the search
        // text input with the string, so the user can perform the search again.
        $this->set('query', $queryTermsString);



    }

    /**
     * View method
     *
     * @param string|null $id Job id.
     * @return Response|void
     * @throws RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => ['Applications','Employers']
        ]);

        $this->set('job', $job);
    }



    /**
     * Add method
     *
     * @return Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $job = $this->Jobs->newEntity();
        if ($this->request->is('post')) {
            $job = $this->Jobs->patchEntity($job, $this->request->getData());

            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The job has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job could not be saved. Please, try again.'));
        }
        $this->set(compact('job'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Job id.
     * @return Response|null Redirects on successful edit, renders view otherwise.
     * @throws NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $job = $this->Jobs->patchEntity($job, $this->request->getData());
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The job has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job could not be saved. Please, try again.'));
        }
        $this->set(compact('job'));
    }


    public function publish($id = null)
    {
        //$this->request->allowMethod(['post', 'publish']);
        $job = $this->Jobs->get($id);

        if ($job == null) {
            throw new \Cake\Http\Exception\NotFoundException();
        }

        $job->published = true;

        if ($this->Jobs->save($job)) {
            $this->Flash->success(__('The job has been published.'));
            $this->send_publish();
        } else {
            $this->Flash->error(__('The job could not be published. Please try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function applyform($id = null)
    {

        $job = $this->Jobs->get($id, [
            'contain' => ['Applications']
        ]);
        $this->set('job', $job);

        $this->loadModel('Applications');
        $this->loadModel('Candidates');
        $application = $this->Applications->newEntity();
        $candidate = $this->Candidates->newEntity();
        if ($this->request->is('post')) {
            $candidate = $this->Candidates->patchEntity($candidate, $this->request->getData());
            $application = $this->Applications->patchEntity($application, $this->request->getData(), [
                'associated' => ['Candidates']
            ]);
            $myname = $this->request->getData()['file']['name'];
            $mytmp = $this->request->getData()['file']['tmp_name'];
            $myext = substr(strrchr(($myname), "."), 1);
//            $mypath = "upload/".$myname.".".$myext;
            $mypath = "upload/".$myname;
            $candidate->postname = $myname;
            $candidate->postpath = $mypath;
            $candidate->created = date("Y-m-d H:i:s");
            if (move_uploaded_file($mytmp, WWW_ROOT . $mypath)) {
                $this->Candidates->save($candidate);
                $this->Applications->save($application);
                return $this->redirect(['action' => 'index']);
            }
//            if ($this->Candidates->save($candidate)) {
//                $this->Flash->success(__('The candidate has been saved.'));
//
//                return $this->redirect(['action' => 'index']);
//            }
//            $this->Flash->error(__('The candidate could not be saved. Please, try again.'));
        }



        $this->loadModel('Applications');
        $application = $this->Applications->newEntity();
        if ($this->request->is('post')) {
            $application = $this->Applications->patchEntity($application, $this->request->getData(), [
                'associated' => ['Candidates']
            ]);
            if ($this->Applications->save($application)) {
                $this->Flash->success(__('The application has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The application could not be saved. Please, try again.'));
        }
//        $this->set(compact('application'));

//        if ($this->request->is('post')) {
//
////            $myname = $this->request->getData()['file']['name'];
////            $mytmp = $this->request->getData()['file']['tmp_name'];
////            $myext = substr(strrchr(($myname), "."), 1);
////            $mypath = "upload/" . Security::hash($myname) . "." . $myext;
////            $candidate = $this->Candidates->newEntity();
////            $candidate->postname = $myname;
////            $candidate->postpath = $mypath;
////            $candidate->created = date("Y-m-d H:i:s");
//            if (move_uploaded_file($mytmp, WWW_ROOT . $mypath)) {
//                $this->Candidates->save($candidate);
//                return $this->redirect(['action' => 'index']);
//            }
//
//
//        }
        $this->set(compact('candidate'));

    }


    public function archive($id = null)
    {
        $job = $this->Jobs->get($id);
        if ($job == null) {
            throw new \Cake\Http\Exception\NotFoundException();
        }

        // If a job is archived, it is "unpublished" as well
        $job->archived = true;
        $job->published = false;

        if ($this->Jobs->save($job)) {
            $this->Flash->success(__('Your job has been archived.'));
        } else {
            $this->Flash->error(__('Unable to archive your job.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function restore($id = null)
    {
        $job = $this->Jobs->get($id);
        if ($job == null) {
            throw new \Cake\Http\Exception\NotFoundException();
        }

        $job->archived = false;

        if ($this->Jobs->save($job)) {
            $this->Flash->success(__('Your job has been restored.'));
        } else {
            $this->Flash->error(__('Unable to restore your job.'));
        }

        return $this->redirect(['action' => 'archiveIndex']);
    }

    public function hide($id = null)
    {
        $job = $this->Jobs->get($id);
        if ($job == null) {
            throw new \Cake\Http\Exception\NotFoundException();
        }

        $job->published = false;

        if ($this->Jobs->save($job)) {
            $this->Flash->success(__('Your job is now hidden.'));
            $this->send_hide();

        } else {
            $this->Flash->error(__('Unable to hide your job.'));
        }

        return $this->redirect(['action' => 'index']);
    }



    public function archiveIndex()
    {
        $archivedjobs = TableRegistry::get('jobs')->find('all')->where(['jobs.archived' => true])->contain([]);
        $this->set('archivedjobs', $this->paginate($archivedjobs));
    }

//    public function upload()
//    {
//
//
//        if ($this->request->is('post')) {
//
//            $myname = $this->request->getData()['file']['name'];
//            $mytmp = $this->request->getData()['file']['tmp_name'];
//            $myext = substr(strrchr(($myname), "."), 1);
//            $mypath = "upload/" . Security::hash($myname) . "." . $myext;
//            $post = $this->Posts->newEntity();
//            $post->name = $myname;
//            $post->path = $mypath;
//            $post->created = date("Y-m-d H:i:s");
//            if (move_uploaded_file($mytmp, WWW_ROOT . $mypath)) {
//                $this->Posts->save($post);
//                return $this->redirect(['action' => 'index']);
//            }
//
//
//        }
//
//
//    }

    public function search()
    {
        // Only displaying non-archived jobs
        //This code can be improved on later by extracting finder code into method
        //   $jobs = $this->Paginator->paginate($this->jobs->nonArchived())
        //$jobs = $this->Paginator->paginate($this->Jobs->find('all')->where(['Jobs.archived' => false])->contain([]));

        $queryTermsString = $this->getRequest()->getQuery('query');
        //$selectedTagId = (int)$this->getRequest()->getQuery('tag');

        // Split the query string based on one or more whitespace characters (\s+).
        $queryTermsArray = preg_split('/\s+/', $queryTermsString);

        // We want to search for each term independently. If the user provided multiple terms, such as "job interview", then
        // we should find all articles where:
        //  (The title includes "job" OR the body includes "job")
        //   AND
        //  (The title includes "interview" OR the body includes "interview")
        // We also need to search for articles that haven't been archived
        // Notice how for each term, we need to build a condition such as "title LIKE ... OR body LIKE ...".
        // This is what happens in the loop below, we build a collection of these "OR" statements.
        $queryTermConditions = [];
        foreach ($queryTermsArray as $term) {
            $queryTermConditions[] = [
                'AND' => [
                    'Jobs.archived' => false,
                    'OR' => [
                        'Jobs.name LIKE' => "%{$term}%",
                        'Jobs.job_details LIKE' => "%{$term}%",
                        'Employers.company_name LIKE' => "%{$term}%",
                        'Employers.industry LIKE' => "%{$term}%",
                        'Employers.location LIKE' => "%{$term}%"
                    ]]];
        }

        // Once we have a collection of or (title LIKE ... OR body LIKE ...) statements, then we need to combine each
        // one using an AND (see comments above for example). By default, if we provide an array of conditions to
        // the where() method, then it will join them all together using AND, which is exactly what we want.
        $jobsQuery = $this->Jobs->find('all', array('contain' => array('Employers')))->where($queryTermConditions);

        // Filtering data by associations is documented here:
        // https://book.cakephp.org/3.0/en/orm/query-builder.html#filtering-by-associated-data
        // Indeed, the example at that piece of documentation is exactly what we are trying to do here - filter articles
        // by their tags.
//        if ($selectedTagId > 0) {
//            $articlesQuery->matching('Tags', function (Query $query) use ($selectedTagId) {
//                return $query->where(['Tags.id' => $selectedTagId]);
//            });
//        }

        $this->set('jobs', $this->Paginator->paginate($jobsQuery));

        // Passed to the view so that we can show a drop down list of available tags for the user to select.
//        $tagList = $this->Articles->Tags->find('list');
//        $this->set('tagList', $tagList);

        // Pass the query the user asked for to the view, so we can say something like "Results for 'Blah'..." to
        // confirm that we did indeed search what they asked us to. It also means that we can populate the search
        // text input with the string, so the user can perform the search again.
        $this->set('query', $queryTermsString);
//        $this->set('selectedTagId', $selectedTagId);
    }


    public function approval($id = null)
    {
    $job = $this->Jobs->get($id);
    if ($job == null) {
        throw new \Cake\Http\Exception\NotFoundException();
    }

    // If a job is archived, it is "unpublished" as well
    $job->published = false;
    $job->sentforapproval = true;

    if ($this->Jobs->save($job)) {
        $this->Flash->success(__('Your job has been sent for approval.'));
    } else {
        $this->Flash->error(__('Unable to send your job for approval.'));
    }

    return $this->redirect(['action' => 'index']);
    }

    public function jobApproval()
    {
        $archivedjobs = TableRegistry::get('jobs')->find('all')->where(['jobs.sentforapproval' => true])->contain([]);
        $this->set('archivedjobs', $this->paginate($archivedjobs));
    }

    public function approve($id = null)
    {
        $job = $this->Jobs->get($id);
        if ($job == null) {
            throw new \Cake\Http\Exception\NotFoundException();
        }

        $job->archived = false;
        $job->sentforapproval = false;
        $job->published = true;

        if ($this->Jobs->save($job)) {
            $this->Flash->success(__('This job has been approved for published.'));
        } else {
            $this->Flash->error(__('Unable to approve this job.'));
        }

        return $this->redirect(['action' => 'job_approval']);
    }
    public function approvalView($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => ['Applications']
        ]);

        $this->set('job', $job);
    }

    public function deny($id = null)
    {
        $job = $this->Jobs->get($id);
        if ($job == null) {
            throw new \Cake\Http\Exception\NotFoundException();
        }

        $job->archived = false;
        $job->sentforapproval = false;
        $job->published = false;

        if ($this->Jobs->save($job)) {
            $this->Flash->success(__('This job posting has been denied.'));
        } else {
            $this->Flash->error(__('Unable to deny this job posting.'));
        }

        return $this->redirect(['action' => 'job_approval']);
    }

    public function adminIndex()
    {

        $queryTermsString = $this->getRequest()->getQuery('query');
        //$selectedTagId = (int)$this->getRequest()->getQuery('tag');

        // Split the query string based on one or more whitespace characters (\s+).
        $queryTermsArray = preg_split('/\s+/', $queryTermsString);

        // We want to search for each term independently. If the user provided multiple terms, such as "job interview", then
        // we should find all articles where:
        //  (The title includes "job" OR the body includes "job")
        //   AND
        //  (The title includes "interview" OR the body includes "interview")
        // We also need to search for articles that haven't been archived
        // Notice how for each term, we need to build a condition such as "title LIKE ... OR body LIKE ...".
        // This is what happens in the loop below, we build a collection of these "OR" statements.
        $queryTermConditions = [];
        foreach ($queryTermsArray as $term) {
            $queryTermConditions[] = [
                'AND' => [
                    'Jobs.archived' => false,
                    'OR' => [
                        'Jobs.name LIKE' => "%{$term}%",
                        'Jobs.job_details LIKE' => "%{$term}%",
                    ]]];
        }

        // Once we have a collection of or (title LIKE ... OR body LIKE ...) statements, then we need to combine each
        // one using an AND (see comments above for example). By default, if we provide an array of conditions to
        // the where() method, then it will join them all together using AND, which is exactly what we want.
        $jobsQuery = $this->Jobs->find()->where($queryTermConditions);

        // Filtering data by associations is documented here:
        // https://book.cakephp.org/3.0/en/orm/query-builder.html#filtering-by-associated-data
        // Indeed, the example at that piece of documentation is exactly what we are trying to do here - filter articles
        // by their tags.
//        if ($selectedTagId > 0) {
//            $articlesQuery->matching('Tags', function (Query $query) use ($selectedTagId) {
//                return $query->where(['Tags.id' => $selectedTagId]);
//            });
//        }

        $this->set('jobs', $this->Paginator->paginate($jobsQuery));


        // Pass the query the user asked for to the view, so we can say something like "Results for 'Blah'..." to
        // confirm that we did indeed search what they asked us to. It also means that we can populate the search
        // text input with the string, so the user can perform the search again.
        $this->set('query', $queryTermsString);



    }


//--------------------------------------------------------//
    /*
     * Generate emails and send to employers who have added, edited, archived,
     * restored and published a job.
     */

    public function send_add() {
        $request = $this -> getRequest();
        $admin_email = "team32.monash.edu@gmail.com";
//        $admin_email =
        $sender = 'team32.monash.edu@gmail.com';

        $email = new Email();
        $email -> setFrom([$sender => "The Big Job"]);
        $email -> setTo($admin_email);
        $email -> setSubject("Job adding confirmation");

        $message_to_send = "You have added a job\n\n".
            "Job Name: " . $request->getData("Job Name") . "\n".
            "Date Created: ". $request->getData("Date Created"). "\n".
            "Job Details: ". $request->getData( "Job Details"). "\n";

        $email->send($message_to_send);

        $this -> redirect(['action' => 'index']);
    }

    public function send_edit() {
        $request = $this -> getRequest();
        $admin_email = "team32.monash.edu@gmail.com";
        $sender = 'team32.monash.edu@gmail.com';

        $email = new Email();
        $email -> setFrom([$sender => "The Big Job"]);
        $email -> setTo($admin_email);
        $email -> setSubject("Job editing confirmation");

        $message_to_send = "You have edited a job\n\n".
            "Job Name: " . $request->getData("Job Name") . "\n".
            "Date Created: ". $request->getData("Date Created"). "\n".
            "Job Details: ". $request->getData( "Job Details"). "\n";

        $email->send($message_to_send);

        $this -> redirect(['action' => 'index']);

    }

    public function send_archive() {
        $request = $this -> getRequest();
        $admin_email = "team32.monash.edu@gmail.com";
        $sender = 'team32.monash.edu@gmail.com';

        $email = new Email();
        $email -> setFrom([$sender => "The Big Job"]);
        $email -> setTo($admin_email);
        $email -> setSubject("Job archiving confirmation");

        $message_to_send = "You have archived a job\n\n".
            "Job Name: " . $request->getData("Job Name") . "\n".
            "Date Created: ". $request->getData("Date Created"). "\n".
            "Job Details: ". $request->getData( "Job Details"). "\n";

        $email->send($message_to_send);

        $this -> redirect(['action' => 'index']);

    }

    public function send_restore(){
        $request = $this -> getRequest();
        $admin_email = "team32.monash.edu@gmail.com";
        $sender = 'team32.monash.edu@gmail.com';

        $email = new Email();
        $email -> setFrom([$sender => "The Big Job"]);
        $email -> setTo($admin_email);
        $email -> setSubject("Job restoring confirmation");

        $message_to_send = "You have restored a job\n\n".
            "Job Name: " . $request->getData("Job Name") . "\n".
            "Date Created: ". $request->getData("Date Created"). "\n".
            "Job Details: ". $request->getData( "Job Details"). "\n";

        $email->send($message_to_send);

        $this -> redirect(['action' => 'index']);

    }

    private function send_publish()
    {
        $request = $this -> getRequest();
        $admin_email = "team32.monash.edu@gmail.com";
        $sender = 'team32.monash.edu@gmail.com';

        $email = new Email();
        $email -> setFrom([$sender => "The Big Job"]);
        $email -> setTo($admin_email);
        $email -> setSubject("Job publishing confirmation");

        $message_to_send = "You have published a job\n\n".
            "Job Name: " . $request->getData("Job Name") . "\n".
            "Date Created: ". $request->getData("Date Created"). "\n".
            "Job Details: ". $request->getData( "Job Details"). "\n";

        $email->send($message_to_send);

        $this -> redirect(['action' => 'index']);

    }

    public function send_hide(){
        $request = $this -> getRequest();
        $admin_email = "team32.monash.edu@gmail.com";
        $sender = 'team32.monash.edu@gmail.com';

        $email = new Email();
        $email -> setFrom([$sender => "The Big Job"]);
        $email -> setTo($admin_email);
        $email -> setSubject("Job hiding confirmation");

        $message_to_send = "You have hided a job\n\n".
            "Job Name: " . $request->getData("Job Name") . "\n".
            "Date Created: ". $request->getData("Date Created"). "\n".
            "Job Details: ". $request->getData( "Job Details"). "\n";

        $email->send($message_to_send);

        $this -> redirect(['action' => 'index']);

    }



}
