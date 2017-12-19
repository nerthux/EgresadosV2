<div class="container" >
  <div class="col-md-6 col-md-offset-3 signup-wizard">
      <div id="register" class="tab-pane fade in active">
        <h3 class="text-center"> Verificación de Email</h3>
          <div class="innter-form">
            <?= $this->Flash->render() ?> 
            <form method="post" accept-charset="utf-8" role="form" action="/users/emailVerification">
            <div class="col-md-10 col-md-offset-1">
                <input id="code" name="code" type="text" />
            </div>
                <button type="submit" class="btn btn-primary btn-block">Validar Email</button>
            </form>

          </div>
      </div>
  </div>
</div>

<script>
$('#code').pincodeInput({inputs:6,hidedigits:false});
</script>