<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Setting[]|\Cake\Collection\CollectionInterface $settings
  */
?>
<div class="settings index large-9 medium-8 columns content">
    <h3><?= __('Settings') ?></h3>
    <table class="table" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('profile') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sms_user') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sms_pass') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sms_from') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sms_apikey') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($settings as $setting): ?>
            <tr>
                <td><?= $this->Number->format($setting->id) ?></td>
                <td><?= h($setting->profile) ?></td>
                <td><?= h($setting->sms_user) ?></td>
                <td><?= h($setting->sms_pass) ?></td>
                <td><?= h($setting->sms_from) ?></td>
                <td><?= h($setting->sms_apikey) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $setting->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $setting->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $setting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $setting->id)]) ?>
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
