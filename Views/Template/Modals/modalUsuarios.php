<div class="modal fade" id="modalFormUser">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header headerRegister-mc">
                <h4 class="modal-title">Nuevo Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                <!-- form start -->
                    <form id="formNewUser" name="formNewUser">
                        <input type="hidden" id="idUsuario" name="idUsuario" value="">

                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="txtIdentificacion">Identificación</label>
                                        <input type="text" class="form-control" id="txtIdentificacion" name="txtIdentificacion" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="txtNombre">Nombre</label>
                                        <input type="text" class="form-control" id="txtNombre" name="txtNombre" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="txtApellido">Apellido</label>
                                        <input type="text" class="form-control" id="txtApellido" name="txtApellido" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="txtTelefono">Teléfono</label>
                                        <input type="text" class="form-control" id="txtTelefono" name="txtTelefono" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="txtEmail">Email</label>
                                        <input type="email" class="form-control" id="txtEmail" name="txtEmail" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="listRolid">Rol del usuario</label>
                                        <select style="width:100%" class="form-control" id="listRolid" name="listRolid" required>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="listStatus">Status Usuario</label>
                                        <select class="form-control" id="listStatus" name="listStatus" required>
                                            <option value="1">Activo</option>
                                            <option value="2">Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group ">
                                        <label for="txtNombre">Contraseña</label>
                                        <div class="eye-show-mc">
                                            <input type="password" class="form-control" id="txtPassword" name="txtPassword">
                                            <span title="Mostrar" class="container-eye-mc"><i class="fas fa-eye-slash show-password"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button id="btnSubmitUser" type="submit" class="btn btn-primary btnText">Guardar</button>
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



<div class="modal fade" id="modalViewUser">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-primary-mc">
                <h4 class="modal-title">Datos del usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                <!-- Table data user -->
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>Identificación:</td>
                                <td id="celIdentificacion"></td>
                            </tr>
                            <tr>
                                <td>Nombres:</td>
                                <td id="celNombre"></td>
                            </tr>
                            <tr>
                                <td>Apellidos:</td>
                                <td id="celApellido"></td>
                            </tr>
                            <tr>
                                <td>teléfono:</td>
                                <td id="celTelefono"></td>
                            </tr>
                            <tr>
                                <td>Email(Usuario):</td>
                                <td id="celEmailUser"></td>
                            </tr>
                            <tr>
                                <td>Tipo Usuario:</td>
                                <td id="celTipoUsuario"></td>
                            </tr>
                            <tr>
                                <td>Estado:</td>
                                <td id="celEstado"></td>
                            </tr>
                            <tr>
                                <td>Fecha registro:</td>
                                <td id="celFecharegistro"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

