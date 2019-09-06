<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Candidate $candidate
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Candidate'), ['action' => 'edit', $candidate->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Candidate'), ['action' => 'delete', $candidate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $candidate->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Candidates'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Candidate'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Job Histories'), ['controller' => 'JobHistories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job History'), ['controller' => 'JobHistories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Qualifications'), ['controller' => 'Qualifications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Qualification'), ['controller' => 'Qualifications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Skills'), ['controller' => 'Skills', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Skill'), ['controller' => 'Skills', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="candidates view large-9 medium-8 columns content">
    <h3><?= h($candidate->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($candidate->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($candidate->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($candidate->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone No') ?></th>
            <td><?= h($candidate->phone_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= h($candidate->state) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= h($candidate->country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Postname') ?></th>
            <td><?= h($candidate->postname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Postpath') ?></th>
            <td><?= h($candidate->postpath) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($candidate->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($candidate->created) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Applications') ?></h4>
        <?php if (!empty($candidate->applications)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Candidate Id') ?></th>
                <th scope="col"><?= __('Job Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($candidate->applications as $applications): ?>
            <tr>
                <td><?= h($applications->id) ?></td>
                <td><?= h($applications->date) ?></td>
                <td><?= h($applications->candidate_id) ?></td>
                <td><?= h($applications->job_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Applications', 'action' => 'view', $applications->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Applications', 'action' => 'edit', $applications->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Applications', 'action' => 'delete', $applications->id], ['confirm' => __('Are you sure you want to delete # {0}?', $applications->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Job Histories') ?></h4>
        <?php if (!empty($candidate->job_histories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Candidate Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Company') ?></th>
                <th scope="col"><?= __('Job Description') ?></th>
                <th scope="col"><?= __('Date Start') ?></th>
                <th scope="col"><?= __('Date Finish') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($candidate->job_histories as $jobHistories): ?>
            <tr>
                <td><?= h($jobHistories->candidate_id) ?></td>
                <td><?= h($jobHistories->title) ?></td>
                <td><?= h($jobHistories->company) ?></td>
                <td><?= h($jobHistories->job_description) ?></td>
                <td><?= h($jobHistories->date_start) ?></td>
                <td><?= h($jobHistories->date_finish) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'JobHistories', 'action' => 'view', $jobHistories->candidate_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'JobHistories', 'action' => 'edit', $jobHistories->candidate_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'JobHistories', 'action' => 'delete', $jobHistories->candidate_id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobHistories->candidate_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Orders') ?></h4>
        <?php if (!empty($candidate->orders)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Candidate Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Order No') ?></th>
                <th scope="col"><?= __('Date Created') ?></th>
                <th scope="col"><?= __('Total Cost') ?></th>
                <th scope="col"><?= __('Discount') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($candidate->orders as $orders): ?>
            <tr>
                <td><?= h($orders->id) ?></td>
                <td><?= h($orders->candidate_id) ?></td>
                <td><?= h($orders->product_id) ?></td>
                <td><?= h($orders->order_no) ?></td>
                <td><?= h($orders->date_created) ?></td>
                <td><?= h($orders->total_cost) ?></td>
                <td><?= h($orders->discount) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Orders', 'action' => 'view', $orders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Orders', 'action' => 'edit', $orders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Orders', 'action' => 'delete', $orders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orders->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Posts') ?></h4>
        <?php if (!empty($candidate->posts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Path') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Candidate Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($candidate->posts as $posts): ?>
            <tr>
                <td><?= h($posts->id) ?></td>
                <td><?= h($posts->name) ?></td>
                <td><?= h($posts->path) ?></td>
                <td><?= h($posts->created) ?></td>
                <td><?= h($posts->candidate_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Posts', 'action' => 'view', $posts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Posts', 'action' => 'edit', $posts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Posts', 'action' => 'delete', $posts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $posts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Qualifications') ?></h4>
        <?php if (!empty($candidate->qualifications)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Candidate Id') ?></th>
                <th scope="col"><?= __('Degree Name') ?></th>
                <th scope="col"><?= __('Degree Level') ?></th>
                <th scope="col"><?= __('Expected Graduation Date') ?></th>
                <th scope="col"><?= __('Gpa') ?></th>
                <th scope="col"><?= __('Major') ?></th>
                <th scope="col"><?= __('Institution') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($candidate->qualifications as $qualifications): ?>
            <tr>
                <td><?= h($qualifications->candidate_id) ?></td>
                <td><?= h($qualifications->degree_name) ?></td>
                <td><?= h($qualifications->degree_level) ?></td>
                <td><?= h($qualifications->expected_graduation_date) ?></td>
                <td><?= h($qualifications->gpa) ?></td>
                <td><?= h($qualifications->major) ?></td>
                <td><?= h($qualifications->institution) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Qualifications', 'action' => 'view', $qualifications->candidate_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Qualifications', 'action' => 'edit', $qualifications->candidate_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Qualifications', 'action' => 'delete', $qualifications->candidate_id], ['confirm' => __('Are you sure you want to delete # {0}?', $qualifications->candidate_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Skills') ?></h4>
        <?php if (!empty($candidate->skills)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Candidate Id') ?></th>
                <th scope="col"><?= __('Skill Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($candidate->skills as $skills): ?>
            <tr>
                <td><?= h($skills->candidate_id) ?></td>
                <td><?= h($skills->skill_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Skills', 'action' => 'view', $skills->candidate_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Skills', 'action' => 'edit', $skills->candidate_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Skills', 'action' => 'delete', $skills->candidate_id], ['confirm' => __('Are you sure you want to delete # {0}?', $skills->candidate_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
