<?php 
  headerPage($data);
?>

<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6 add-new-mc">
          <h1><?= $data['page_name'] ?></h1>
          <?php if (!empty($_SESSION['permisosMod']['crear'])) {
          ?>
          <!-- <button type="button" class="btn btn-primary" id="btnNewUser" onclick="modalNewUser()"><i class="fas fa-plus-circle"></i> Nuevo</button> -->
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
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>  

</div>

<?php footerPage($data); ?>