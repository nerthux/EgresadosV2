<div class="container" >
  <div class="col-md-6 col-md-offset-3  signup-wizard">
      <div id="register" class="tab-pane fade in active">
        <h3 class="text-center"> Trabajo</h3>
          <div class="innter-form">
            <?= $this->Form->create(null, ['class' => 'm-t']) ?>
              <div class="">
                 <?= $this->Form->input('company', ['id' => 'company']) ?>
              </div>
              <div class="">
                 <?= $this->Form->input('position') ?>
              </div>
                <div class="">
                    <label for="start_date"><?= __("Start Date") ?></label>
                   <?= $this->Form->date('start_date', ['empty' => true, 'minYear' =>1980, 'maxYear' => '2017']) ?>
                </div>
                <div class="">
                    <label for="end_date"><?= __("End Date") ?></label>
                   <?= $this->Form->date('end_date', ['empty' => true, 'minYear' =>1980, 'maxYear' => '2017']) ?>
                </div>
                <div class="">
                  <label for="description"> <?= __("Description") ?></label>
                   <?= $this->Form->textarea('description') ?>
                </div>

            <?= $this->Form->button(__('Siguiente'), ['class' => 'breath btn-block btn-success full-width m-b',
                                                'templates' => [
                                                  'button' => '<button>{{text}}</button>']
                                                ]) ?>
            <?= $this->Form->end() ?>
          </div>
      </div>
  </div>
</div>

<script>
  $( "#company" ).autocomplete( {
      source:function( request, response ) {
        $.ajax( {
          url: "/companies/names",
          data: {
                  q: request.term
          },
          success: function( data ) {
            response( data );
          }
        } );
      },
      minLength: 2,
  });
</script>