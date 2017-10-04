<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('email');
            echo $this->Form->control('username');
            echo $this->Form->control('password');
            echo $this->Form->control('student_id_number');
            echo $this->Form->control('email_validation_code');
            echo $this->Form->control('email_verified');
            echo $this->Form->control('mobile_phone_number');
            echo $this->Form->control('sms_validation_code');
            echo $this->Form->control('sms_verified');
            echo $this->Form->control('password_recovery_hash');
            echo $this->Form->control('role');
            echo $this->Form->control('generation_id', ['options' => $generations]);
            echo $this->Form->control('career_id', ['options' => $careers]);
            echo $this->Form->control('date_of_birth', ['empty' => true]);
            echo $this->Form->control('have_title');
            echo $this->Form->control('gender');
            echo $this->Form->control('achievements._ids', ['options' => $achievements]);
            echo $this->Form->control('companies._ids', ['options' => $companies]);
            echo $this->Form->control('questions._ids', ['options' => $questions]);
            echo $this->Form->control('skills._ids', ['options' => $skills]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
