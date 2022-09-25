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
              <table id="tableProductos" class="table_order table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Codigo</th>
                  <th>Nombre</th>
                  <th>Precio</th>
                  <th>Stock</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
                </thead>

                <tbody>
                  <?php
                    if($_SESSION['permisosMod']['ver']){
                      require_once 'Models/ProductosModel.php';
                      $objLogin = new ProductosModel();
                      $request = $objLogin->allProductos();
                      foreach ($request as $key => $value) {
                        $btnView = '';
                        $btnUpdate = '';
                        $btnDelete = '';

                        $value['precio'] = SMONEY.' '.formatMoney($value['precio']);

                        if ($_SESSION['permisosMod']['ver']) {
                          $btnView = '<button type="button" class="btn btn-secondary btn-sm" onclick="viewProducto('.$value['idproducto'].')" tilte="Ver"><i class="fas fa-eye"></i></button>';
                        }
    
                        if (!empty($_SESSION['permisosMod']['actualizar'])) {
                            $btnUpdate = '<button type="button" class="btn btn-primary btn-sm" onclick="editProducto(this,'.$value['idproducto'].')" tilte="Editar"><i class="fas fa-pencil-alt"></i></button>';
                        }
    
                        if (!empty($_SESSION['permisosMod']['eliminar']) && $_SESSION['idUser'] == 1){
                            $btnDelete = ' <button type="button" class="btn btn-danger btn-sm" onclick="deleteProducto('.$value['idproducto'].')" tilte="Eliminar"><i class="fas fa-trash"></i></button>';
                        }

                        if ($value['status'] == 1) {
                          $value['status'] = '<div class="text-center"><span class="bg-success p-1 rounded"><i class="fas fa-user"></i> Activo</span></div>';
                        }else{
                            $value['status'] = '<div class="text-center"><span class="bg-danger p-1 rounded"><i class="fas fa-user-slash"></i> Inactivo</span></div>';
                        }

                        echo'<tr>';
                          echo '<td>'.$value['idproducto'].'</td>';
                          echo '<td>'.$value['codproducto'].'</td>';
                          echo '<td>'.$value['nombre'].'</td>';
                          echo '<td>'.$value['precio'].'</td>';
                          echo '<td>'.$value['stock'].'</td>';
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
  </section>

</div>

<?php footerPage($data); ?>