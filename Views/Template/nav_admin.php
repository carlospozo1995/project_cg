<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 aside-mc">
    <!-- Brand Logo -->
    <a href="<?php base_url(); ?>sistema" class="brand-link">
      <!-- <img src="<?= media(); ?>images/logo_cg.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3 logocg-mc" style="opacity: .8"> -->
      <span class="title-s-mc">Empresa</span>
      <!-- Créditos GUAMAN -->
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="align-items:center;">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <span><?= $_SESSION['userData']['nombres']." ".$_SESSION['userData']['apellidos'] ?></span>
          <p style="margin-bottom: 0px;"><?= $_SESSION['userData']['nombrerol'] ?></p>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php if (!empty($_SESSION['permisos'][1]['ver'])) {?>
          <li class="nav-item">
            <a href="<?php base_url(); ?>sistema" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>Home</p>
            </a>
          </li>
          <?php } ?>

          <?php if (!empty($_SESSION['permisos'][2]['ver']) || !empty($_SESSION['permisos'][3]['ver'])){?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php if (!empty($_SESSION['permisos'][2]['ver'])){?>
              <li class="nav-item">
                <a href="<?php base_url(); ?>usuarios" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>
              <?php } ?>
              <?php if (!empty($_SESSION['permisos'][3]['ver'])){?>
              <li class="nav-item">
                <a href="<?php base_url(); ?>roles" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
              <?php } ?>
            </ul>
          </li>
          <?php } ?>

          <?php if (!empty($_SESSION['permisos'][6]['ver'])) {?>
            <li class="nav-item">
              <a href="<?php base_url(); ?>clientes" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>Clientes</p>
              </a>
            </li>
          <?php } ?>

          <?php if (!empty($_SESSION['permisos'][4]['ver']) || !empty($_SESSION['permisos'][5]['ver'])) {?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-store"></i>
              <p>
                Tienda
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php if (!empty($_SESSION['permisos'][5]['ver'])) {?>
              <li class="nav-item">
                <a href="<?php base_url(); ?>categorias" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categorias</p>
                </a>
              </li>
              <?php } ?>

              <?php if (!empty($_SESSION['permisos'][4]['ver'])) {?>
              <li class="nav-item">
                <a href="<?php base_url(); ?>productos" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Productos</p>
                </a>
              </li>
              <?php } ?>
            </ul>
          </li>
          <?php } ?>

        </ul>
      </nav>
    </div>
  </aside>