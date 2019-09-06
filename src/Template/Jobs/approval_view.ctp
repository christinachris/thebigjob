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

        .topnav a.active {
            background-color: #cbcccf;
            color: #ffffff;
            font-weight: bolder;
            font-size: 16px;
            padding-right: 60px;
            padding-left: 60px;
            font-family: "Source Sans Pro", Helvetica, sans-serif;
        }

        ul.pagination-show-inline-block li {
            display: inline-block;
            margin: 10px;
            color:#bfbfbf;
        }

        table{
            background-color:#ffffff;
            box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
        }

        table th{
            width:150px;
        }

        .applications td, #applications th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .applications tr:nth-child(even){background-color: #f2f2f2;}

        .applications tr:hover {background-color: #ddd;}

        .applications th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #ffffff;
            color: #4f5f6f;
            border: 1px solid #ddd;
        }
        .pull-right.btn.btn-oval.btn-primary{
            margin: 0px 0px 12px;
            padding: 6px 12px;
        }
        .created{
            background-color: #ffffff;
            width: 100%;
        }
        .job_detail{
            margin-bottom: 50px;
        }

        .column1{

            float: left;
            width: 100%;
            padding: 0 10px;
        }

        .card1 {
            box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
            background-color: #FFFFFF;
            padding: 16px;
        }
        .created{
            font-size: 12px;
        }



    </style>

</head>


<div class="title-block">
    <div class="title">
        <?= $job->isNew() ? 'View' : 'View' ?> Job Details
        <span class="topnav">
            <a><?php echo $this->Html->link(__('Approve'), ['action' => 'job_approval'],['class' => 'pull-right btn btn-oval btn-primary']) ?></a>
        </span>
    </div>
</div>

<div class="row">
    <div class="column1">
        <div class="card1">
            <div class="job_detail">
                <p class="created"><?= $job->created ?></p>
                <h3>Position</h3>
                <p><?= h($job->name) ?></p>
                <hr>
                <h3>Salary</h3>
                <p><?= '$'.h($job->salary) ?></p>
                <hr>
                <h3>Contract type</h3>
                <p><?= $job->contract_type ?></p>
                <hr>
                <h3>Description</h3>
                <p><?= $job->job_details ?></p>
                <hr>
                <div class="applications">
                    <h3><?= __('Related Applications') ?></h3>
                    <?php if (!empty($job->applications)): ?>
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <th scope="col"><?= __('Candidate Name') ?></th>
                                <th scope="col"><?= __('Date') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>

                            <?php foreach ($job->applications as $applications): ?>
                                <tr>
                                    <td><?= h($applications->candidate_id) ?></td>
                                    <td><?= h($applications->date) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'Applications', 'action' => 'view', $applications->id]) ?>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>



</div>


</div>
