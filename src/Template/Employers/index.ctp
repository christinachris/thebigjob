<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employer[]|\Cake\Collection\CollectionInterface $employers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Employer'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="employers index large-9 medium-8 columns content">
    <h3><?= __('Employers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('company_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('about') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('web_url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('industry') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employers as $employer): ?>
            <tr>
                <td><?= $this->Number->format($employer->id) ?></td>
                <td><?= h($employer->company_name) ?></td>
                <td><?= h($employer->about) ?></td>
                <td><?= h($employer->email) ?></td>
                <td><?= h($employer->contact_no) ?></td>
                <td><?= h($employer->web_url) ?></td>
                <td><?= h($employer->industry) ?></td>
                <td><?= h($employer->location) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $employer->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employer->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employer->id)]) ?>
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
