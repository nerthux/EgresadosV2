<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="generations form large-9 medium-8 columns content">
    <?= $this->Form->create($generation) ?>
    <fieldset>
        <legend><?= __('Edit Generation') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('senior_year');
            echo $this->Form->control('forms._ids', ['options' => $forms]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
