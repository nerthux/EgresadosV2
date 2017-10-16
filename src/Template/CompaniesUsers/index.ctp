<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\CompaniesUser[]|\Cake\Collection\CollectionInterface $companiesUsers
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Companies User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="companiesUsers index large-9 medium-8 columns content">
    <h3><?= __('Companies Users') ?></h3>
    <table class="table" class="table" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('companies_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('position') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('current_job') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($companiesUsers as $companiesUser): ?>
            <tr>
                <td><?= $companiesUser->has('company') ? $this->Html->link($companiesUser->company->name, ['controller' => 'Companies', 'action' => 'view', $companiesUser->company->id]) : '' ?></td>
                <td><?= $this->Number->format($companiesUser->id) ?></td>
                <td><?= $companiesUser->has('user') ? $this->Html->link($companiesUser->user->id, ['controller' => 'Users', 'action' => 'view', $companiesUser->user->id]) : '' ?></td>
                <td><?= h($companiesUser->position) ?></td>
                <td><?= h($companiesUser->start_date) ?></td>
                <td><?= h($companiesUser->end_date) ?></td>
                <td><?= h($companiesUser->current_job) ?></td>
                <td><?= h($companiesUser->description) ?></td>
                <td><?= h($companiesUser->created) ?></td>
                <td><?= h($companiesUser->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $companiesUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $companiesUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $companiesUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $companiesUser->id)]) ?>
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
