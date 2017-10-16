<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\CompaniesUser $companiesUser
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Companies User'), ['action' => 'edit', $companiesUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Companies User'), ['action' => 'delete', $companiesUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $companiesUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Companies Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Companies User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="companiesUsers view large-9 medium-8 columns content">
    <h3><?= h($companiesUser->id) ?></h3>
    <table class="table" class="table" class="vertical-table">
        <tr>
            <th scope="row"><?= __('Company') ?></th>
            <td><?= $companiesUser->has('company') ? $this->Html->link($companiesUser->company->name, ['controller' => 'Companies', 'action' => 'view', $companiesUser->company->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $companiesUser->has('user') ? $this->Html->link($companiesUser->user->id, ['controller' => 'Users', 'action' => 'view', $companiesUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Position') ?></th>
            <td><?= h($companiesUser->position) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($companiesUser->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($companiesUser->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($companiesUser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($companiesUser->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Date') ?></th>
            <td><?= h($companiesUser->end_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($companiesUser->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Current Job') ?></th>
            <td><?= $companiesUser->current_job ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
