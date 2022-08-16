<div class="modal fade" id="modalFormCategory">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nueva Categoria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="card card-primary">
                    <form id="formNewCategory" name="formNewCategory">
                        <input type="hidden" id="idCategory" name="idCategory" value="">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" id="txtNombre" name="txtNombre" required>
                                    </div>
                                
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <textarea class="form-control" rows="3" placeholder="Descripción de categoria" id="txtDescripcion" name="txtDescripcion" required></textarea>
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="listStatus">Status Categoria</label>
                                        <select class="form-control" id="listStatus" name="listStatus" required>
                                            <option value="1">Activo</option>
                                            <option value="2">Inactivo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                   <div class="photo">
                                        <label for="foto">Foto (570x380)</label>
                                        <div class="prevPhoto">
                                            <span class="delPhoto notBlock">X</span>
                                            <label for="foto"></label>
                                            <div>
                                                <img src="<?= media(); ?>images/imgCategory.png" id="img" alt="">
                                            </div>
                                        </div>
                                        <div class="upimg">
                                            <input type="file" name="foto" id="foto">
                                        </div>
                                        <div id="form_alert"></div>
                                   </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button id="btnSubmitCategory" type="submit" class="btn btn-primary btnText">Guardar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>

           
        </div>
    </div>
</div>