<?php
/**
 * @var AppView $this
 * @var Job $job
 */

use App\Model\Entity\Job;
use App\View\AppView;

?>

<head>

    <style>
        button.apply {
            width:100%;
            background-color: #00ccbe;
            color: #FFFFFF;
            border-radius: 0;
            padding: 20px;
            font-weight: bolder;
            font-size: large;
        }
        .created{
            background-color: #ffffff;
            width: 100%;
        }
        .job_detail{
            margin-bottom: 50px;
        }
        .job_title{
             margin-top: 30px;
         }
        .column1{

             float: left;
             width: 70%;
             padding: 0 10px;
         }

        .column2{

            float: left;
            width: 30%;
            padding: 0 10px;
        }
        .card1 {
            box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
            background-color: #FFFFFF;
            padding: 16px;
        }
        .card2 {
            box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
            background-color: #FFFFFF;
            padding: 16px;
            text-align: center;
            margin-bottom: 10px;
        }
        .card3 {
            box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
            background-color: #FFFFFF;
            padding: 16px;
        }

        .breadcrumb{
            background-color: transparent;
            margin: 0;
            padding: 0;
        }
        .breadcrumb li {
            display: inline;
            font-size: 14px;
        }
        .breadcrumb li+li:before {
            padding: 8px;
            color: rgba(0,0,0,0.75);
            content: "\003e";
        }
        .breadcrumb li a {
            color: rgba(0,0,0,0.75);
            text-decoration: none;
        }
        .breadcrumb li a:hover {
            color: rgba(0,0,0,0.75);
            text-decoration: underline;
        }

    </style>

</head>
<div class="unit-5 overlay" style="background-image: url('images/hero_bg_2.jpg');">
    <div class="container text-center">
        <h2 class="mb-0"><?= h($job->name) ?></h2>
        <p class="mb-0 unit-6"> <?= $this->Html->link(__('Home'), ['controller'=>'pages'],['action' => 'home']) ?> <span class="sep">></span><?= $this->Html->link(__('Jobs'), ['action' => 'index']) ?> <span class="sep">></span><span><?= h($job->name) ?></span>
        </p>
    </div>
</div>




<div class="site-section bg-light">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-lg-8 mb-5">



                <div class="p-5 bg-white">

                    <div class="mb-4 mb-md-5 mr-5">
                        <div class="job-post-item-header d-flex align-items-center">
                            <?= $this->Flash->render(); ?>
                            <br>
                            <h2 class="mr-3 text-black h4"><?= h($job->name) ?></h2>
                            <div class="badge-wrap">
                                <span class="bg-danger text-white badge py-2 px-4"><?= h($job->contract_type) ?></span>
                            </div>
                        </div>
                        <div class="job-post-item-body d-block d-md-flex">
                            <div class="mr-3"><span class="fl-bigmug-line-portfolio23"></span> <a href="#" style="color: lightpink">New York Times</a></div>
                            <div><span class="fl-bigmug-line-big104"></span> <span>New York City, USA</span></div>
                        </div>
                    </div>

                     <p><?= $job->job_details ?></p>
                     <hr>
                    <h2 class="mr-3 text-black h4">About</h2>
                    <p>About this company</p>
                    <hr>
                </div>
            </div>

            <div class="col-lg-4">


                <div class="p-4 mb-3 bg-white">
                    <h3 class="h5 text-black mb-3">More Info</h3>
                    <h3 class="h5 text-black mb-3">Salary</h3>
                    <p><?= '$'.h($job->salary) ?></p>
                    <hr>
                    <h4 class="h5 text-black mb-3">Contract type</h4>
                    <p><?= $job->contract_type ?></p>
                    <hr>
                    <p><button class="btn btn-primary  py-2 px-4"><?= $this->Html->link(__('Apply now'), ['action' => 'applyform',$job->id]) ?></button></p>
                </div>
            </div>
        </div>
    </div>
</div>
