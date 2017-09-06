<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Achievements Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Achievements'), ['controller' => 'Achievements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Achievement'), ['controller' => 'Achievements', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="achievementsUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($achievementsUser) ?>
    <fieldset>
        <legend><?= __('Add Achievements User') ?></legend>
        <?php
            echo $this->Form->control('achievement_id', ['options' => $achievements]);
            echo $this->Form->control('users_id', ['options' => $users]);
            echo $this->Form->control('level');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
