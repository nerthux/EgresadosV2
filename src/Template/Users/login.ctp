<div class="col-md-4  col-md-offset-4  signup-wizard">
    <div class="users form">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
    <?= $this->Form->input('email') ?>
    <?= $this->Form->input('password') ?>
    <?= $this->Form->button('Login') ?>
    <?= $this->Form->end() ?>

    <a href="/users/password-recovery"><small>Forgot password?</small></a>

    <p class="text-muted text-center"><small>Do not have an account?</small></p>

    <?=		$this->Html->link(
    		'Create account',
    		'/users/signup',
    		['class' => 'btn btn-sm btn-white btn-block', 'target' => '_blank']
		)
    ?>
	<?= $this->Flash->render() ?>

    </div>
</div>

