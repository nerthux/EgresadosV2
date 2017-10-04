<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="formsGenerations form large-9 medium-8 columns content">
    <?= $this->Form->create($formsGeneration) ?>
    <fieldset>
        <legend><?= __('Add Forms Generation') ?></legend>
        <?php
            echo $this->Form->control('form_id', ['options' => $forms]);
            echo $this->Form->control('generation_id', ['options' => $generations]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
