<div class="col-md-4  col-md-offset-4  signup-wizard">
    <?= $this->Flash->render() ?>

    <div class="users form">
        <?= $this->Form->create(null, ['url' => ['action' => 'new_password']]) ?>

        <?= $this->Form->hidden('id', ['value' => $user->id ]) ?>
        <?= $this->Form->hidden('email', ['value' => $user->email ]) ?>

        <?= $this->Form->label('User.new_password', 'Nueva Contraseña') ?>
	<?= $this->Form->password('new_password') ?>

	<?= $this->Form->label('User.confirm_password', 'Confirma tu Contraseña') ?>
        <?= $this->Form->password('confirm_password') ?>

        <?= $this->Form->hidden('email_validation_code', ['value' => $user->email_validation_code]) ?>
        <?= $this->Form->button('Cambiar Contraseña') ?>
        <?= $this->Form->end() ?>
    </div>
</div>
