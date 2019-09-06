<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Qualification[]|\Cake\Collection\CollectionInterface $qualifications
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Qualification'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="qualifications index large-9 medium-8 columns content">
    <h3><?= __('Qualifications') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('candidate_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('degree_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('degree_level') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expected_graduation_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gpa') ?></th>
                <th scope="col"><?= $this->Paginator->sort('major') ?></th>
                <th scope="col"><?= $this->Paginator->sort('institution') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($qualifications as $qualification): ?>
            <tr>
                <td><?= $this->Number->format($qualification->candidate_id) ?></td>
                <td><?= h($qualification->degree_name) ?></td>
                <td><?= h($qualification->degree_level) ?></td>
                <td><?= h($qualification->expected_graduation_date) ?></td>
                <td><?= h($qualification->gpa) ?></td>
                <td><?= h($qualification->major) ?></td>
                <td><?= h($qualification->institution) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $qualification->candidate_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $qualification->candidate_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $qualification->candidate_id], ['confirm' => __('Are you sure you want to delete # {0}?', $qualification->candidate_id)]) ?>
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
