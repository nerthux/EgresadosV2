<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Generations'), ['controller' => 'Generations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Generation'), ['controller' => 'Generations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Careers'), ['controller' => 'Careers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Career'), ['controller' => 'Careers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Achievements'), ['controller' => 'Achievements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Achievement'), ['controller' => 'Achievements', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Skills'), ['controller' => 'Skills', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Skill'), ['controller' => 'Skills', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
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
