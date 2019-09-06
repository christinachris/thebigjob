<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Qualification $qualification
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Qualification'), ['action' => 'edit', $qualification->candidate_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Qualification'), ['action' => 'delete', $qualification->candidate_id], ['confirm' => __('Are you sure you want to delete # {0}?', $qualification->candidate_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Qualifications'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Qualification'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="qualifications view large-9 medium-8 columns content">
    <h3><?= h($qualification->candidate_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Degree Name') ?></th>
            <td><?= h($qualification->degree_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Degree Level') ?></th>
            <td><?= h($qualification->degree_level) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gpa') ?></th>
            <td><?= h($qualification->gpa) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Major') ?></th>
            <td><?= h($qualification->major) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Institution') ?></th>
            <td><?= h($qualification->institution) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Candidate Id') ?></th>
            <td><?= $this->Number->format($qualification->candidate_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expected Graduation Date') ?></th>
            <td><?= h($qualification->expected_graduation_date) ?></td>
        </tr>
    </table>
</div>
