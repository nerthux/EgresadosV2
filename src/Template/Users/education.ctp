<div class="container " >
  <div class="col-md-4 col-md-offset-4 signup-wizard">
      <div id="register" class="tab-pane fade in active">
        <h3 class="text-center"> Educacion</h3>
        
          <div class="innter-form">
            <?= $this->Form->create($user, ['class' => 'm-t']) ?>
                <?= $this->Form->control('generation_id', ['options' => $generations]); ?>
                <?= $this->Form->control('career_id', ['options' => $careers]);     ?> 
                <label for="have_title">Si estoy titulado </label>  
                <?= $this->Form->checkbox('have_title', ['hiddenField' => false]);?>        
                <?= $this->Form->button(__('Submit'), ['class' => 'breath btn-block btn-success full-width m-b',
                                                    'templates' => [
                                                      'button' => '<button>{{text}}</button>']
                                                    ]) ?>
              <?= $this->Form->end() ?>
          </div>
      </div>
  </div>
</div>
