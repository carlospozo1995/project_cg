<?php headerPage($data); ?>

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

                            <!-- <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Followers</b> <a class="float-right">1,322</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Following</b> <a class="float-right">543</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Friends</b> <a class="float-right">13,287</a>
                                </li>
                            </ul> -->

                            <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <!-- <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>

                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Education</strong>

                            <p class="text-muted">
                            B.S. in Computer Science from the University of Tennessee at Knoxville
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                            <p class="text-muted">Malibu, California</p>

                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                            <p class="text-muted">
                                <span class="tag tag-danger">UI Design</span>
                                <span class="tag tag-success">Coding</span>
                                <span class="tag tag-info">Javascript</span>
                                <span class="tag tag-warning">PHP</span>
                                <span class="tag tag-primary">Node.js</span>
                            </p>

                            <hr>

                            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                        </div>
                    </div> -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Datos personales</a></li>
                                <li class="nav-item" title="Editar datos personales"><a class="nav-link" href="#settings" data-toggle="tab"><i class="fas fa-user-edit"></i></a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
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

                                <div class="tab-pane" id="settings">
                                    <form class="form-horizontal" id="formUpdateUser">
                                        <input type="hidden" id="idUser" name="idUser" value="<?= $_SESSION['idUser'] ?>">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Identificación</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="identificacion" id="identificacion" value="<?= $_SESSION['userData']['identificacion'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nombre</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $_SESSION['userData']['nombres'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Apellido</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="apellido" name="apellido" value="<?= $_SESSION['userData']['apellidos'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Teléfono</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="telefono" id="telefono" value="<?= $_SESSION['userData']['telefono'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" name="email" id="email" value="<?= $_SESSION['userData']['email_user'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Contraseña</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" name="password" id="password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Confirmar contraseña</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" name="confirmPassword" id="confirmPassword">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>
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

<?php footerPage($data); ?>