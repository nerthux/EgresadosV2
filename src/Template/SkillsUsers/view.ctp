<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\SkillsUser $skillsUser
  */
?>
<div class="skillsUsers view large-9 medium-8 columns content">
    <h3><?= h($skillsUser->id) ?></h3>
    <table class="table" class="vertical-table">
        <tr>
            <th scope="row"><?= __('Skill') ?></th>
            <td><?= $skillsUser->has('skill') ? $this->Html->link($skillsUser->skill->name, ['controller' => 'Skills', 'action' => 'view', $skillsUser->skill->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $skillsUser->has('user') ? $this->Html->link($skillsUser->user->id, ['controller' => 'Users', 'action' => 'view', $skillsUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($skillsUser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($skillsUser->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($skillsUser->modified) ?></td>
        </tr>
    </table>
</div>
