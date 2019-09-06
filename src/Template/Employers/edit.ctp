<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employer $employer
 */
?>

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
        Edit Employer Details
    </div>
</div>

<div class="row">
    <div class="col-md-9">
        <div class="card">
            <?= $this->Form->create($employer,['id'=>'employer-form']) ?>
            <fieldset>
                <?php echo $this->Form->control('company_name');?>
                <?php echo $this->Form->control('industry');?>
                <?php echo $this->Form->control('location');?>
                <?php echo $this->Form->control('email');?>
                <?php echo $this->Form->control('contact_no');?>
                <?php echo $this->Form->control('web_url');?>
                <?php echo $this->Form->control('about');?>
            </fieldset>
            <?= $this->Form->button(__('Save')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<?php $this->start('script'); ?>
<script>
    (function() {
        $("#employer-form").validate({
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


