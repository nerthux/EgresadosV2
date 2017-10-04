<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\SkillsUser[]|\Cake\Collection\CollectionInterface $skillsUsers
  */
?>
<div class="skillsUsers index large-9 medium-8 columns content">
    <h3><?= __('Skills Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('skills_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($skillsUsers as $skillsUser): ?>
            <tr>
                <td><?= $this->Number->format($skillsUser->id) ?></td>
                <td><?= $skillsUser->has('skill') ? $this->Html->link($skillsUser->skill->name, ['controller' => 'Skills', 'action' => 'view', $skillsUser->skill->id]) : '' ?></td>
                <td><?= $skillsUser->has('user') ? $this->Html->link($skillsUser->user->id, ['controller' => 'Users', 'action' => 'view', $skillsUser->user->id]) : '' ?></td>
                <td><?= h($skillsUser->created) ?></td>
                <td><?= h($skillsUser->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $skillsUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $skillsUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $skillsUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $skillsUser->id)]) ?>
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
