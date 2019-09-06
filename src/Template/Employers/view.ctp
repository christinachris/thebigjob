<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employer $employer
 */
?>

<?php
/**
 * @var AppView $this
 * @var Job $job
 */

use App\Model\Entity\Employer;
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
        .employer_detail{
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

    </style>

</head>


<div class="title-block">
    <div class="title">
        Employer Details
        <span class="topnav">
            <a><?php echo $this->Html->link(__('Edit'), ['controller' => 'employers','action'=>'edit',$this->request->getSession()->read('Auth.User.id')],['class' => 'pull-right btn btn-oval btn-primary']) ?></a>
        </span>
    </div>
</div>

<div class="row">
    <div class="column1">
        <div class="card1">
            <div class="employer_detail">
                <h3>Company Name</h3>
                <?= $employer->company_name ?>
                <hr>
                <h3>Industry</h3>
                <p><?= h($employer->industry) ?></p>
                <hr>
                <h3>Address</h3>
                <p><?= $employer->location ?></p>
                <hr>
                <h3>Email</h3>
                <p><?= h($employer->email) ?></p>
                <hr>
                <h3>Contact No.</h3>
                <p><?= h($employer->contact_no) ?></p>
                <hr>
                <h3>Website</h3>
                <p><?= $employer->web_url ?></p>
                <hr>
                <h3>About</h3>
                <p><?= $employer->about ?></p>
            </div>
        </div>
    </div>



</div>



