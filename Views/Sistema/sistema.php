<?php headerPage($data); ?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $data['page_name'] ?></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php dep(sessionUser($_SESSION['idUser']));
        ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php footerPage($data); ?>