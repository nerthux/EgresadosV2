<div class="container fill highlighted" >
<div class="col-md-6 col-sm-6 pull-left ">
  <h1> ¡ Bienvenido Egresado ! </h1>
  <h3> ¿ Eres egresado del Tecnológico de Tijuana ? </h3>
  <p> Este espacio fue creado para tí, el Instituto Tecnológico de Tijuana ha creado el Sistema de Seguimiento de Egresados 
      para mantenernos en contacto contigo. Nos interesa saber acerca de ti, informarte sobre eventos especiales para egresados,
      involucrarte en nuestros proyectos de vinculación y sobretodo recordarte que esta siempre será tu casa.
  </p>
  <h4> Closed BETA </h4>
  <p> Este sitio está en su fase de pruebas, si tu carrera o generación no se encuentran en la lista, próximamente lo estarán.</p>
</div>

<div class="col-md-6 col-sm-6 pull-right ">
  <div id="register" class="tab-pane fade in active">
    <h3> Registrate y mantente en contacto</h3>
    <div class="innter-form">
      <?= $this->Form->create($user, ['class' => 'm-t']) ?>
          <?= $this->Form->input('first_name') ?>
          <?= $this->Form->input('last_name') ?>
          <?= $this->Form->input('email') ?>
          <?= $this->Form->input('password') ?>
          <?= $this->Recaptcha->display() ?>

      <?= $this->Form->button(__('Submit'), ['class' => 'breath btn-block btn-primary full-width m-b',
                                          'templates' => [
                                            'button' => '<button>{{text}}</button>']
                                          ]) ?>
      <?= $this->Form->end() ?>

    </div>
  </div>
</div>
</div>