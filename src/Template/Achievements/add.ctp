<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="achievements form large-9 medium-8 columns content">
    <?= $this->Form->create($achievement) ?>
    <fieldset>
        <legend><?= __('Add Achievement') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('type');
            echo $this->Form->control('users._ids', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
