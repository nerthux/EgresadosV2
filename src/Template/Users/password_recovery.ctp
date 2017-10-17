<div class="col-md-4  col-md-offset-4  signup-wizard">
    <div class="users form">


	<?= $this->Form->create(null, ['url' => ['action' => 'password_recovery']]) ?>
	<?= $this->Form->control('email') ?>
	<?= $this->Form->button('Recuperar Contraseña') ?>
	<?= $this->Form->end() ?>
    </div>
</div>

