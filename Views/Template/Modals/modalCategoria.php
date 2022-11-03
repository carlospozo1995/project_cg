<div class="modal fade" id="modalFormCategoria">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header headerRegister-mc">
                <h4 class="modal-title">Nueva Categoria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p>Los campos que contienen un (<span class="required">*</span>) son obligatorios.</p>
                <div class="card card-primary">
                    <form id="formCategoria" name="formCategoria">
                        <input type="hidden" id="idCategoria" name="idCategoria" value="">
                        <input type="hidden" id="foto_actual" name="foto_actual" value="">
                        <input type="hidden" id="foto_remove" name="foto_remove" value="0">
                        <input type="hidden" id="icono_actual" name="icono_actual" value="">
                        <input type="hidden" id="icono_remove" name="icono_remove" value="0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Titulo<span class="required"> *</span></label>
                                        <input type="text" class="form-control" placeholder="Titulo de la categoria" id="txtTitulo" autocomplete="off" name="txtTitulo" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="categoriaId">Categoria padre<span class="required"> *</span></label>
                                        <select class="form-control" style="width:100%" id="listCategorias" name="listCategorias" required></select>
                                    </div>

                                    <div class="form-group">
                                        <p class="errorArchivo errorIcono"></p>
                                        <div class="icon">
                                            <label for="icono">Icono (64x64)<span class="required"> *</span></label>
                                            <div class="prevIcono">
                                                <span class="delIcono notBlock">X</span>
                                                <label for="icono"></label>
                                                <div class="iconStyle"> 
                                                    <!-- Carga de icono js -->
                                                </div>
                                            </div>
                                            <div class="upimg">
                                                <input type="file" name="icono" id="icono">
                                            </div>
                                            <div id="icono_alert"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <p class="errorArchivo errorCategoria"></p>
                                        <div class="photo">
                                            <label for="foto">Foto (150 x 150)</label>
                                            <div class="prevPhoto">
                                                <span class="delPhoto notBlock">X</span>
                                                <label for="foto"></label>
                                                <div>
                                                    <img src="<?= media(); ?>images/uploads/imgCategoria.png" id="img" alt="">
                                                </div>
                                            </div>
                                            <div class="upimg">
                                                <input type="file" name="foto" id="foto">
                                            </div>
                                            <div id="foto_alert"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="listStatus">Status Categoria<span class="required"> *</span></label>
                                        <select class="form-control" id="listStatus" name="listStatus" required>
                                            <option value="1">Activo</option>
                                            <option value="2">Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button id="btnSubmitCategoria" type="submit" class="btn btn-primary btnText">Agregar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>

           
        </div>
    </div>
</div>

<div class="modal fade" id="modalViewCategoria">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header header-primary-mc">
                <h4 class="modal-title">Datos de categoria</h4>
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
                                <td>Nombre:</td>
                                <td id="celNombre"></td>
                            </tr>
                            <tr>
                                <td>Imagen:</td>
                                <td id="celImagen"></td>
                            </tr>
                            <tr>
                                <td>Icono:</td>
                                <td id="celIcono"></td>
                            </tr>
                            <tr>
                                <td>Fecha de registro:</td>
                                <td id="celFecharegistro"></td>
                            </tr>
                            <tr>
                                <td>Categoria padre</td>
                                <td id="celCatPadre"></td>
                            </tr>
                            <tr>
                                <td>Estado:</td>
                                <td id="celEstado"></td>
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
