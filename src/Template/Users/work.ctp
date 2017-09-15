<div class="container fill highlighted" >
  <div class="col-md-8 col-md-offset-2">
      <div id="register" class="tab-pane fade in active">
        <h3 class="text-center"> Trabajol</h3>
          <div class="innter-form">
            <?= $this->Form->create(null, ['class' => 'm-t']) ?>
              <div class="text-center">
                 <?= $this->Form->input('company', ['id' => 'company']) ?>
              </div>
              <div class="text-center">
                 <?= $this->Form->input('position') ?>
              </div>
                <div class="text-center">
                   <?= $this->Form->date('start_date', ['empty' => true, 'minDate' =>1980]) ?>
                </div>
                <div class="text-center">
                   <?= $this->Form->date('end_date', ['empty' => true, 'minDate' =>1980]) ?>
                </div>
                <div class="text-center">
                   <?= $this->Form->textarea('description') ?>
                </div>
            <?= $this->Form->button(__('Submit'), ['class' => 'breath btn-block btn-primary full-width m-b',
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