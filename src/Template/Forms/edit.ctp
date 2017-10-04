<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="forms form large-9 medium-8 columns content">
    <?= $this->Form->create($form) ?>
    <fieldset>
        <legend><?= __('Edit Form') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('careers._ids', ['options' => $careers, 'multiple' => 'checkbox']);
            echo $this->Form->control('generations._ids', ['options' => $generations, 'multiple' => 'checkbox']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
