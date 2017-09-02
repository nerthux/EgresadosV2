<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\LanguagesUser[]|\Cake\Collection\CollectionInterface $languagesUsers
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Languages User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Languages'), ['controller' => 'Languages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Language'), ['controller' => 'Languages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="languagesUsers index large-9 medium-8 columns content">
    <h3><?= __('Languages Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('languages_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('level') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($languagesUsers as $languagesUser): ?>
            <tr>
                <td><?= $languagesUser->has('language') ? $this->Html->link($languagesUser->language->name, ['controller' => 'Languages', 'action' => 'view', $languagesUser->language->id]) : '' ?></td>
                <td><?= $languagesUser->has('user') ? $this->Html->link($languagesUser->user->id, ['controller' => 'Users', 'action' => 'view', $languagesUser->user->id]) : '' ?></td>
                <td><?= h($languagesUser->level) ?></td>
                <td><?= h($languagesUser->created) ?></td>
                <td><?= h($languagesUser->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $languagesUser->languages_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $languagesUser->languages_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $languagesUser->languages_id], ['confirm' => __('Are you sure you want to delete # {0}?', $languagesUser->languages_id)]) ?>
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
