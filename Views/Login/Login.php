<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="">
  <title><?= $data['page_title'] ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo media(); ?>css/plugins/fontawesome-free/css/all.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo media(); ?>css/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo media(); ?>css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo media(); ?>css/style.css">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary login-content">
      <div class="card-body login">
        
        <form class="login-form" action="" name="formLogin" id="formLogin">
          <div class="card-header text-center">
            <a href="" class="h3"><b>INICIAR SESION</b></a>
          </div>

          <div class="input-group mb-3">
            <input type="email" name="txtEmail" class="form-control" placeholder="Email" id="txtEmail">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="txtPassword" id="txtPassword">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-8">
              <p class="mb-1">
                <a href="#" data-toggle="flip">¿Olvidé mi contraseña?</a>
              </p>
            </div>

            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt"></i> Sign In</button>
            </div>
          </div>
        </form>

        <!-- ------------------------------- -->

        <form action="" method="" class="forget-form">
          <div class="card-header text-center">
            <a href="" class="h4"><b>REINICIAR CONTRASEÑA</b></a>
          </div>

          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Reiniciar</button>
            </div>

            <p class="mt-3 mb-1">
              <a href="#" data-toggle="flip"><i class="fas fa-arrow-left"></i> Login</a>
            </p>
          </div>
        </form>

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
<!-- /.login-box -->

<!-- jQuery -->
<script>
      const base_url = "<?php echo base_url();?>"
</script>
<script src="<?php echo media(); ?>js/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo media(); ?>js/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo media(); ?>js/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo media(); ?>js/adminlte.min.js"></script>
<script src="<?php echo media(); ?>js/<?= $data['page_functions_js'] ?>"></script>
</body>
</html>
