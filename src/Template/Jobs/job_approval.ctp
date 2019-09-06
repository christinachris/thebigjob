<?php
/**
 * @var AppView $this
 * @var job[] $jobs
 */

use App\Model\Entity\job;
use App\View\AppView;

?>

<div class="title-block">
    <div class="title">
        Jobs waiting for approval
    </div>
</div>

<div class="card card-block">

    <table class="table">
        <thead>
        <tr>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($archivedjobs as $job): ?>
            <tr>
                <td style="width: 40%">
                    <?= $this->Html->link($job->name, ['action' => 'edit', $job->id]) ?>
                </td>
                <td>
                    <?= $job->created->timeAgoInWords() ?>
                </td>
                <td class="action-col">
                    <?= $this->element('Admin/Buttons/view', ['url' => ['action' => 'approval_view', $job->id]]) ?>
                    <?= $this->element('Admin/Buttons/approve', ['url' => ['action' => 'approve', $job->id]]) ?>
                    <?= $this->element('Admin/Buttons/deny', ['url' => ['action' => 'deny', $job->id]]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<style>
    th > a:after {
        content: " \f0dc";
        font-family: FontAwesome;
    }
    th > a.asc:after {
        content: " \f0dd";
        font-family: FontAwesome;
    }
    th > a.desc:after {
        content: " \f0de";
        font-family: FontAwesome;
    }
</style>
