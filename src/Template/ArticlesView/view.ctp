<?php
/**
 * @var AppView $this
 * @var Article $article
 */

use App\Model\Entity\Article;
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



<div class="site-section bg-light">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-lg-8 mb-5">



                <div class="p-5 bg-white">

                    <div class="mb-4 mb-md-5 mr-5">
                        <div class="job-post-item-header d-flex align-items-center">
                            <h2 class="mr-3 text-black h4"><?= h($article->title) ?></h2>
                        </div>
                        <div class="job-post-item-body d-block d-md-flex">
                            <div class="mr-3"> <a style="color: lightpink"><?= $article->created ?></a></div>
                        </div>
                    </div>

                    <p><?= $article->body ?></p>

                </div>
            </div>

            <div class="col-lg-4">


                <div class="p-4 mb-3 bg-white">
                    <h3 class="h5 text-black mb-3">More Info</h3>
                    <h3 class="h5 text-black mb-3">Salary</h3>
                    <p><?= '$'.h($article->slug) ?></p>
                    <hr>
                    <h4 class="h5 text-black mb-3">Contract type</h4>
                    <p><?= $article->created ?></p>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
