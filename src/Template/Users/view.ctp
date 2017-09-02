<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\User $user
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Generations'), ['controller' => 'Generations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Generation'), ['controller' => 'Generations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Careers'), ['controller' => 'Careers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Career'), ['controller' => 'Careers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Languages'), ['controller' => 'Languages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Language'), ['controller' => 'Languages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Skills'), ['controller' => 'Skills', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Skill'), ['controller' => 'Skills', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($user->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($user->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Student Id Number') ?></th>
            <td><?= h($user->student_id_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile Phone Number') ?></th>
            <td><?= h($user->mobile_phone_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password Recovery Hash') ?></th>
            <td><?= h($user->password_recovery_hash) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= h($user->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Generation') ?></th>
            <td><?= $user->has('generation') ? $this->Html->link($user->generation->title, ['controller' => 'Generations', 'action' => 'view', $user->generation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Career') ?></th>
            <td><?= $user->has('career') ? $this->Html->link($user->career->name, ['controller' => 'Careers', 'action' => 'view', $user->career->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gender') ?></th>
            <td><?= h($user->gender) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email Validation Code') ?></th>
            <td><?= $this->Number->format($user->email_validation_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sms Validation Code') ?></th>
            <td><?= $this->Number->format($user->sms_validation_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Of Birth') ?></th>
            <td><?= h($user->date_of_birth) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email Verified') ?></th>
            <td><?= $user->email_verified ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sms Verified') ?></th>
            <td><?= $user->sms_verified ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Have Title') ?></th>
            <td><?= $user->have_title ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Companies') ?></h4>
        <?php if (!empty($user->companies)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Location') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Sector Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->companies as $companies): ?>
            <tr>
                <td><?= h($companies->id) ?></td>
                <td><?= h($companies->name) ?></td>
                <td><?= h($companies->phone) ?></td>
                <td><?= h($companies->location) ?></td>
                <td><?= h($companies->created) ?></td>
                <td><?= h($companies->modified) ?></td>
                <td><?= h($companies->sector_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Companies', 'action' => 'view', $companies->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Companies', 'action' => 'edit', $companies->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Companies', 'action' => 'delete', $companies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $companies->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Languages') ?></h4>
        <?php if (!empty($user->languages)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->languages as $languages): ?>
            <tr>
                <td><?= h($languages->id) ?></td>
                <td><?= h($languages->name) ?></td>
                <td><?= h($languages->created) ?></td>
                <td><?= h($languages->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Languages', 'action' => 'view', $languages->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Languages', 'action' => 'edit', $languages->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Languages', 'action' => 'delete', $languages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $languages->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Questions') ?></h4>
        <?php if (!empty($user->questions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Label') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Ordering') ?></th>
                <th scope="col"><?= __('Form Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Option Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->questions as $questions): ?>
            <tr>
                <td><?= h($questions->id) ?></td>
                <td><?= h($questions->label) ?></td>
                <td><?= h($questions->type) ?></td>
                <td><?= h($questions->ordering) ?></td>
                <td><?= h($questions->form_id) ?></td>
                <td><?= h($questions->created) ?></td>
                <td><?= h($questions->modified) ?></td>
                <td><?= h($questions->option_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Questions', 'action' => 'view', $questions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Questions', 'action' => 'edit', $questions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Questions', 'action' => 'delete', $questions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Skills') ?></h4>
        <?php if (!empty($user->skills)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->skills as $skills): ?>
            <tr>
                <td><?= h($skills->id) ?></td>
                <td><?= h($skills->name) ?></td>
                <td><?= h($skills->created) ?></td>
                <td><?= h($skills->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Skills', 'action' => 'view', $skills->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Skills', 'action' => 'edit', $skills->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Skills', 'action' => 'delete', $skills->id], ['confirm' => __('Are you sure you want to delete # {0}?', $skills->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
