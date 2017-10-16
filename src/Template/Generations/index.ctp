<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Generation[]|\Cake\Collection\CollectionInterface $generations
  */
?>
<div class="generations index large-9 medium-8 columns content">
    <h3><?= __('Generations') ?></h3>
    <table class="table" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('senior_year') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($generations as $generation): ?>
            <tr>
                <td><?= $this->Number->format($generation->id) ?></td>
                <td><?= h($generation->title) ?></td>
                <td><?= $this->Number->format($generation->senior_year) ?></td>
                <td><?= h($generation->created) ?></td>
                <td><?= h($generation->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link($this->Html->icon('file'), ['action' => 'view', $generation->id], ['escape' => false]) ?>
                    <?= $this->Html->link($this->Html->icon('edit'), ['action' => 'edit', $generation->id], ['escape' => false]) ?>
                    <?= $this->Form->postLink($this->Html->icon('erase'), ['action' => 'delete', $generation->id], ['confirm' => __('Are you sure you want to delete # {0}?',
                                                                                                                $generation->id), 'escape' => false]) ?>
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
