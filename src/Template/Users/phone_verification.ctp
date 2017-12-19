<div class="container" >
  <div class="col-md-6 col-md-offset-3 signup-wizard">
      <div id="register" class="tab-pane fade in active">
        <h3 class="text-center"> Validar Teléfono Celular </h3>
          <div class="innter-form">
            <?= $this->Form->create(null, ['class' => 'm-t']) ?>
            	<?php if($user->sms_validation_code): ?>
			          <?= $this->Form->control('code'); ?>
		          <?php endif; ?>


                <?= $this->Form->button(__('Siguiente'), ['class' => 'breath btn-block btn-success full-width m-b',
                                                    'templates' => [
                                                      'button' => '<button>{{text}}</button>']
                                                    ]) ?>
              <?= $this->Form->end() ?>
              <a href="">Skip</a>
          </div>
      </div>
  </div>
</div>

<script>
  $("#mobile-phone-number").intlTelInput( { preferredCountries: [ "mx", "us" ], utilsScript: "/js/phone_validator/utils.js" });

$("form").submit(function(e) {
  $("#hidden").val($("#mobile-phone-number").intlTelInput("getNumber"));
});

$('#code').pincodeInput({inputs:4,hidedigits:false});

</script>
