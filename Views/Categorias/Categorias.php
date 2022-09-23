<?php 
  headerPage($data);
  getModal("modalCategoria", $data);
?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 add-new-mc">
            <h1><?= $data['page_name'] ?></h1>
            <?php if (!empty($_SESSION['permisosMod']['crear'])) {
            ?>
            <button type="button" class="btn btn-primary" onclick="modalNewCategoria()"><i class="fas fa-plus-circle"></i> Nuevo</button>
            <?php
            } ?>
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tableCategorias" class="table_order table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Categoria padre</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    if($_SESSION['permisosMod']['ver']){
                      require_once 'Models/CategoriasModel.php';
                      $objLogin = new CategoriasModel();
                      $request = $objLogin->allCategorias();
                      foreach ($request as $key => $value) {
                        $btnView = '';
                        $btnUpdate = '';
                        $btnDelete = '';

                        if ($_SESSION['permisosMod']['ver']) {
                            $btnView = '<button type="button" class=" btnViewCategory btn btn-secondary btn-sm" onclick="viewCategoria('.$value['idcategoria'].')" tilte="Ver"><i class="fas fa-eye"></i></button>';
                        }

                        if (!empty($_SESSION['permisosMod']['actualizar'])) {
                            
                            $btnUpdate = '<button type="button" class="btnEditCategoria btn btn-primary btn-sm" onclick="editCategoria(this,'.$value['idcategoria'].')" tilte="Editar"><i class="fas fa-pencil-alt"></i></button>';
                        }

                        if (!empty($_SESSION['permisosMod']['eliminar']) && $_SESSION['idUser'] == 1){
                            $btnDelete = ' <button type="button" class="btnDelete btn btn-danger btn-sm" onclick="deleteCategoria(this,'.$value['idcategoria'].')" tilte="Eliminar"><i class="fas fa-trash"></i></button>';
                        }
                
                        if ($value['status'] == 1) {
                            $value['status'] = '<div class="text-center"><span class="bg-success p-1 rounded"><i class="fas fa-user"></i> Activo</span></div>';
                        }else{
                            $value['status'] = '<div class="text-center"><span class="bg-danger p-1 rounded"><i class="fas fa-user-slash"></i> Inactivo</span></div>';
                        }

                        echo'<tr>';
                          echo '<td>'.$value['idcategoria'].'</td>';
                          echo '<td>'.$value['nombre'].'</td>';
                          echo '<td>'.$value['fathercatname'].'</td>';
                          echo '<td>'.$value['status'].'</td>';
                          echo '<td><div class="text-center">'.$btnView.' '.$btnUpdate.' '.$btnDelete.'</div></td>';
                        echo'</tr>';
                      }
                    }
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php footerPage($data); ?>