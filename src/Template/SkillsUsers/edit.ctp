<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="skillsUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($skillsUser) ?>
    <fieldset>
        <legend><?= __('Edit Skills User') ?></legend>
        <?php
            echo $this->Form->control('skills_id', ['options' => $skills]);
            echo $this->Form->control('users_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
