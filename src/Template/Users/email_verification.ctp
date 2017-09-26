<div class="container" >
  <div class="col-md-6 col-md-offset-3 signup-wizard">
      <div id="register" class="tab-pane fade in active">
        <h3 class="text-center"> Educacion</h3>
          <div class="innter-form">
            <?php if (!$user): ?>
                <h4 class="text-center">El correo no se pudo verificar, vuelva a intentar</h4>
            <?php else: ?>
                <h4 class="text-center">El correo ha sido verificado</h4>
            <?php endif ?>
          </div>
      </div>
  </div>
</div>
