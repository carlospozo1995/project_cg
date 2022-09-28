<div class="modal fade" id="modalFormProducto">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header headerRegister-mc">
                <h4 class="modal-title">Nuevo Producto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p>Los campos que contienen un (<span class="required">*</span>) son obligatorios.</p>
                <div class="card card-primary">
                    <form id="formProducto" name="formProducto">
                        <input type="hidden" id="idProducto" name="idProducto" value="">
                        <!-- <input type="hidden" id="foto_actual" name="foto_actual" value="">
                        <input type="hidden" id="foto_remove" name="foto_remove" value="0"> -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>Nombre<span class="required"> *</span></label>
                                        <input type="text" class="form-control" id="txtNombre" autocomplete="off" name="txtNombre" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Descripción principal<span class="required"> *</span></label>
                                        <textarea rows="2" style="width: 100%;" id="txtDescPcp" autocomplete="off" name="txtDescPcp" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Descripción general</label>
                                        <textarea style="width: 100%;" id="txtDescGrl" autocomplete="off" name="txtDescGrl"></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Marca<span class="required"> *</span></label>
                                        <input type="text" class="form-control" id="txtMarca" autocomplete="off" name="txtMarca" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="txtCodigo">Código<span class="required"> *</span></label>
                                        <input type="text" class="form-control valid validNumber" id="txtCodigo" autocomplete="off" name="txtCodigo" required>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="txtCodigo">Precio<span class="required"> *</span></label>
                                                <input type="text" class="form-control" id="txtPrecio" autocomplete="off" name="txtPrecio" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="txtStock">Stock<span class="required"> *</span></label>
                                                <input type="text" class="form-control valid validNumber" id="txtStock" autocomplete="off" name="txtStock" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="listCategorias">Categoria<span class="required"> *</span></label>
                                        <select class="form-control" style="width:100%" id="listCategorias" name="listCategorias" required>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="listStatus">Status Producto<span class="required"> *</span></label>
                                        <select class="form-control" id="listStatus" name="listStatus" required>
                                            <option value="1">Activo</option>
                                            <option value="2">Inactivo</option>
                                        </select>
                                    </div>

                                    <br>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <button id="btnSubmitProducto" type="submit" class="btn btn-primary btnText btn-block">Agregar</button>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="containerGallery">
                                            <span><b>Agregar fotos</b> (440 x 545)</span>
                                            <button class="btnAddImage btn btn-info btn-sm" type="button">
                                                <i class="fas fa-plus-circle"></i>
                                            </button>
                                        </div>
                                        <hr>
                                        <div id="containerImages">
                                            <!-- IMAGENES DE PRODUCTOS POR JS -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

           
        </div>
    </div>
</div>

<div class="modal fade" id="modalViewProducto">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header header-primary-mc">
                <h4 class="modal-title">Datos del  producto</h4>
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
                                <td>Codigo:</td>
                                <td id="celCodigo"></td>
                            </tr>
                            <tr>
                                <td>Nombre:</td>
                                <td id="celNombre"></td>
                            </tr>
                            <tr>
                                <td>Marca:</td>
                                <td id="celMarca"></td>
                            </tr>
                            <tr>
                                <td>Categoria:</td>
                                <td id="celCtg"></td>
                            </tr>
                            <tr>
                                <td>Precio:</td>
                                <td id="celPrecio"></td>
                            </tr>
                            <tr>
                                <td>Stock:</td>
                                <td id="celStock"></td>
                            </tr>
                            <tr>
                                <td>Status:</td>
                                <td id="celStatus"></td>
                            </tr>
                            <tr>
                                <td>Descripción principal:</td>
                                <td id="celDescPcp"></td>
                            </tr>
                            <tr>
                                <td>Descripción general:</td>
                                <td id="celDescGrl"></td>
                            </tr>
                            <tr>
                                <td>Fotos de referencia:</td>
                                <td id="celImages"></td>
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