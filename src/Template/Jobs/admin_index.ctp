<?php
/**
 * @var AppView $this
 * @var Job[]|CollectionInterface $jobs
 */

use App\Model\Entity\Job;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

?>


<!DOCTYPE html>

<head>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;

        }

        .topnav {
            overflow: hidden;
            background-color: #ffffff;


        }

        .topnav a {
            float: right;
            color: #bfbfbf;
            text-align: center;
            padding: 8px 16px;
            text-decoration: none;
            font-size: 13px;
            padding-right:0;
        }

        .topnav a:hover {
            color: #a8a9ac;
        }

        /*.topnav a.active {*/c
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
                                  color:#bfbfbf;
                              }

        table{
            background-color: #ffffff;
        }

        table td.action-col{
            color:black;
        }

        th > a:after {
            content: " \f0dc";
            font-family: FontAwesome;
        }
        th > a.asc:after {
            content: " \f0dd";
            font-family: FontAwesome;
        }
        th > a.desc:after {
            content: " \f0de";
            font-family: FontAwesome;
        }


    </style>
</head>



<div class="title-block">
    <div class = "row">
        <div class="col">
            <div class="title">
                Jobs
            </div>
        </div>
        <div class="col">

        <!-- Search form -->

            <?= $this->Form->create(null, ['url' => ['controller' => 'jobs', 'action' => 'search'], 'method' => 'GET']) ?>

                <div class="search-field">
                    <?= $this->Form->control('query', ['label' => '', 'class' => 'form-control', 'value' => $query]) ?>
                </div>
                <div class="search-button">
                    <?= $this->Form->button('Search', ['type' => 'submit']) ?>
                    <?= $this->Form->end() ?>
                </div>
        </div>

    </div>

</div>

<div class="card card-block">

    <table class="table">
        <thead>
        <tr>

            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($jobs as $job): ?>
            <tr class="article-row <?= $job->published ? 'published' : 'unpublished' ?>">
                <td style="width: 40%">
                    <?= $this->Html->link($job->name, ['action' => 'view', $job->id]) ?>
                </td>
                <td>
                    <?= $job->created->timeAgoInWords() ?>
                </td>
                <td class="action-col">
                    <?php if ($job->published) { ?>
                        <?= $this->element('Admin/Buttons/view', ['url' => ['action' => 'view', $job->id]]) ?>
                        <?= $this->element('Admin/Buttons/hide', ['url' => ['action' => 'hide', $job->id]]) ?>
                        <?= $this->element('Admin/Buttons/archive', ['url' => ['action' => 'archive', $job->id]]) ?>
                    <?php } else {?>
                        <?= $this->element('Admin/Buttons/view', ['url' => ['action' => 'view', $job->id]]) ?>
                        <?= $this->element('Admin/Buttons/publish', ['url' => ['action' => 'publish', $job->id]]) ?>
                        <?= $this->element('Admin/Buttons/archive', ['url' => ['action' => 'archive', $job->id]]) ?>
                    <?php } ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>



</div>

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



