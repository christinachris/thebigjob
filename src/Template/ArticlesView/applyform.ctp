<?php
/**
 * @var AppView $this
 * @var Job $job
 */

use App\Model\Entity\Job;
use App\View\AppView;

?>


    <style>
        * {
            -moz-box-shadow:0 0 3px #cbcccf;
        }

        /* Float four columns side by side */
        .column1 {
            float: left;
            width: 75%;
            padding: 0 10px;
        }
        .column2 {
            float: left;
            width: 25%;
            padding: 0 10px;
        }
        .column3 {
            float: left;
            width: 50%;
        }

        /* Remove extra left and right margins, due to padding */
        .row {margin: 0 -5px;}

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive columns */
        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
                display: block;
                margin-bottom: 20px;
            }
        }
        /* Style the counter cards */
        .card1 {
            padding: 16px;
            text-align: left;
            background-color: transparent;
            width: 100%;
            display: inline-block;
        }
        .card2 {
            padding: 16px;
            text-align: left;
            background-color: transparent;
            width: 100%;
            display: inline-block;
        }
        div.input{
            background-color: #FFFFFF;
        }
        /*fieldset{*/
            /*background-color: transparent;*/
        /*}*/
        /*label{*/
            /*font-size: 16px;*/
            /*font-weight: bold;*/
            /*width: 100%;*/
            /*color: #6b6b6b;*/
        /*}*/
        .ct{
            margin-top: 20px;
        }
        div.bt{
            margin-top:50px;
            margin-bottom:50px;
            display: flex;
            justify-content: center;
        }

        /*form {*/
            /*background: #ffffff;*/
            /*text-align: left;*/
            /*-webkit-box-shadow: 2px 2px 3px rgba(0,0,0,0.1);*/
            /*box-shadow: 2px 2px 3px rgba(0,0,0,0.1);*/
            /*padding: 30px;*/
        /*}*/

        /* Style the list */
        ul.breadcrumb {
            padding: 10px 16px;
            list-style: none;
            background-color: #eee;
        }

        /* Display list items side by side */
        ul.breadcrumb li {
            display: inline;
            font-size: 18px;
        }

        /* Add a slash symbol (/) before/behind each list item */
        ul.breadcrumb li+li:before {
            padding: 8px;
            color: black;
            content: "/\00a0";
        }

        /* Add a color to all links inside the list */
        ul.breadcrumb li a {
            color: #0275d8;
            text-decoration: none;
        }

        /* Add a color on mouse-over */
        ul.breadcrumb li a:hover {
            color: #01447e;
            text-decoration: underline;
        }

        label {
            display: block;
        }
</style>

<body>

<ul class="breadcrumb">
    <li><?= $this->Html->link(__('Home'), ['controller'=>'pages','action' => 'home']) ?></li>
    <li><?= $this->Html->link(__('Jobs'), ['controller'=>'jobsview','action' => 'index']) ?></li>
    <li><a href="javascript:history.go(-1)" title="Return to the previous page">Jobs view</a></li>
    <li>Apply form</li>
</ul>

<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8 mb-5">
                <div class="p-5 bg-white">

                        <div class="job-post-item-header d-flex align-items-center">
                            <h2 class="mr-3 text-black h4">Apply now</h2>
                        </div>
                        <p><?= $this->Form->create($candidate,['enctype'=>'multipart/form-data'])?>

                        <fieldset>
                            <?php echo $this->Form->control('first_name',['required'=>true,'style'=>'width:100%']);?>
                            <?php echo $this->Form->control('last_name',['required'=>true,'style'=>'width:100%']);?>
                            <?php echo $this->Form->control('email',['required'=>true,'style'=>'width:100%']);?>
                            <?php echo $this->Form->control('phone_no',['required'=>true,'style'=>'width:100%']);?>
                            <?php echo $this->Form->control('state',['required'=>true,'style'=>'width:100%']);?>
                            <?php echo $this->Form->control('country',['required'=>true,'style'=>'width:100%']);?>
                            <label class="ct" for="ct">Upload personal CV</label>


                            <?php echo $this->Form->radio('resumeSelect',
                            [
                                ['value' => 'selectResume', 'text' =>'Select a resume stored on Big Job'],
                                ['value' => 'uploadResume', 'text' => 'Upload a resume'],
                                ['value' => 'notInclude','text' => 'Do not include a resume']
                            ]
                            ); ?>

                            <?php echo $this->Form->file('file',['class'=>'form-control']);?>
                        </fieldset>

                        <div class="bt">
                            <?= $this->Form->button(__('Submit Application'),['class'=>'btn btn-primary  py-2 px-4']) ?>
                        </div>
                        <?= $this->Form->end() ?>
                        </p>

                        <div class="back"><?= $this->Html->link('Back',['action'=>'index']);?></div>

                </div>

            </div>
            <div class="col-lg-4">
                <div class="p-4 mb-3 bg-white">
                    <h3 class="h5 text-black mb-3">Position</h3>
                    <p><?= $job->name?></p>
                    <h3 class="h5 text-black mb-3">Description</h3>
                    <p><?= $job->job_details?></p>
                </div>
            </div>
        </div>
    </div>


</body>

    <!--    <div class="card-body">-->
    <!--        --><?php //echo $this->Form->create(null,['enctype'=>'multipart/form-data']);?>
    <!--        <div class="form-group">-->
    <!--            --><?php //echo $this->Form->file('file',['class'=>'form-control']);?>
    <!--        </div>-->
    <!--        --><?php
    //        echo $this->Form->button('Upload',['class'=>'btn btn-primaty']);
    //        echo $this->Html->link('Back',['action'=>'index'],['class'=>'btn btn-success']);
    //        echo $this->Form->end();
    //        ?>
    <!---->
    <!--    </div>-->



