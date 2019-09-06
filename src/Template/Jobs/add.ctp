<?php
/**
 * @var AppView $this
 * @var Job $job
 */

use App\Model\Entity\Job;
use App\View\AppView;

?>
<style xmlns="http://www.w3.org/1999/html">
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
    .topnav a.active {
        background-color: #cbcccf;
        color: #ffffff;
        font-weight: bolder;
        font-size: 16px;
        padding-right: 60px;
        padding-left: 60px;
        font-family: "Source Sans Pro", Helvetica, sans-serif;
    }
    .card{
        background-color: #ffffff;
        -moz-box-shadow:0 0 3px #cbcccf;
        -webkit-box-shadow:0 0 3px #cbcccf;
        box-shadow:0 0 3px #cbcccf;
        width: 700px;
    }
    label {
        width: 100%;
    }
    select {
        width: 100%;
    }
    textarea {
        width: 100%;
    }
    .ct{
        margin-top: 20px;
    }
    .div2{
        margin-top: 20px;
    }
    .div3{
        margin-top: 20px;
    }
    button {
        background-color: #343876;
        border: none;
        color: white;
        padding: 16px 32px;
        text-align: center;
        font-size: 16px;
        margin: 4px 2px;
        opacity: 0.6;
        transition: 0.3s;
        display: inline-block;
        text-decoration: none;
        cursor: pointer;
    }
    button:hover {opacity: 1}

</style>

<div class="title-block">
    <div class="title">
        <?= $job->isNew() ? 'Post' : 'add' ?> Job
        <span class="topnav">
            <a><?php echo $this->Html->link(__('List Jobs'), ['action' => 'index'],['class' => 'pull-right btn btn-oval btn-primary']) ?></a>
        </span>
    </div>
</div>

<div class="row">
    <div class="col-md-9">
        <div class="card">
            <?= $this->Form->create($job,['id'=>'job-form']) ?>
            <fieldset>
                <?php echo $this->Form->control('name',array('maxlength'=>'200'));?>
                <label class="ct" for="ct">Contract Type</label>
                <?php echo $this->Form->select(
                    'contract_type',
                    ['Part-Time'=>'Part-Time'
                        , 'Full-Time'=>'Full-Time'
                        , 'Contract'=>'Contract'
                        , 'Casual'=>'Casual'],
                    ['empty' => '(Choose One)']);?>
                <label class="ct" for="ct">Classification</label>
                <?php echo $this->Form->select(
                    'classification',
                    ['IT'=>'IT'
                        , 'Accounting'=>'Acounting'
                        , 'Education'=>'Education'
                        , 'Arts & Media'=>'Arts & Media'
                    ,'Construction'=>'Construction',
                        'Human Resources'=>'Human Resources',
                        'Management'=>'Management'
                        ,'Sales'=>'Sales',
                        'Financial'=>'Financial'
                        ,'Legal'=>'Legal'
                        ,'Engineering'=>'Engineering',
                        'Consulting'=>'Consulting'
                        ,'Medical & Health Care'=>'Medical & Health Care'],
                    ['empty' => '(Choose One)']);?>
                    <?php echo $this->Form->control('job_details');?>
                    <p>(Maximum Words: 1000)</p>
                    <?php echo $this->Form->control('salary', ['label' => 'Salary']);?>
                </fieldset>
                <?= $this->Form->button(__('Save Job')) ?>
                <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<?php $this->start('script'); ?>
    <script>
        (function() {
            $("#job-form").validate({
                rules: {
                    title: {
                        required: true,
                        minlength: 10,
                        maxlength: 250
                    },
                    body: {
                        required: true,
                        minlength: 10,
                        maxlength: 1200
                    },
                }

            });
        })();
    </script>
<?php $this->end(); ?>
