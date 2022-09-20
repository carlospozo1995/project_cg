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
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo media(); ?>css/plugins/toastr/toastr.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo media(); ?>css/plugins/datatables-bs4/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo media(); ?>css/plugins/datatables-responsive/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo media(); ?>css/plugins/datatables-buttons/buttons.bootstrap4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo media(); ?>css/plugins/select2/select2.min.css">
  <!-- Summernote -->
  <link rel="stylesheet" href="<?php echo media(); ?>js/plugins/summernote/summernote.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo media(); ?>css/adminlte.min.css">
  <!-- My style -->
  <link rel="stylesheet" href="<?php echo media(); ?>css/style.css">
</head>
<body class="hold-transition sidebar-mini">
  <div id="loading" class="loading-login-mc">
      <div>
          <img src="<?= media(); ?>images/loading.gif" alt="">
      </div>
  </div>
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <span class="nav-link">Menu</span>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <i class="fas fa-user "></i>
          <span class="d-none d-md-inline"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?= $_SESSION['userData']['nombres']." ".$_SESSION['userData']['apellidos'] ?></font></font></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            <p><?= $_SESSION['userData']['nombrerol'] ?></p>
            <p>
              <small><?= fecha(); ?></small>
            </p>
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="<?= base_url();?>perfil" class="btn btn-default btn-flat">Perfil</a>
            <a href="<?= base_url();?>logout" class="btn btn-default btn-flat float-right">Cerrar sesión</a>
          </li>
        </ul>
      </li>
      
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Aside nav -->

    <?php require_once("nav_page.php"); ?>