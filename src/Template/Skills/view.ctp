<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Skill $skill
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Skill'), ['action' => 'edit', $skill->candidate_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Skill'), ['action' => 'delete', $skill->candidate_id], ['confirm' => __('Are you sure you want to delete # {0}?', $skill->candidate_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Skills'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Skill'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="skills view large-9 medium-8 columns content">
    <h3><?= h($skill->candidate_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Candidate Id') ?></th>
            <td><?= $this->Number->format($skill->candidate_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Skill Name') ?></th>
            <td><?= $this->Number->format($skill->skill_name) ?></td>
        </tr>
    </table>
</div>
