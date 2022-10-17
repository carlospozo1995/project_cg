<?php 
  headerAdmin($data);
  getModal("modalClientes", $data);
?>

<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6 add-new-mc">
          <h1><?= $data['page_name'] ?></h1>
          <?php if (!empty($_SESSION['permisosMod']['crear'])) {
          ?>
          <button type="button" class="btn btn-primary" id="btnNewCliente" onclick="modalNewCliente()"><i class="fas fa-plus-circle"></i> Nuevo</button>
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
              <div class="card-body">
                <table id="tableClientes" class="table_order table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Status</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    if($_SESSION['permisosMod']['ver']){
                      require_once 'Models/ClientesModel.php';
                      $objClientes = new ClientesModel();
                      $request = $objClientes->selectClientes();
                      foreach ($request as $key => $value) {
                        $btnView = '';
                        $btnUpdate = '';
                        $btnDelete = '';

                        if ($_SESSION['permisosMod']['ver']) {
                            $btnView = '<button type="button" class="btn btn-secondary btn-sm" onclick="viewCliente('.$value['idusuario'].')" tilte="Ver"><i class="fas fa-eye"></i></button>';
                        }

                        if (!empty($_SESSION['permisosMod']['actualizar']) && $_SESSION['idUser'] == 1) {
                            $btnUpdate = '<button type="button" class="btn btn-primary btn-sm" onclick="editCliente(this,'.$value['idusuario'].')" tilte="Editar"><i class="fas fa-pencil-alt"></i></button>';
                        }

                        if (!empty($_SESSION['permisosMod']['eliminar']) && $_SESSION['idUser'] == 1){
                            $btnDelete = '<button type="button" class="btn btn-danger btn-sm" onclick="deleteCliente(this,'.$value['idusuario'].')" tilte="Eliminar"><i class="fas fa-trash"></i></button>';
                        }
                
                        if ($value['status'] == 1) {
                            $value['status'] = '<div class="text-center"><span class="bg-success p-1 rounded"><i class="fas fa-user"></i> Activo</span></div>';
                        }else{
                            $value['status'] = '<div class="text-center"><span class="bg-danger p-1 rounded"><i class="fas fa-user-slash"></i> Inactivo</span></div>';
                        }

                        echo'<tr>';
                          echo '<td>'.$value['idusuario'].'</td>';
                          echo '<td>'.$value['nombres'].'</td>';
                          echo '<td>'.$value['apellidos'].'</td>';
                          echo '<td>'.$value['email_user'].'</td>';
                          echo '<td>'.$value['telefono'].'</td>';
                          echo '<td>'.$value['status'].'</td>';
                          echo '<td><div class="text-center">'.$btnView.' '.$btnUpdate.' '.$btnDelete.'</div></td>';
                        echo'</tr>';
                      }
                    }
                  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>  

</div>

<?php footerAdmin($data); ?>