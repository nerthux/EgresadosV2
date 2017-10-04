<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="questions form large-9 medium-8 columns content">
    <?= $this->Form->create($question) ?>
    <fieldset>
        <legend><?= __('Edit Question') ?></legend>
        <?php
            echo $this->Form->control('label');
            echo $this->Form->control('type');
            echo $this->Form->control('ordering');
            echo $this->Form->control('form_id', ['options' => $forms]);
            echo $this->Form->control('option_id', ['options' => $options]);
            echo $this->Form->control('users._ids', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
