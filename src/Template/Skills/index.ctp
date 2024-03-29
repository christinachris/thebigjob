<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Skill[]|\Cake\Collection\CollectionInterface $skills
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Skill'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="skills index large-9 medium-8 columns content">
    <h3><?= __('Skills') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('candidate_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('skill_name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($skills as $skill): ?>
            <tr>
                <td><?= $this->Number->format($skill->candidate_id) ?></td>
                <td><?= $this->Number->format($skill->skill_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $skill->candidate_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $skill->candidate_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $skill->candidate_id], ['confirm' => __('Are you sure you want to delete # {0}?', $skill->candidate_id)]) ?>
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
