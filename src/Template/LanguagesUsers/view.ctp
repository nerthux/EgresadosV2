<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\LanguagesUser $languagesUser
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Languages User'), ['action' => 'edit', $languagesUser->languages_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Languages User'), ['action' => 'delete', $languagesUser->languages_id], ['confirm' => __('Are you sure you want to delete # {0}?', $languagesUser->languages_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Languages Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Languages User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Languages'), ['controller' => 'Languages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Language'), ['controller' => 'Languages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="languagesUsers view large-9 medium-8 columns content">
    <h3><?= h($languagesUser->languages_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Language') ?></th>
            <td><?= $languagesUser->has('language') ? $this->Html->link($languagesUser->language->name, ['controller' => 'Languages', 'action' => 'view', $languagesUser->language->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $languagesUser->has('user') ? $this->Html->link($languagesUser->user->id, ['controller' => 'Users', 'action' => 'view', $languagesUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Level') ?></th>
            <td><?= h($languagesUser->level) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($languagesUser->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($languagesUser->modified) ?></td>
        </tr>
    </table>
</div>
