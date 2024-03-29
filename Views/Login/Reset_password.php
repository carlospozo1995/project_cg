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
  <link rel="stylesheet" href="<?php echo media(); ?>css/plugins/sweetalert2/sweetalert2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo media(); ?>css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo media(); ?>css/style.css">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-body">

                <div id="loading" class="loading-login-mc">
                    <div>
                        <img src="<?= media(); ?>images/loading.gif" alt="">
                    </div>
                </div>

                <form action="" id="formCambiarPass" name="formCambiarPass">
                    <div class="card-header text-center">
                        <a href="" class="h3"><b><?= $data['page_name'] ?></b></a>
                    </div>

                    <div class="text-center m-2"><i onclick="showPassword(this)" class="fas fa-eye-slash"></i></div>

                    <input type="hidden" id="idUsuario" name="idUsuario" value="<?= $data['idusuario'] ?>" required>
                    <input type="hidden" id="txtEmail" name="txtEmail" value="<?= $data['email'] ?>" required>
                    <input type="hidden" id="txtToken" name="txtToken" value="<?= $data['token'] ?>" required>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control inputReset" id="txtPassword" name="txtPassword" placeholder="Nueva contraseña" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control inputReset" id="txtPasswordConfirm" name="txtPasswordConfirm" placeholder="Confirmar contraseña" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- <div class="col-8">
                            <p class="mb-1">
                                <a href="<?= base_url()?>login" data-toggle="flip"><i class="fas fa-arrow-left"></i> Login</a>
                            </p>
                        </div> -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Confirmar</button>
                        </div>
                    </div>
                </form>

            </div>
            <!-- /.login-card-body -->
        </div>
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
