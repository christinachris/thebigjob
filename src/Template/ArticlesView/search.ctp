<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\job[] $jobs
 * @var string[] $tagList
 * @var string $query
 * @var int $selectedTagId
 */

?>

<!DOCTYPE html>
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
        padding-right:0;
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
        color:#bfbfbf;
    }

    table{
        background-color: #ffffff;
    }

    table td.action-col{
        color:black;
    }

    .page-link {
        color: #000;

    }
    .card-body{
        box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
    }
    div.input.text{
        background-color: transparent;
    }

    .col1 {
        float: left;
        width: 80%;
        margin-bottom: 20px;
    }
    .col2 {
        float: left;
        width: 20%;
        margin-bottom: 20px;
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

<div class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-start text-left mb-5">
            <div class="col-lg-3">
                <h2 class="font-weight-bold text-black">Search Results</h2>
            </div>


            <div class="col-lg-9 float-right">
                <?= $this->Form->create(null, ['url' => ['controller' => 'jobsView', 'action' => 'search', 'class' => 'search-box-wrapper'], 'method' => 'GET']) ?>

                <div class="col1">
                    <?= $this->Form->control('query', ['label' => '', 'class' => 'form-control', 'value' => $query]) ?>
                </div>
                <div class="col2">
                    <?= $this->Form->button('Search', ['type' => 'submit', 'class' => 'btn btn-primary btn-block']) ?>
                </div>


                <?= $this->Form->end() ?>
            </div>
            <div class="subheading"><?= "Showing jobs that match \"{$query}\"" ?></div>
        </div>


        <?php foreach ($jobs as $job): ?>
            <div class="row">
                <div class="col-md-12">

                    <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

                        <div class="mb-4 mb-md-0 mr-5">
                            <div class="job-post-item-header d-flex align-items-center">
                                <h2 class="mr-3 text-black h4"><?= h($job->name) ?></h2>
                                <div class="badge-wrap">
                                    <span class="bg-primary text-white badge py-2 px-4"><?= $job->contract_type ?></span>
                                </div>
                            </div>
                            <div class="job-post-item-body d-block d-md-flex">
                                <div class="mr-3"><i class="fa fa-building" aria-hidden="true"></i>  Facebook, Inc.</div>
                                <div class="mr-3"><i class="fa fa-map-marker" aria-hidden="true"></i>  New York City, USA</div>
                                <div class="mr-3"><i class="fa fa-money" aria-hidden="true"></i>  <?= h($job->salary) ?> / per week</div>
                            </div>
                        </div>

                        <div class="ml-auto">
                            <a href="#" class="btn btn-secondary rounded-circle btn-favorite text-gray-500"><span class="icon-heart"></span></a>
                            <button class="btn btn-primary py-2"><?= $this->Html->link(__('Apply Job'), ['controller'=>'jobsview','action' => 'view',$job->id]) ?></button>
                        </div>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
        <!-- /.row -->


        <!-- Pagination -->
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
<!---->
<!--    <ul class="pagination justify-content-center">-->
<!--        <li class="page-item">-->
<!--            <a class="page-link" href="#" aria-label="Previous">-->
<!--                <span aria-hidden="true">&laquo;</span>-->
<!--                <span class="sr-only">Previous</span>-->
<!--            </a>-->
<!--        </li>-->
<!--        <li class="page-item">-->
<!--            <a class="page-link" href="#">1</a>-->
<!--        </li>-->
<!--        <li class="page-item">-->
<!--            <a class="page-link" href="#">2</a>-->
<!--        </li>-->
<!--        <li class="page-item">-->
<!--            <a class="page-link" href="#">3</a>-->
<!--        </li>-->
<!--        <li class="page-item">-->
<!--            <a class="page-link" href="#" aria-label="Next">-->
<!--                <span aria-hidden="true">&raquo;</span>-->
<!--                <span class="sr-only">Next</span>-->
<!--            </a>-->
<!--        </li>-->
<!--    </ul>-->

</div>
