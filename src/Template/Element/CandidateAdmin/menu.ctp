<?php
/*
 * What page is the user currently viewing? We need to know this so that we can highlight the correct menu item,
 * to provide visual feedback to the user about where they are in the website.
 */
$currentController = $this->request->getParam('controller');
$currentAction = $this->request->getParam('action');


$isUsersActive  = $currentController === 'Candidates';
$isSettingsActive  = $currentController === 'Admin' && $currentAction === 'settings';
?>

<nav class="menu">
    <ul class="sidebar-menu metismenu" id="sidebar-menu">


        <li class="<?= $isUsersActive ? 'active open' : '' ?>">
            <?= $this->Html->link(
            '<i class="fa fa-user"></i> Profile <i class="fa arrow"></i>',
            ['controller' => 'Candidates','action'=>'profile_add', $this->request->getSession()->read('Auth.User.id')],
            ['escape' => false]
            ) ?>
            <ul class="sidebar-nav">

                <li><?= $this->Html->link('View profile', ['controller' => 'Candidates','action'=>'profile_view', $this->request->getSession()->read('Auth.User.id')]) ?></li>
                <li><?= $this->Html->link('Edit profile', ['controller' => 'Candidates','action'=>'profile_edit',$this->request->getSession()->read('Auth.User.id')]) ?></li>
            </ul>
        </li>
    </ul>
</nav>
