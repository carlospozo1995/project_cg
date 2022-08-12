<div class="modal fade" id="modalUpdateUser">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header headerUpdate-mc">
                <h4 class="modal-title">Actualizar Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Los campos que contienen un (<span class="required">*</span>) son obligatorios.</p>
                <div class="card card-primary">
                <!-- form start -->
                    <form id="formPerfil" name="formPerfil">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Identificación</label>
                                        <input type="text" class="form-control" id="identificacion" name="identificacion" value="<?= $_SESSION['userData']['identificacion'] ?>" required disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nombre<span class="required"> *</span></label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $_SESSION['userData']['nombres'] ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Apellido<span class="required"> *</span></label>
                                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?= $_SESSION['userData']['apellidos'] ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Teléfono<span class="required"> *</span></label>
                                        <input type="text" class="form-control" id="telefono" name="telefono" value="<?= $_SESSION['userData']['telefono'] ?>" required ">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="txtEmail">Email<span class="required"> *</span></label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?= $_SESSION['userData']['email_user'] ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group ">
                                        <label>Contraseña</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group ">
                                        <label>Confirmar contraseña</label>
                                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn bg-success">Actualizar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>