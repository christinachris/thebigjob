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
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>

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
        .col1 {
            float: left;
            width: 85%;
            margin-bottom: 20px;
        }
        .col2 {
            float: right;
            width: 15%;
            margin-bottom: 20px;
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
        .search-box-wrapper {
            display: inline-flex;
            font-size: 16px;
        }

        .search-box-input {
            font-size: inherit;
            border: 0.05em solid #85ce36;
            /*border-radius: 0.5em 0 0 0.5em;*/
            padding: 0.2em 0.5em;
            outline: 0;
            float: right;
            width: 50%;
        }

        .search-box-input:hover,
        .search-box-input:focus {
            border-color: #85ce36;
        }

        .search-box-button {
            font-size: inherit;
            border: 0.2em solid #85ce36;
            /*border-radius: 0 0.5em 0.5em 0;*/
            background-color: #85ce36;
            border-left: 0;
            color: white;
            font-weight: bold;
            outline: 0;
            cursor: pointer;
            float: right;
            width: 95%;
        }

        .search-box-button:hover,
        .search-box-button:focus {
            border-color: #85ce36;
            background-color: #85ce36;
        }

    </style>
</head>



<div class="title-block">
    <div class="title">
        Jobs
        <?= $this->Form->create(null, ['url' => ['controller' => 'jobs', 'action' => 'search','class'=>'search-box-wrapper'], 'method' => 'GET']) ?>
            <div class="col1">
                <?= $this->Form->control('query', ['label' => '', 'class' => 'search-box-input', 'value' => $query]) ?>
            </div>
            <div class="col2">
                <?= $this->Form->button('Search', ['type' => 'submit','class'=>'search-box-button']) ?>
                <div style="margin-top: 20px"
                    <?= $this->Html->link('Add Job Listing', ['action' => 'add'], ['class' => 'pull-right btn btn-oval btn-primary']) ?>
                </div>
            </div>
            <?= $this->Form->end() ?>
        </div>

</div>

<div class="card card-block">
    <table class="table">
        <thead>
        <tr>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('published') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($jobs as $job): ?>
            <tr class="article-row <?= $job->published ? 'published' : 'unpublished' ?>">
                <td style="width: 40%">
                    <?= $this->Html->link($job->name, ['action' => 'view', $job->id]) ?>
                </td>
                <td>
                    <?php if ($job->published == true){ ?>
                        <i class="fa fa-check"></i>
                    <?php } elseif (($job->sentforapproval == true)) {?>
                        <i class="fa fa-spinner"></i>
                    <?php } else {?>
                        <i class="fa fa-times"></i>
                    <?php } ?>
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
                        <?= $this->element('EmployerAdmin/Buttons/approval', ['url' => ['action' => 'approval', $job->id]]) ?>
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



