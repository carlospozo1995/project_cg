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

                                    <!-- =========== UPLOAD ICON =========== -->
                                    <div class="form-group">
                                        <div class="contImgUpload">
                                            <input type="hidden" class="imagen_actual" name="icon_actual" id="icono_actual" value="">
                                            <input type="hidden" class="imagen_remove" name="icon_remove" value="0">

                                            <label>Icono (64x64)<span class="required rqdIcon"> *</span></label>

                                            <p class="errorArchivo errorIcono"></p>
                                            <div class="contImage">
                                                <div class="prevImgUpload prevIcono">
                                                    <span class="delImgUpload notBlock delIcon">X</span>
                                                    <label for="icono"></label>
                                                    <div></div>
                                                </div>
                                                <div class="upimg">
                                                    <input type="file" name="icono" id="icono" class="imagen">
                                                </div>
                                                <div class="alertImgUpload"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ============================== -->

                                    <!-- =========== UPLOAD SLIDER DESKTOP =========== -->
                                    <div class="form-group">
                                        <div class="contImgUpload">
                                            <input type="hidden" class="imagen_actual" name="sliderDst_actual" id="sliderDst_actual" value="">
                                            <input type="hidden" class="imagen_remove" name="sliderDst_remove" value="0">

                                            <label>Slider desktop (1920x850)</label>

                                            <div class="contSlider">
                                                <div class="prevImgUpload prevSliderDst">
                                                    <span class="delImgUpload notBlock delSliderDst">X</span>
                                                    <label for="sliderDst"></label>
                                                    <div></div>
                                                </div>
                                                <div class="upimg">
                                                    <input type="file" name="sliderDst" id="sliderDst" class="imagen">
                                                </div>
                                                <div class="alertImgUpload"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ============================== -->

                                    <div class="form-group">
                                        <label>Slider Descripción 1</label>
                                        <textarea class="form-control" style="max-height: 80px; min-height: 80px;" type="text" name="sliderDscOne" id="sliderDscOne"></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <!-- =========== UPLOAD PHOTO =========== -->
                                    <div class="form-group">
                                        <div class="contImgUpload">
                                            <input type="hidden" class="imagen_actual" name="photo_actual"  id="photo_actual" value="">
                                            <input type="hidden" class="imagen_remove" name="photo_remove" value="0">

                                            <label>Foto (150 x 150)</label>

                                            <p class="errorArchivo errorCategoria"></p>
                                            <div class="contImage">
                                                <div class="prevImgUpload prevPhoto">
                                                    <span class="delImgUpload notBlock delPhoto">X</span>
                                                    <label for="imagen"></label>
                                                    <div></div>
                                                </div>
                                                <div class="upimg">
                                                    <input type="file" name="imagen" id="imagen" class="imagen">
                                                </div>
                                                <div class="alertImgUpload"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ============================== -->

                                    <!-- =========== UPLOAD SLIDER MOBILE =========== -->
                                    <div class="form-group">
                                        <div class="contImgUpload">
                                            <input type="hidden" class="imagen_actual" name="sliderMbl_actual" id="sliderMbl_actual" value="">
                                            <input type="hidden" class="imagen_remove" name="sliderMbl_remove" value="0">

                                            <label>Slider mobile (800x500)</label>

                                            <div class="contSlider">
                                                <div class="prevImgUpload prevSliderMbl">
                                                    <span class="delImgUpload notBlock delSliderMbl">X</span>
                                                    <label for="sliderMbl"></label>
                                                    <div></div>
                                                </div>
                                                <div class="upimg">
                                                    <input type="file" name="sliderMbl" id="sliderMbl" class="imagen">
                                                </div>
                                                <div class="alertImgUpload"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ============================== -->

                                    <div class="form-group">
                                        <label>Slider Descripción 2</label>
                                        <textarea class="form-control" style="max-height: 80px; min-height: 80px;" name="sliderDscTwo" id="sliderDscTwo"></textarea>
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
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>Nombre:</td>
                                <td id="celNombre" class="celData"></td>
                            </tr>
                            <tr>
                                <td>Imagen:</td>
                                <td id="celImagen" class="celData imgData"></td>
                            </tr>
                            <tr>
                                <td>Icono:</td>
                                <td id="celIcono" class="celData imgData"></td>
                            </tr>
                            <tr>
                                <td>Slider desktop:</td>
                                <td id="celSlrDesktop" class="celData imgData"></td>
                            </tr>
                            <tr>
                                <td>Slider mobile:</td>
                                <td id="celSlrMobile" class="celData imgData"></td>
                            </tr>
                            <tr>
                                <td>Descripción slider 1:</td>
                                <td id="celSlrDscOne" class="celData"></td>
                            </tr>
                            <tr>
                                <td>Descrición slider 2:</td>
                                <td id="celSlrDscTwo" class="celData"></td>
                            </tr>
                            <tr>
                                <td>Fecha de registro:</td>
                                <td id="celFecharegistro" class="celData"></td>
                            </tr>
                            <tr>
                                <td>Categoria padre</td>
                                <td id="celCatPadre" class="celData"></td>
                            </tr>
                            <tr>
                                <td>Estado:</td>
                                <td id="celEstado" class="celData"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
        </div>
    </div>
</div>
