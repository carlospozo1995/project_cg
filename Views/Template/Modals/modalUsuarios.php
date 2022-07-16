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
                        <input type="hidden" id="idUser" name="idUser" value="">

                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="txtCedula">Identificación</label>
                                        <input type="text" class="form-control" id="txtCedula" name="txtCedula">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="txtNombres">Nombres</label>
                                        <input type="text" class="form-control" id="txtNombres" name="txtNombres">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="txtApellidos">Apellidos</label>
                                        <input type="text" class="form-control" id="txtApellidos" name="txtApellidos">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="txtTelefono">Teléfono</label>
                                        <input type="text" class="form-control" id="txtTelefono" name="txtTelefono">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="txtEmail">Email</label>
                                        <input type="email" class="form-control" id="txtEmail" name="txtEmail">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="listRolid">Rol del usuario</label>
                                        <select style="width:100%" class="form-control" id="listRolid" name="listRolid">
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="listStatus">Status Usuario</label>
                                        <select class="form-control" id="listStatus" name="listStatus">
                                            <option value="1">Activo</option>
                                            <option value="2">Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="txtNombre">Contraseña</label>
                                        <input type="password" class="form-control" id="txtPassword" name="txtPassword">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button id="btnSubmitRol" type="submit" class="btn btn-primary btnText">Guardar</button>
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

