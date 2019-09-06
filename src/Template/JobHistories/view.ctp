<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\JobHistory $jobHistory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Job History'), ['action' => 'edit', $jobHistory->candidate_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Job History'), ['action' => 'delete', $jobHistory->candidate_id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobHistory->candidate_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Job Histories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job History'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="jobHistories view large-9 medium-8 columns content">
    <h3><?= h($jobHistory->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($jobHistory->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company') ?></th>
            <td><?= h($jobHistory->company) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Job Description') ?></th>
            <td><?= h($jobHistory->job_description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Candidate Id') ?></th>
            <td><?= $this->Number->format($jobHistory->candidate_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Start') ?></th>
            <td><?= h($jobHistory->date_start) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Finish') ?></th>
            <td><?= h($jobHistory->date_finish) ?></td>
        </tr>
    </table>
</div>
