<div class="container">
      <div  class="col-md-6 col-md-offset-3  signup-wizard">
        <h3 class="text-center"> Informacion Personal</h3>
          <div class="innter-form">
            <?= $this->Form->create($user, ['class' => 'm-t']) ?>
                <div class="col-md-7" >
                  <?= $this->Form->input('date_of_birth', ['minYear' => "1980", 'maxYear' => "2000"]) ?>
                </div>
               <div class="form-group col-md-7 ">
                <label for="gener">Sexo</label>
                 <?= $this->Form->select('gender', ['M' => "Masculino", "F" => "Femenino", "O" => "Otro"]) ?>
               </div>
                
            <?= $this->Form->button(__('Siguiente ->'), ['class' => 'breath btn-block btn-primary full-width m-b',
                                                'templates' => [
                                                  'button' => '<button>{{text}}</button>']
                                                ]) ?>
            <?= $this->Form->end() ?>
          </div>
      </div>
  </div>
</div>
