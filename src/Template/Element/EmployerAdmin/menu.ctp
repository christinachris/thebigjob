<?php
/*
 * What page is the user currently viewing? We need to know this so that we can highlight the correct menu item,
 * to provide visual feedback to the user about where they are in the website.
 */
$currentController = $this->request->getParam('controller');
$currentAction = $this->request->getParam('action');

$isDashboardActive  = $currentController === 'Admin' && $currentAction === 'index';
$isEnquiriesActive  = $currentController === 'Enquiries';
$isProductsActive  = $currentController === 'Products';
$isBookingsActive  = $currentController === 'Bookings';
$isContentActive  = $currentController === 'Articles';
$isJobsActive = $currentController === 'Jobs';
$isTagsActive  = $currentController === 'Tags';
$isUsersActive  = $currentController === 'Users';
$isSettingsActive  = $currentController === 'Admin' && $currentAction === 'settings';
?>

<nav class="menu">
    <ul class="sidebar-menu metismenu" id="sidebar-menu">
        <li class="<?= $isDashboardActive ? 'active' : '' ?>">
            <?= $this->Html->link(
                    '<i class="fa fa-home"></i> Dashboard',
                    ['controller' => 'EmployerAdmin'],
                    ['escape' => false]
            ) ?>
        </li>

        <li class="<?= $isJobsActive ? 'active open' : '' ?>">
            <?= $this->Html->link(
                '<i class="fa fa-user"></i> Jobs <i class="fa arrow"></i>',
                ['controller' => 'jobs'],
                ['escape' => false]
            ) ?>
            <ul class="sidebar-nav">
                <li><?= $this->Html->link('View Jobs', ['controller' => 'jobs']) ?></li>
                <li><?= $this->Html->link('View Archive', ['controller' => 'jobs', 'action' => 'archiveIndex']) ?></li>
                <li><?= $this->Html->link('View Applications', ['controller' => 'applications']) ?></li>
            </ul>
        </li>

        <li class="<?= $isUsersActive ? 'active open' : '' ?>">
            <?= $this->Html->link(
                    '<i class="fa fa-user"></i> Profile <i class="fa arrow"></i>',
                    ['controller' => 'employers','action'=>'view', $this->request->getSession()->read('Auth.User.id')],
                    ['escape' => false]
            ) ?>
            <ul class="sidebar-nav">

                <li><?= $this->Html->link('View profile', ['controller' => 'employers','action'=>'view', $this->request->getSession()->read('Auth.User.id')]) ?></li>
                <li><?= $this->Html->link('Edit profile', ['controller' => 'employers','action'=>'edit',$this->request->getSession()->read('Auth.User.id')]) ?></li>
            </ul>
        </li>
    </ul>
</nav>
