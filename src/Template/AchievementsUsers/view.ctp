<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\AchievementsUser $achievementsUser
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Achievements User'), ['action' => 'edit', $achievementsUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Achievements User'), ['action' => 'delete', $achievementsUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $achievementsUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Achievements Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Achievements User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Achievements'), ['controller' => 'Achievements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Achievement'), ['controller' => 'Achievements', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="achievementsUsers view large-9 medium-8 columns content">
    <h3><?= h($achievementsUser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Achievement') ?></th>
            <td><?= $achievementsUser->has('achievement') ? $this->Html->link($achievementsUser->achievement->name, ['controller' => 'Achievements', 'action' => 'view', $achievementsUser->achievement->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $achievementsUser->has('user') ? $this->Html->link($achievementsUser->user->id, ['controller' => 'Users', 'action' => 'view', $achievementsUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Level') ?></th>
            <td><?= h($achievementsUser->level) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($achievementsUser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($achievementsUser->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($achievementsUser->modified) ?></td>
        </tr>
    </table>
</div>
