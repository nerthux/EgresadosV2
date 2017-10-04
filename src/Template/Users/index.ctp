<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
  */
?>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('student_id_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email_verified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mobile_phone_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sms_verified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role') ?></th>
                <th scope="col"><?= $this->Paginator->sort('generation_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('career_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->first_name) ?></td>
                <td><?= h($user->last_name) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->username) ?></td>
                <td><?= h($user->student_id_number) ?></td>
                <td><?= h($user->email_verified) ?></td>
                <td><?= h($user->mobile_phone_number) ?></td>
                <td><?= h($user->sms_verified) ?></td>
                <td><?= h($user->role) ?></td>
                <td><?= $user->has('generation') ? $this->Html->link($user->generation->title, ['controller' => 'Generations', 'action' => 'view', $user->generation->id]) : '' ?></td>
                <td><?= $user->has('career') ? $this->Html->link($user->career->name, ['controller' => 'Careers', 'action' => 'view', $user->career->id]) : '' ?></td>
                <td><?= h($user->created) ?></td>
                <td><?= h($user->modified) ?></td>
		<td class="actions">
		    <?= $this->Html->link($this->Html->icon('file'), ['action' => 'view', $user->id], ['escape' => false]) ?>
                    <?= $this->Html->link($this->Html->icon('edit'), ['action' => 'edit', $user->id], ['escape' => false]) ?>
                    <?= $this->Form->postLink($this->Html->icon('erase'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', 
														$user->id), 'escape' => false]) ?>
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
