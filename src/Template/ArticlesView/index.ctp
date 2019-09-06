<?php
/**
 * @var AppView $this
 * @var Article[]|CollectionInterface $articles
 */

use App\Model\Entity\Article;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

?>

<!DOCTYPE html>

<head>

    <style>

        .topnav {
            overflow: hidden;


        }

        .topnav a {
            float: right;
            color: #bfbfbf;
            text-align: center;
            padding: 8px 16px;
            text-decoration: none;
            font-size: 13px;
            padding-right: 0;
        }

        .topnav a:hover {
            color: #a8a9ac;

        }

        /*.topnav a.active {*/
        /*background-color: #cbcccf;*/
        /*color: #ffffff;*/
        /*font-weight: bolder;*/
        /*font-size: 16px;*/
        /*padding-right: 60px;*/
        /*padding-left: 60px;*/
        /*font-family: "Source Sans Pro", Helvetica, sans-serif;*/
        /*}*/

        ul.pagination-show-inline-block li {
            display: inline-block;
            margin: 10px;
            color: #bfbfbf;
        }

        table {
            background-color: #ffffff;
        }

        table td.action-col {
            color: black;
        }

        .page-link {
            color: #000;

        }

        .card-body {
            box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.1);
        }

        div.input.text {
            background-color: transparent;
            float: left;
            width: 80%;
        }

        button.btn.btn-primary.btn-block {
            float: left;
            width: 20%;
            margin-top: 33px;

        }

        .search-box-wrapper {
            display: inline-flex;
            font-size: 16px;
        }

        .search-box-input {
            float: right;
            width: 50%;
        }

        .search-box-button {
            margin-top: 10px;
            float: right;
            width: 95%;
        }

    </style>
</head>

</div>

<div class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-start text-left mb-5">
            <div class="col-lg-3" data-aos="fade">
                <h2 class="font-weight-bold text-black">Jobs</h2>
            </div>
            <div class="col-lg-9" data-aos="fade">
                <?= $this->Form->create(null, ['url' => ['controller' => 'JobsView', 'action' => 'search', 'class' => 'search-box-wrapper'], 'method' => 'GET']) ?>

                <div class="col1">
                    <?= $this->Form->control('query', ['label' => '', 'class' => 'form-control', 'value' => $query]) ?>
                </div>
                <div class="col2">
                    <?= $this->Form->button('Search', ['type' => 'submit', 'class' => 'btn btn-primary btn-block']) ?>
                </div>


                <?= $this->Form->end() ?>
            </div>

        </div>

        <?php foreach ($articles as $article): ?>
            <div class="row" data-aos="fade">
                <div class="col-md-12">

                    <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

                        <div class="mb-4 mb-md-0 mr-5">
                            <div class="job-post-item-header d-flex align-items-center">
                                <h2 class="mr-3 text-black h4"><?= h($article->title) ?></h2>
                                <div class="badge-wrap">
                                    <span class="bg-primary text-white badge py-2 px-4"><?= $article->created ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="ml-auto">
                            <a href="#" class="btn btn-secondary rounded-circle btn-favorite text-gray-500"><span class="icon-heart"></span></a>
                            <button class="btn btn-primary py-2"><?= $this->Html->link(__('View'), ['controller'=>'ArticlesView','action' => 'view',$article->slug]) ?></button>
                        </div>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
        <?php
        $paginator = $this->Paginator->setTemplates([
            'number'=>'<li class="page-item"><a href="{{url}}" class="page-link">{{text}}</a></li>',
            'current'=>'<li class="page-item active"><a href="{{url}}" class="page-link">{{text}}</a></li>',
            'first'=>'<li class="page-item"><a href="{{url}}" class="page-link">&laquo;</a></li>',
            'last'=>'<li class="page-item"><a href="{{url}}" class="page-link">&raquo;</a></li>',
            'prevActive'=>'<li class="page-item"><a href="{{url}}" class="page-link">&lt;</a></li>',
            'nextActive'=>'<li class="page-item"><a href="{{url}}" class="page-link">&gt;</a></li>'
        ]);

        ?>
        <nav>
            <ul class="pagination">
                <?php
                echo $paginator->first();
                if($paginator->hasPrev()){
                    echo $paginator->prev();
                }
                echo $paginator->numbers();
                if($paginator->hasNext()){
                    echo $paginator->next();
                }
                echo $paginator->last();
                ?>
            </ul>
        </nav>

        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>

    </div>
</div>


</div>
