<?php
/**
 * @var AppView $this
 * @var Posts $post
 */
use App\Model\Entity\Posts;
use App\View\AppView;
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $post->name],
                ['confirm' => __('Are you sure you want to delete # {0}?', $post->name)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Back'), ['action' => 'index']) ?></li>
    </ul>
</nav>

<!--<div class = "row">-->
<!--    <div class="col-md-6 offset-md-3">-->
<!--        <div class="card-body">-->
<!--            --><?php //echo $this->Form->create(null,['enctype'=>'multipart/form-data']);?>
<!--            <div class="form-group">-->
<!--                --><?php //echo $this->Form->file('file',['class'=>'form-control']);?>
<!--            </div>-->
<!--            --><?php
//            echo $this->Form->button('Upload',['class'=>'btn btn-primary']);
////            echo $this->Html->link('Back',['action'=>'index'],['class'=>'btn btn-success']);
//            echo $this->Form->end();
//            ?>
<!--        </div>-->
<!--    </div>-->
<!--</div>-->



