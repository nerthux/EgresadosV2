<div class="container" >
  <div class="col-md-4  col-md-offset-4  signup-wizard">
    <div id="register" class="tab-pane fade in active">
      <h2 class="text-center"> Únete a la comunidad</h2>
      <h3 class="text-center"> Egresados ITT</h3>
      <div class="innter-form">
        <?= $this->Form->create($user, ['class' => 'm-t']) ?>
            <?= $this->Form->input('first_name', ['class' => 'custom-control']) ?>
            <?= $this->Form->input('last_name', ['class' => 'custom-control']) ?>
            <?= $this->Form->input('email', ['class' => 'custom-control']) ?>
            <?= $this->Form->input('password', ['class' => 'custom-control']) ?>
            <?= $this->Recaptcha->display() ?>
        <?= $this->Form->button(__('Únete Ahora'), ['class' => 'breath btn-block btn-primary full-width m-b',
                                            'templates' => [
                                              'button' => '<button>{{text}}</button>']
                                            ]) ?>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</div>
