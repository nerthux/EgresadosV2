<div class="container fill highlighted" >
  <div class="col-md-8 col-md-offset-2">
      <div id="register" class="tab-pane fade in active">
        <h3 class="text-center"> Educacion</h3>
          <div class="innter-form">
            <?= $this->Form->create(null, ['class' => 'm-t']) ?>
                <?= $this->Form->control('code'); ?>

                <?= $this->Form->button(__('Submit'), ['class' => 'breath btn-block btn-primary full-width m-b',
                                                    'templates' => [
                                                      'button' => '<button>{{text}}</button>']
                                                    ]) ?>
              <?= $this->Form->end() ?>
              <a href="">Skip</a>
          </div>
      </div>
  </div>
</div>