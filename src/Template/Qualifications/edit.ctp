<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Qualification $qualification
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $qualification->candidate_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $qualification->candidate_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Qualifications'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="qualifications form large-9 medium-8 columns content">
    <?= $this->Form->create($qualification) ?>
    <fieldset>
        <legend><?= __('Edit Qualification') ?></legend>
        <?php
            echo $this->Form->control('degree_name');
            echo $this->Form->control('degree_level');
            echo $this->Form->control('expected_graduation_date');
            echo $this->Form->control('gpa');
            echo $this->Form->control('major');
            echo $this->Form->control('institution');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
