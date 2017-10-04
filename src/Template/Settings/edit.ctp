<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="settings form large-9 medium-8 columns content">
    <?= $this->Form->create($setting) ?>
    <fieldset>
        <legend><?= __('Edit Setting') ?></legend>
        <?php
            echo $this->Form->control('profile');
            echo $this->Form->control('sms_user');
            echo $this->Form->control('sms_pass');
            echo $this->Form->control('sms_from');
            echo $this->Form->control('sms_apikey');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
