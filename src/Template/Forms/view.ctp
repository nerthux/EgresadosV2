<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Form $form
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Form'), ['action' => 'edit', $form->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Form'), ['action' => 'delete', $form->id], ['confirm' => __('Are you sure you want to delete # {0}?', $form->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Forms'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Form'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Questions Users'), ['controller' => 'QuestionsUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Questions User'), ['controller' => 'QuestionsUsers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Careers'), ['controller' => 'Careers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Career'), ['controller' => 'Careers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Generations'), ['controller' => 'Generations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Generation'), ['controller' => 'Generations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="forms view large-9 medium-8 columns content">
    <h3><?= h($form->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($form->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($form->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($form->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($form->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($form->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Questions') ?></h4>
        <?php if (!empty($form->questions)): ?>
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
            <?php foreach ($form->questions as $questions): ?>
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
        <h4><?= __('Related Questions Users') ?></h4>
        <?php if (!empty($form->questions_users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Question Id') ?></th>
                <th scope="col"><?= __('Form Id') ?></th>
                <th scope="col"><?= __('Value') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($form->questions_users as $questionsUsers): ?>
            <tr>
                <td><?= h($questionsUsers->id) ?></td>
                <td><?= h($questionsUsers->user_id) ?></td>
                <td><?= h($questionsUsers->question_id) ?></td>
                <td><?= h($questionsUsers->form_id) ?></td>
                <td><?= h($questionsUsers->value) ?></td>
                <td><?= h($questionsUsers->created) ?></td>
                <td><?= h($questionsUsers->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'QuestionsUsers', 'action' => 'view', $questionsUsers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'QuestionsUsers', 'action' => 'edit', $questionsUsers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'QuestionsUsers', 'action' => 'delete', $questionsUsers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questionsUsers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Careers') ?></h4>
        <?php if (!empty($form->careers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Code') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($form->careers as $careers): ?>
            <tr>
                <td><?= h($careers->id) ?></td>
                <td><?= h($careers->code) ?></td>
                <td><?= h($careers->name) ?></td>
                <td><?= h($careers->created) ?></td>
                <td><?= h($careers->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Careers', 'action' => 'view', $careers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Careers', 'action' => 'edit', $careers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Careers', 'action' => 'delete', $careers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $careers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Generations') ?></h4>
        <?php if (!empty($form->generations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Senior Year') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($form->generations as $generations): ?>
            <tr>
                <td><?= h($generations->id) ?></td>
                <td><?= h($generations->title) ?></td>
                <td><?= h($generations->senior_year) ?></td>
                <td><?= h($generations->created) ?></td>
                <td><?= h($generations->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Generations', 'action' => 'view', $generations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Generations', 'action' => 'edit', $generations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Generations', 'action' => 'delete', $generations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $generations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
