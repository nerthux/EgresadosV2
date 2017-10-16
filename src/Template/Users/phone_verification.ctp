<div class="container" >
  <div class="col-md-6 col-md-offset-3 signup-wizard">
      <div id="register" class="tab-pane fade in active">
        <h3 class="text-center"> Validar Teléfono Celular </h3>
          <div class="innter-form">
            <?= $this->Form->create(null, ['class' => 'm-t']) ?>
                <?= $this->Form->control('code'); ?>

                <?= $this->Form->button(__('Submit'), ['class' => 'breath btn-block btn-success full-width m-b',
                                                    'templates' => [
                                                      'button' => '<button>{{text}}</button>']
                                                    ]) ?>
              <?= $this->Form->end() ?>
              <a href="">Skip</a>
          </div>
      </div>
  </div>
</div>
