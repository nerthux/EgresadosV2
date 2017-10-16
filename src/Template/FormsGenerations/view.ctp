<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\FormsGeneration $formsGeneration
  */
?>
<div class="formsGenerations view large-9 medium-8 columns content">
    <h3><?= h($formsGeneration->id) ?></h3>
    <table class="table" class="vertical-table">
        <tr>
            <th scope="row"><?= __('Form') ?></th>
            <td><?= $formsGeneration->has('form') ? $this->Html->link($formsGeneration->form->name, ['controller' => 'Forms', 'action' => 'view', $formsGeneration->form->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Generation') ?></th>
            <td><?= $formsGeneration->has('generation') ? $this->Html->link($formsGeneration->generation->title, ['controller' => 'Generations', 'action' => 'view', $formsGeneration->generation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($formsGeneration->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($formsGeneration->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($formsGeneration->modified) ?></td>
        </tr>
    </table>
</div>
