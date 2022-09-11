<?php 
  headerPage($data);
  getModal("modalProducto", $data);
?>

<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6 add-new-mc">
          <h1><?= $data['page_name'] ?></h1>
          <?php if (!empty($_SESSION['permisosMod']['crear'])) {
          ?>
          <button type="button" class="btn btn-primary" onclick="modalNewProducto()"><i class="fas fa-plus-circle"></i> Nuevo</button>
          <?php
          } ?>
          
        </div>
      </div>
    </div>
  </section>
  
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-body">
              <table id="tableCategorias" class="table_order table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Codigo</th>
                  <th>Nombre</th>
                  <th>Precio</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
                </thead>

                <tbody>
                  <!-- CALL DATABASE USUARIOS WITH JS -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>

<?php footerPage($data); ?>