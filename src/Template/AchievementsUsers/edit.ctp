<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="achievementsUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($achievementsUser) ?>
    <fieldset>
        <legend><?= __('Edit Achievements User') ?></legend>
        <?php
            echo $this->Form->control('achievement_id', ['options' => $achievements]);
            echo $this->Form->control('users_id', ['options' => $users]);
            echo $this->Form->control('level');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
