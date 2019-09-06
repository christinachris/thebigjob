<?php
/**
 * @var AppView $this
 * @var Article $article
 */

use App\Model\Entity\Article;
use App\View\AppView;

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
        size: 700px;


    }
    label {
        width: 100%;
    }
    input {
        width: 100%;
    }
    textarea {
        width: 100%;
        height: 400px;

    }

    button {
        background-color: #343876;
        border: none;
        color: white;
        padding: 10px 18px;
        text-align: center;
        font-size: 14px;
        margin: 8px 2px;
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
        <?= $article->isNew() ? 'Add' : 'Edit' ?> article
        <span class="topnav">
            <a><?php echo $this->Html->link(__('List Articles'), ['action' => 'index'],['class' => 'pull-right btn btn-oval btn-primary']) ?></a>

        </span>
    </div>
</div>

<div class="row">
    <div class="col-md-9">
        <div class="card">
            <?= $this->Form->create($article,['id'=>'add-form']) ?>
            <fieldset >
                   <?php  echo $this->Form->control('title');?>
                   <?php echo $this->Form->control('body',array('maxlength'=>'10'));?>
                    <p>(Maximum Words: 1200)</p>
                   <?php echo $this->Form->control('Tags', ['type' => 'text']); ?>
            </fieldset>
            <?= $this->Form->button(__('Save Article')) ?>
            <?= $this->Html->link('Manage tags', ['controller' => 'tags'], ['class' => 'btn btn-sm btn-oval manage-tags btn-secondary', 'target' => '_blank']); ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

</div>
<?php $this->start('script'); ?>
<script>
    (function() {
        $("#add-form").validate({
            rules: {
                title: {
                    required: true,
                    minlength: 1,
                    maxlength: 250
                },
                body: {
                    required: true,
                    minlength: 1,
                    maxlength: 1200
                },
            }

        });
    })();
</script>
<?php $this->end(); ?>

