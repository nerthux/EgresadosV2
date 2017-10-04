<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="careersForms form large-9 medium-8 columns content">
    <?= $this->Form->create($careersForm) ?>
    <fieldset>
        <legend><?= __('Edit Careers Form') ?></legend>
        <?php
            echo $this->Form->control('career_id', ['options' => $careers]);
            echo $this->Form->control('form_id', ['options' => $forms]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
