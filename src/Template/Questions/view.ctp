<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Question $question
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Question'), ['action' => 'edit', $question->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Question'), ['action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Questions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Forms'), ['controller' => 'Forms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Form'), ['controller' => 'Forms', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="questions view large-9 medium-8 columns content">
    <h3><?= h($question->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($question->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Label') ?></th>
            <td><?= h($question->label) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($question->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Form') ?></th>
            <td><?= $question->has('form') ? $this->Html->link($question->form->name, ['controller' => 'Forms', 'action' => 'view', $question->form->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Conditional') ?></th>
            <td><?= h($question->conditional) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($question->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($question->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($question->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Required') ?></th>
            <td><?= $question->required ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Choices') ?></h4>
        <?= $this->Text->autoParagraph(h($question->choices)); ?>
    </div>
    <div class="row">
        <h4><?= __('Columns') ?></h4>
        <?= $this->Text->autoParagraph(h($question->columns)); ?>
    </div>
    <div class="row">
        <h4><?= __('Rows') ?></h4>
        <?= $this->Text->autoParagraph(h($question->rows)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($question->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Student Id Number') ?></th>
                <th scope="col"><?= __('Email Validation Code') ?></th>
                <th scope="col"><?= __('Email Verified') ?></th>
                <th scope="col"><?= __('Mobile Phone Number') ?></th>
                <th scope="col"><?= __('Sms Validation Code') ?></th>
                <th scope="col"><?= __('Sms Verified') ?></th>
                <th scope="col"><?= __('Password Recovery Hash') ?></th>
                <th scope="col"><?= __('Role') ?></th>
                <th scope="col"><?= __('Generation Id') ?></th>
                <th scope="col"><?= __('Career Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Date Of Birth') ?></th>
                <th scope="col"><?= __('Have Title') ?></th>
                <th scope="col"><?= __('Gender') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($question->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->first_name) ?></td>
                <td><?= h($users->last_name) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->student_id_number) ?></td>
                <td><?= h($users->email_validation_code) ?></td>
                <td><?= h($users->email_verified) ?></td>
                <td><?= h($users->mobile_phone_number) ?></td>
                <td><?= h($users->sms_validation_code) ?></td>
                <td><?= h($users->sms_verified) ?></td>
                <td><?= h($users->password_recovery_hash) ?></td>
                <td><?= h($users->role) ?></td>
                <td><?= h($users->generation_id) ?></td>
                <td><?= h($users->career_id) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td><?= h($users->date_of_birth) ?></td>
                <td><?= h($users->have_title) ?></td>
                <td><?= h($users->gender) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
