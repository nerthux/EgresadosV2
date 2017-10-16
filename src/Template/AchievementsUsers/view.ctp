<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\AchievementsUser $achievementsUser
  */
?>
<div class="achievementsUsers view large-9 medium-8 columns content">
    <h3><?= h($achievementsUser->id) ?></h3>
    <table class="table" class="table" class="vertical-table">
        <tr>
            <th scope="row"><?= __('Achievement') ?></th>
            <td><?= $achievementsUser->has('achievement') ? $this->Html->link($achievementsUser->achievement->name, ['controller' => 'Achievements', 'action' => 'view', $achievementsUser->achievement->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $achievementsUser->has('user') ? $this->Html->link($achievementsUser->user->id, ['controller' => 'Users', 'action' => 'view', $achievementsUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Level') ?></th>
            <td><?= h($achievementsUser->level) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($achievementsUser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($achievementsUser->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($achievementsUser->modified) ?></td>
        </tr>
    </table>
</div>
