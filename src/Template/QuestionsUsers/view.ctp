<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\QuestionsUser $questionsUser
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Questions User'), ['action' => 'edit', $questionsUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Questions User'), ['action' => 'delete', $questionsUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questionsUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Questions Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Questions User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Forms'), ['controller' => 'Forms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Form'), ['controller' => 'Forms', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="questionsUsers view large-9 medium-8 columns content">
    <h3><?= h($questionsUser->id) ?></h3>
    <table class="table" class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $questionsUser->has('user') ? $this->Html->link($questionsUser->user->id, ['controller' => 'Users', 'action' => 'view', $questionsUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Question') ?></th>
            <td><?= $questionsUser->has('question') ? $this->Html->link($questionsUser->question->id, ['controller' => 'Questions', 'action' => 'view', $questionsUser->question->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Form') ?></th>
            <td><?= $questionsUser->has('form') ? $this->Html->link($questionsUser->form->name, ['controller' => 'Forms', 'action' => 'view', $questionsUser->form->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Value') ?></th>
            <td><?= h($questionsUser->value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($questionsUser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($questionsUser->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($questionsUser->modified) ?></td>
        </tr>
    </table>
</div>
