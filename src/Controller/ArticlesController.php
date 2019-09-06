<?php
namespace App\Controller;

//use App\Controller\AppController;
use App\Model\Entity\Article;
use App\Model\Entity\ArticleView;
use App\Model\Entity\Role;
use App\Model\Table\ArticlesTable;
use App\Model\Table\ArticleViewsTable;
use Cake\Database\Query;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Datasource\ResultSetInterface;
use Cake\Http\Response;
use Cake\Network\Exception\NotFoundException;
use Cake\ORM\TableRegistry;

/**
 * Articles Controller
 *
 * @property ArticlesTable $Articles
 * @property ArticleViewsTable $ArticleViews
 *
 * @method Article[]|ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesController extends AppController
{

    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        //$this->Auth->allow(['tags', 'view']);
        $this->loadComponent('Paginator');
        $this->loadModel('ArticleViews');
        $this->viewBuilder()->setLayout('admin');
        $this->paginate = [
            'limit'=>'6'
        ];
        $this->Auth->allow();
    }

    public function home()
    {
    }

    /**
     * Index method
     *
     * @return Response|void
     */
    public function index()
    {
        // Only displaying non-archived articles
        //This code can be improved on by extracting finder code into method
        //$articles = $this->Paginator->paginate($this->Articles->nonArchived());

        //$articles = $this->Paginator->paginate($this->Articles->find('all')->where(['Articles.archived' => false])->contain([]));

        // The URL for this simple search is "/articles/simple-search?query=...". We are interested in the "?query=..."
        // part which is the search text entered by the user.
//        $queryTerms = $this->getRequest()->getQuery('query');
//
//        // The only thing we need to do to these search terms is to turn them into a wildcard to work correctly with
//        // the LIKE clause. This allows for matching articles where the title or body CONTAINS the search terms.
//        $queryTermsWithWildCard = '%' . $queryTerms . '%';
//
//        // Note that we are happy for either the title or the body to match. We also need to search for articles that
//        //        // haven't been archived
//        $articles = $this->Paginator->paginate($this->Articles->find()->where([
//            'AND' => [
//                'Articles.archived' => false,
//                'OR' => [
//                    'title LIKE' => $queryTermsWithWildCard,
//                    'body LIKE' => $queryTermsWithWildCard,
//            ]]
//        ]));

        $queryTermsString = $this->getRequest()->getQuery('query');
        $selectedTagId = (int)$this->getRequest()->getQuery('tag');

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
                    'Articles.archived' => false,
                    'OR' => [
                        'Articles.title LIKE' => "%{$term}%",
                        'Articles.body LIKE' => "%{$term}%",
            ]]];
        }

        // Once we have a collection of or (title LIKE ... OR body LIKE ...) statements, then we need to combine each
        // one using an AND (see comments above for example). By default, if we provide an array of conditions to
        // the where() method, then it will join them all together using AND, which is exactly what we want.
        $articlesQuery = $this->Articles->find()->where($queryTermConditions);

        // Filtering data by associations is documented here:
        // https://book.cakephp.org/3.0/en/orm/query-builder.html#filtering-by-associated-data
        // Indeed, the example at that piece of documentation is exactly what we are trying to do here - filter articles
        // by their tags.
        if ($selectedTagId > 0) {
            $articlesQuery->matching('Tags', function (Query $query) use ($selectedTagId) {
                return $query->where(['Tags.id' => $selectedTagId]);
            });
        }

        $this->set('articles', $this->Paginator->paginate($articlesQuery));

        // Passed to the view so that we can show a drop down list of available tags for the user to select.
        $tagList = $this->Articles->Tags->find('list');
        $this->set('tagList', $tagList);

        // Pass the query the user asked for to the view, so we can say something like "Results for 'Blah'..." to
        // confirm that we did indeed search what they asked us to. It also means that we can populate the search
        // text input with the string, so the user can perform the search again.
        $this->set('query', $queryTermsString);
        $this->set('selectedTagId', $selectedTagId);

    }

    /**
     * View method
     *
     * @param null $slug
     * @return Response|void
     */

    // Eventually we want to only show published articles to guest users. Alternatively, admin users can see any article regardless
    // of the published status.
    public function view($slug = null)
    {
        $article = $this->Articles->findBySlug($slug)->contain(['Tags'])
            ->firstOrFail();
        $this->set(compact('article'));

        if (true){//$article->published || Role::isAdmin($this->Auth->user())) {
            $view = new ArticleView([
                'article_id' => $article->id,
                'user_id' => 1 //$this->Auth->user()['id']
            ]);
            $this->ArticleViews->save($view);
            $this->viewBuilder()->setLayout('default');
            $this->set(compact('article'));
        } else {
            throw new \Cake\Http\Exception\NotFoundException("Article not found");
        }

        $this->paginate=[
            'limit'=>'1'
        ];
    }

    /**
     * Add method
     *
     * @return Response|null Redirects on successful add, renders view otherwise.
     */

    public function add()
    {
        $article = $this->Articles->newEntity();
        if ($this->getRequest()->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());

            $article->user_id = $this->Auth->user('id');

            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Your article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your article.'));
        }

        $tags = $this->Articles->Tags->find('list');

        $this->set('tags', $tags);
        $this->set('article', $article);

        $this->render('add');
    }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return Response|null Redirects on successful edit, renders view otherwise.
     * @throws NotFoundException When record not found.
     */
    public function edit($slug)
    {
        $article = $this->Articles->findBySlug($slug)->contain(['Tags'])
            ->firstOrFail();
        if ($this->request->is(['post', 'put'])) {
            $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Your article has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your article.'));
        }
        $tags = $this->Articles->Tags->find('list');

        $this->set('tags', $tags);

        $this->set('article', $article);
    }



    public function tags()
    {
        // The 'pass' key is provided by CakePHP and contains all
        // the passed URL path segments in the request.
        $tags = $this->request->getParam('pass');

        // Use the ArticlesTable to find tagged articles.
        $articles = $this->Articles->find('tagged', [
            'tags' => $tags
        ]);

        // Pass variables into the view template context.
        $this->set([
            'articles' => $articles,
            'tags' => $tags
        ]);
    }

    public function publish($slug)
    {
        $article = $this->Articles->findBySlug($slug)->firstOrFail();
        if ($article == null) {
            throw new \Cake\Http\Exception\NotFoundException();
        }

        $article->published = true;

        if ($this->Articles->save($article)) {
            $this->Flash->success(__('Your article has been published.'));
        } else {
            $this->Flash->error(__('Unable to publish your article.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function hide($id = null)
    {
        $article = $this->Articles->get($id);
        if ($article == null) {
            throw new \Cake\Http\Exception\NotFoundException();
        }

        $article->published = false;

        if ($this->Articles->save($article)) {
            $this->Flash->success(__('Your article is now hidden.'));
        } else {
            $this->Flash->error(__('Unable to hide your article.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function archive($id = null)
    {
        $article = $this->Articles->get($id);
        if ($article == null) {
            throw new \Cake\Http\Exception\NotFoundException();
        }

        // If an article is archived, it is "unpublished" as well
        $article->archived = true;
        $article->published = false;

        if ($this->Articles->save($article)) {
            $this->Flash->success(__('Your article has been archived.'));
        } else {
            $this->Flash->error(__('Unable to archive your article.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function restore($id = null)
    {
        $article = $this->Articles->get($id);
        if ($article == null) {
            throw new \Cake\Http\Exception\NotFoundException();
        }

        $article->archived = false;

        if ($this->Articles->save($article)) {
            $this->Flash->success(__('Your article has been restored.'));
        } else {
            $this->Flash->error(__('Unable to restore your article.'));
        }

        return $this->redirect(['action' => 'archiveIndex']);
    }


    public function archiveIndex()
    {
        $archivedArticles = TableRegistry::get('Articles')->find('all')->where(['Articles.archived' => true])->contain([]);
        $this->set('archivedArticles', $this->paginate($archivedArticles));
    }



    /**
     * This checks for articles containing an exact phrase in either the title or the body.
     * @see advancedSearch() For a much more comprehensive search.
     */
    public function search()
    {
        // Only displaying non-archived articles
        //This code can be improved on by extracting finder code into method
        //$articles = $this->Paginator->paginate($this->Articles->nonArchived());

        //$articles = $this->Paginator->paginate($this->Articles->find('all')->where(['Articles.archived' => false])->contain([]));

        // The URL for this simple search is "/articles/simple-search?query=...". We are interested in the "?query=..."
        // part which is the search text entered by the user.
//        $queryTerms = $this->getRequest()->getQuery('query');
//
//        // The only thing we need to do to these search terms is to turn them into a wildcard to work correctly with
//        // the LIKE clause. This allows for matching articles where the title or body CONTAINS the search terms.
//        $queryTermsWithWildCard = '%' . $queryTerms . '%';
//
//        // Note that we are happy for either the title or the body to match. We also need to search for articles that
//        //        // haven't been archived
//        $articles = $this->Paginator->paginate($this->Articles->find()->where([
//            'AND' => [
//                'Articles.archived' => false,
//                'OR' => [
//                    'title LIKE' => $queryTermsWithWildCard,
//                    'body LIKE' => $queryTermsWithWildCard,
//            ]]
//        ]));

        $queryTermsString = $this->getRequest()->getQuery('query');
        $selectedTagId = (int)$this->getRequest()->getQuery('tag');

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
                    'Articles.archived' => false,
                    'OR' => [
                        'Articles.title LIKE' => "%{$term}%",
                        'Articles.body LIKE' => "%{$term}%",
                    ]]];
        }

        // Once we have a collection of or (title LIKE ... OR body LIKE ...) statements, then we need to combine each
        // one using an AND (see comments above for example). By default, if we provide an array of conditions to
        // the where() method, then it will join them all together using AND, which is exactly what we want.
        $articlesQuery = $this->Articles->find()->where($queryTermConditions);

        // Filtering data by associations is documented here:
        // https://book.cakephp.org/3.0/en/orm/query-builder.html#filtering-by-associated-data
        // Indeed, the example at that piece of documentation is exactly what we are trying to do here - filter articles
        // by their tags.
        if ($selectedTagId > 0) {
            $articlesQuery->matching('Tags', function (Query $query) use ($selectedTagId) {
                return $query->where(['Tags.id' => $selectedTagId]);
            });
        }

        $this->set('articles', $this->Paginator->paginate($articlesQuery));

        // Passed to the view so that we can show a drop down list of available tags for the user to select.
        $tagList = $this->Articles->Tags->find('list');
        $this->set('tagList', $tagList);

        // Pass the query the user asked for to the view, so we can say something like "Results for 'Blah'..." to
        // confirm that we did indeed search what they asked us to. It also means that we can populate the search
        // text input with the string, so the user can perform the search again.
        $this->set('query', $queryTermsString);
        $this->set('selectedTagId', $selectedTagId);
    }

}