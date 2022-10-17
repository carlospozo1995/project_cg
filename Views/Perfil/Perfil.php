<?php 
    headerAdmin($data);
    getModal("modalPerfil", $data);
?>

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
        
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                    <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                    src="../../dist/img/user4-128x128.jpg"
                                    alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center"><?= $_SESSION['userData']['nombres']." ".$_SESSION['userData']['apellidos'] ?></h3>

                                <p class="text-muted text-center"><?= $_SESSION['userData']['nombrerol'] ?></p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item nav-link active">Datos personales</li>
                                    <li class="nav-item nav-link" onclick="openModalUpdate();" title="Editar datos personales"><i class="fas fa-user-edit"></i></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <div class="tab-content">
                                    <div >
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td>Identificación:</td>
                                                    <td><?= $_SESSION['userData']['identificacion']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Nombres:</td>
                                                    <td><?= $_SESSION['userData']['nombres']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Apellidos:</td>
                                                    <td><?= $_SESSION['userData']['apellidos']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>teléfono:</td>
                                                    <td><?= $_SESSION['userData']['telefono']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Email(Usuario):</td>
                                                    <td><?= $_SESSION['userData']['email_user']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Tipo Usuario:</td>
                                                    <td><?= $_SESSION['userData']['nombrerol']; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>

<?php footerAdmin($data); ?>