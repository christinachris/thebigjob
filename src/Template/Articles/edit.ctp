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



    #tag-info{
        animation:blinkingText 6.0s infinite;
        color: red;
        font-size: 16px;
    }
    @keyframes blinkingText{
        70%{     color: black;    }
        80%{    color: transparent; }
        90%{    color: transparent; }
        99%{    color:transparent;  }
        100%{   color: #000;    }
    }
    </style>
<div class="title-block">
    <div class="title">
        <?= $article->isNew() ? 'Edit' : 'Edit' ?> article
        <span class="topnav">
            <?php if ($article->published) { ?>
                <a><?= $this->Form->postLink(__('Archive'), ['action' => 'archive', $article->id],['class' => 'pull-right btn btn-oval btn-primary']) ?></a>
                <a><?= $this->Form->postLink(__('Hide'), ['action' => 'hide', $article->id],['class' => 'pull-right btn btn-oval btn-primary']) ?></a>
                <a><?= $this->Form->postLink(__('Preview'), ['action' => 'view', $article->slug],['class' => 'pull-right btn btn-oval btn-primary']) ?></a>
            <?php } else {?>
                <a><?= $this->Form->postLink(__('Archive'), ['action' => 'archive', $article->id],['class' => 'pull-right btn btn-oval btn-primary']) ?></a>
                <a><?= $this->Form->postLink(__('Publish'), ['action' => 'publish', $article->slug],['class' => 'pull-right btn btn-oval btn-primary']) ?></a>
                <a><?= $this->Form->postLink(__('Preview'), ['action' => 'view', $article->slug],['class' => 'pull-right btn btn-oval btn-primary']) ?></a>
            <?php } ?>
        </span>
    </div>
</div>

<div class="row">
    <div class="col-md-9">
        <div class="card">
            <?= $this->Form->create($article,['id'=>'article-form']) ?>
            <fieldset>

                   <?php  echo $this->Form->control('title');?>
                   <?php echo $this->Form->control('body');
                    if (!$article->isNew()) {
                        // Don't prompt the user to enter a slug when first creating the article. We will create one
                        // automatically in the Controller or Model. However, once the article is created, it may be
                        // desirable for the user to change the slug.
                        echo $this->Form->control('slug');
                    }?>
                   <?php echo $this->Form->control('Tags', ['type' => 'text']); ?>
            </fieldset>
            <div id="tag-info">
                <a>Prompt: When enter tags, please separate by comma!</a>
            </div>
            <?= $this->Form->button(__('Save Article')) ?>
            <?= $this->Html->link('Manage tags', ['controller' => 'tags'], ['class' => 'btn btn-sm btn-oval manage-tags btn-secondary', 'target' => '_blank']); ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

