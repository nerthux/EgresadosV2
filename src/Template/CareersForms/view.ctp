<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\CareersForm $careersForm
  */
?>
<div class="careersForms view large-9 medium-8 columns content">
    <h3><?= h($careersForm->id) ?></h3>
    <table class="table" class="table" class="vertical-table">
        <tr>
            <th scope="row"><?= __('Career') ?></th>
            <td><?= $careersForm->has('career') ? $this->Html->link($careersForm->career->name, ['controller' => 'Careers', 'action' => 'view', $careersForm->career->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Form') ?></th>
            <td><?= $careersForm->has('form') ? $this->Html->link($careersForm->form->name, ['controller' => 'Forms', 'action' => 'view', $careersForm->form->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($careersForm->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($careersForm->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($careersForm->modified) ?></td>
        </tr>
    </table>
</div>
