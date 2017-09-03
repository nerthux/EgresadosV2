<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Sector $sector
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sector'), ['action' => 'edit', $sector->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sector'), ['action' => 'delete', $sector->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sector->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sectors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sector'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sectors view large-9 medium-8 columns content">
    <h3><?= h($sector->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($sector->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($sector->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sector->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($sector->created) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Companies') ?></h4>
        <?php if (!empty($sector->companies)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Location') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Sector Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sector->companies as $companies): ?>
            <tr>
                <td><?= h($companies->id) ?></td>
                <td><?= h($companies->name) ?></td>
                <td><?= h($companies->phone) ?></td>
                <td><?= h($companies->location) ?></td>
                <td><?= h($companies->created) ?></td>
                <td><?= h($companies->modified) ?></td>
                <td><?= h($companies->sector_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Companies', 'action' => 'view', $companies->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Companies', 'action' => 'edit', $companies->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Companies', 'action' => 'delete', $companies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $companies->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>