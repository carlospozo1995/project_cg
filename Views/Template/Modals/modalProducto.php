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
                                        <label>Descripción principal</label>
                                        <textarea rows="2" style="width: 100%;" id="txtDescripcion" autocomplete="off" name="txtDescripcion" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Descripción general</label>
                                        <textarea style="width: 100%;" id="txtDescGrl" autocomplete="off" name="txtDescGrl" required></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Marca</label>
                                        <input type="text" class="form-control" id="txtMarca" autocomplete="off" name="txtMarca" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="txtCodigo">Código</label>
                                        <input type="text" class="form-control valid validNumber" id="txtCodigo" autocomplete="off" name="txtCodigo" required>
                                        
                                        <!-- BARCODE (CODIGO DE BARRA) -->
                                        <!-- <div id="divBarCode" class="notBlock text-center">
                                            <div id="printCode">
                                                <svg id="barcode"></svg>
                                            </div>
                                            <button class="btn bg-success btn-sm" type="button" onclick="fntPrintBarcode('#printCode')"><i class="fas fa-print"></i> <strong>Imprimir</strong></button>
                                        </div> -->
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="txtCodigo">Precio</label>
                                                <input type="text" class="form-control" id="txtPrecio" autocomplete="off" name="txtPrecio" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="txtStock">Stock</label>
                                                <input type="text" class="form-control valid validNumber" id="txtStock" autocomplete="off" name="txtStock" required>
                                            </div>
                                        </div>
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
                            <p>as,ndm</p>
                        </div>
                    </form>
                </div>
            </div>

           
        </div>
    </div>
</div>