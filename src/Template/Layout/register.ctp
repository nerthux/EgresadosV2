<!DOCTYPE html>
<html lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Seguimiento de Egresados ITT - Unete a la comunidad</title>

    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/the-big-picture.css" rel="stylesheet">
    <link href="/css/header.css" rel="stylesheet">
    <link href="/css/jquery-ui.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/custom.css">
    <!-- jQuery -->
    <script src="/js/jquery/jquery.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
     <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
          <?php if (!$this->request->session()->read('Auth.User.id')): ?>
              <!-- Brand and toggle get grouped for better mobile display -->
                  <form id="sigin"  class="navbar-form navbar-right" method="post" accept-charset="utf-8" role="form" action="/users/login">

                    <input type="hidden" name="_method" class="form-control" value="POST">
                   <div class="input-group">
                    <input id="email" type="text" class="form-control custom-control" name="email" value="" placeholder="Email">                                        
                  </div>

                  <div class="input-group">
                    <input id="password" type="password" class="form-control custom-control" name="password" value="" placeholder="Contraseña">  
                  </div>

                  <button type="submit" class="btn btn-outline">Iniciar Sesion</button>

                  <div class="input-group">
                      <a href="/users/password-recovery" class="navbar-right link-forgot-password"> Olvidaste tu contraseña ? </a>
		</div>
                </form>
              <?php endif ?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
   <div class="full">
      <!-- Page Content -->
      <div class="container">
        <div class="row breath">
          <?= $this->fetch('content') ?>
        </div>
        <!-- /.row -->
      </div>
    </div>
    <!-- /.container -->

    
    
    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap/bootstrap.min.js"></script>

</body>

</html>
