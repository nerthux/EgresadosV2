<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Career[]|\Cake\Collection\CollectionInterface $careers
  */
?>
<div class="careers index large-9 medium-8 columns content">
    <h3><?= __('Careers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($careers as $career): ?>
            <tr>
                <td><?= $this->Number->format($career->id) ?></td>
                <td><?= h($career->code) ?></td>
                <td><?= h($career->name) ?></td>
                <td><?= h($career->created) ?></td>
                <td><?= h($career->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $career->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $career->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $career->id], ['confirm' => __('Are you sure you want to delete # {0}?', $career->id)]) ?>
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
