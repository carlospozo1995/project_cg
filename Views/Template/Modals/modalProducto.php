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
                <div class="card card-primary">
                    <form id="formProducto" name="formProducto">
                        <input type="hidden" id="idProducto" name="idProducto" value="">
                        <!-- <input type="hidden" id="foto_actual" name="foto_actual" value="">
                        <input type="hidden" id="foto_remove" name="foto_remove" value="0"> -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" id="txtNombre" autocomplete="off" name="txtNombre" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <textarea cols="30" rows="10" style="width: 100%;" placeholder="Descripción del producto" id="txtDescripcion" autocomplete="off" name="txtDescripcion" required></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="txtCodigo">Código</label>
                                        <input type="text" class="form-control valid validNumber" placeholder="Código de barra" id="txtCodigo" autocomplete="off" name="txtCodigo" required>
                                        <br>
                                        <div id="divBarCode" class="notBlock text-center">
                                            <div id="printCode">
                                                <svg id="barcode"></svg>
                                            </div>
                                            <button class="btn bg-success btn-sm" type="button" onclick="fntPrintBarcode('#printCode')"><i class="fas fa-print"></i> <strong>Imprimir</strong></button>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="txtCodigo">Precio</label>
                                        <input type="text" class="form-control" id="txtPrecio" autocomplete="off" name="txtPrecio" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="listCategorias">Categoria</label>
                                        <select class="form-control" style="width:100%" id="listCategorias" name="listCategorias" required>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="listStatus">Status Producto</label>
                                        <select class="form-control" id="listStatus" name="listStatus" required>
                                            <option value="1">Activo</option>
                                            <option value="2">Inactivo</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- <div class="col-sm-6">
                                    <p class="errorArchivo errorCategoria"></p>
                                    <div class="photo">
                                        <label for="foto">Foto (570x380)</label>
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
                                </div> -->
                            </div>
                        </div>

                        <div class="card-footer">
                            <button id="btnSubmitProducto" type="submit" class="btn btn-primary btnText">Agregar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>

           
        </div>
    </div>
</div>