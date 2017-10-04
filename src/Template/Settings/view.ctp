<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Setting $setting
  */
?>
<div class="settings view large-9 medium-8 columns content">
    <h3><?= h($setting->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Profile') ?></th>
            <td><?= h($setting->profile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sms User') ?></th>
            <td><?= h($setting->sms_user) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sms Pass') ?></th>
            <td><?= h($setting->sms_pass) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sms From') ?></th>
            <td><?= h($setting->sms_from) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sms Apikey') ?></th>
            <td><?= h($setting->sms_apikey) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($setting->id) ?></td>
        </tr>
    </table>
</div>
