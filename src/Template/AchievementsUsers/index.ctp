<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\AchievementsUser[]|\Cake\Collection\CollectionInterface $achievementsUsers
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Achievements User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Achievements'), ['controller' => 'Achievements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Achievement'), ['controller' => 'Achievements', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="achievementsUsers index large-9 medium-8 columns content">
    <h3><?= __('Achievements Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('achievement_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('level') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($achievementsUsers as $achievementsUser): ?>
            <tr>
                <td><?= $this->Number->format($achievementsUser->id) ?></td>
                <td><?= $achievementsUser->has('achievement') ? $this->Html->link($achievementsUser->achievement->name, ['controller' => 'Achievements', 'action' => 'view', $achievementsUser->achievement->id]) : '' ?></td>
                <td><?= $achievementsUser->has('user') ? $this->Html->link($achievementsUser->user->id, ['controller' => 'Users', 'action' => 'view', $achievementsUser->user->id]) : '' ?></td>
                <td><?= h($achievementsUser->level) ?></td>
                <td><?= h($achievementsUser->created) ?></td>
                <td><?= h($achievementsUser->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $achievementsUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $achievementsUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $achievementsUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $achievementsUser->id)]) ?>
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
