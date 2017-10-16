<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\FormsGeneration[]|\Cake\Collection\CollectionInterface $formsGenerations
  */
?>
<div class="formsGenerations index large-9 medium-8 columns content">
    <h3><?= __('Forms Generations') ?></h3>
    <table class="table" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('form_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('generation_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($formsGenerations as $formsGeneration): ?>
            <tr>
                <td><?= $this->Number->format($formsGeneration->id) ?></td>
                <td><?= $formsGeneration->has('form') ? $this->Html->link($formsGeneration->form->name, ['controller' => 'Forms', 'action' => 'view', $formsGeneration->form->id]) : '' ?></td>
                <td><?= $formsGeneration->has('generation') ? $this->Html->link($formsGeneration->generation->title, ['controller' => 'Generations', 'action' => 'view', $formsGeneration->generation->id]) : '' ?></td>
                <td><?= h($formsGeneration->created) ?></td>
                <td><?= h($formsGeneration->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $formsGeneration->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $formsGeneration->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $formsGeneration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formsGeneration->id)]) ?>
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
