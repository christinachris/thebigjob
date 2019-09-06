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
                    ['controller' => 'admin'],
                    ['escape' => false]
            ) ?>
        </li>

        <li class="<?= $isContentActive ? 'active open' : '' ?>">
            <?= $this->Html->link(
                    '<i class="fa fa-file"></i> Content <i class="fa arrow"></i>',
                    ['controller' => 'articles'],
                    ['escape' => false]
            ) ?>
            <ul class="sidebar-nav">
                <li><?= $this->Html->link('View Articles', ['controller' => 'articles']) ?></li>
                <li><?= $this->Html->link('View Archived Articles', ['controller' => 'articles', 'action' => 'archiveIndex']) ?></li>
                <li><?= $this->Html->link('View Pages', ['controller' => 'pages', 'action' => 'pagesIndex']) ?></li>
            </ul>
        </li>
        <li class="<?= $isProductsActive ? 'active open' : '' ?>">
            <?= $this->Html->link(
                '<i class="fa fa-shopping-cart"></i> Products <i class="fa arrow"></i>',
                ['controller' => 'career_products'],
                ['escape' => false]
            ) ?>
            <ul class="sidebar-nav">
                <li><?= $this->Html->link('View Products', ['controller' => 'shop', 'action' => 'index']) ?></li>
            </ul>
        </li>
        <li class="<?= $isBookingsActive ? 'active open' : '' ?>">
            <?= $this->Html->link(
                '<i class="fa fa-video-camera"></i> Coaching <i class="fa arrow"></i>',
                ['controller' => 'bookings'],
                ['escape' => false]
            ) ?>
            <ul class="sidebar-nav">
                <li><?= $this->Html->link('View Bookings', ['controller' => 'bookings', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link('View Coaches', ['controller' => 'coaches', 'action' => 'index']) ?></li>
            </ul>
        </li>
        <li class="<?= $isJobsActive ? 'active open' : '' ?>">
            <?= $this->Html->link(
                '<i class="fa fa-user"></i> Approval <i class="fa arrow"></i>',
                ['controller' => 'jobs'],
                ['escape' => false]
            ) ?>
            <ul class="sidebar-nav">
                <li><?= $this->Html->link('View Jobs', ['controller' => 'jobs']) ?></li>
                <li><?= $this->Html->link('View Archive', ['controller' => 'jobs', 'action' => 'archiveIndex']) ?></li>
                <li><?= $this->Html->link('View Applications', ['controller' => 'applications']) ?></li>
                <li><?= $this->Html->link('Approve Jobs', ['controller' => 'jobs','action'=>'job_approval']) ?></li>
            </ul>
        </li>
        <li class="<?= $isTagsActive ? 'active' : '' ?>">
            <?= $this->Html->link(
                    '<i class="fa fa-tag"></i> Tags',
                    ['controller' => 'tags'],
                    ['escape' => false]
            ) ?>
        </li>

        <li class="<?= $isUsersActive ? 'active open' : '' ?>">
            <?= $this->Html->link(
                    '<i class="fa fa-user"></i> Users <i class="fa arrow"></i>',
                    ['controller' => 'users'],
                    ['escape' => false]
            ) ?>
            <ul class="sidebar-nav">
                <li><?= $this->Html->link('View users', ['controller' => 'users']) ?></li>
                <li><?= $this->Html->link('Add new user', ['controller' => 'users', 'action' => 'add']) ?></li>
            </ul>
        </li>
    </ul>
</nav>
