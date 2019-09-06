<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\JobHistory $jobHistory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Job Histories'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="jobHistories form large-9 medium-8 columns content">
    <?= $this->Form->create($jobHistory) ?>
    <fieldset>
        <legend><?= __('Add Job History') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('company');
            echo $this->Form->control('job_description');
            echo $this->Form->control('date_start');
            echo $this->Form->control('date_finish', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
