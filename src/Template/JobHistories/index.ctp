<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\JobHistory[]|\Cake\Collection\CollectionInterface $jobHistories
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Job History'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="jobHistories index large-9 medium-8 columns content">
    <h3><?= __('Job Histories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('candidate_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('company') ?></th>
                <th scope="col"><?= $this->Paginator->sort('job_description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_start') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_finish') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jobHistories as $jobHistory): ?>
            <tr>
                <td><?= $this->Number->format($jobHistory->candidate_id) ?></td>
                <td><?= h($jobHistory->title) ?></td>
                <td><?= h($jobHistory->company) ?></td>
                <td><?= h($jobHistory->job_description) ?></td>
                <td><?= h($jobHistory->date_start) ?></td>
                <td><?= h($jobHistory->date_finish) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $jobHistory->candidate_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $jobHistory->candidate_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $jobHistory->candidate_id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobHistory->candidate_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
