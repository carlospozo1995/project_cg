<div class="modal fade modalPermisos" id="modal-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Permisos - Roles de Usuario - <?= $data['rolTitulo'][0]['nombrerol'] ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="" id="formPermisos" name="formPermisos">
                    <input type="hidden" id="rolid" name="rolid" value="<?= $data['rolid'] ?>">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-primary">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Módulo</th>
                                    <th class="text-center">Ver</th>
                                    <th class="text-center">Crear</th>
                                    <th class="text-center">Actualizar</th>
                                    <th class="text-center">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                
                                    $no = 1;
                                    $modulos = $data['modulo'];
                                    for ($i=0; $i < count($modulos); $i++) { 
                                        $permisos = $modulos[$i]['permisos'];
                                        $verCheck = $permisos['ver'] == 1 ? " checked " : "";
                                        $crearCheck = $permisos['crear'] == 1 ? " checked " : "";
                                        $actualizarCheck = $permisos['actualizar'] == 1 ? " checked " : "";
                                        $eliminarCheck = $permisos['eliminar'] == 1 ? " checked " : "";

                                        $idModulo = $modulos[$i]['idmodulo'];
                                
                                ?>
                                <tr>
                                    <td class="text-center">
                                        <?= $no; ?>
                                        <input type="hidden" name="modulos[<?= $i; ?>][idmodulo]" value="<?= $idModulo ?>">
                                    </td>
                                    <td class="text-center"><?= $modulos[$i]['titulo']; ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" data-bootstrap-switch data-off-color="secondary" name="modulos[<?= $i; ?>][ver]" <?= $verCheck ?> data-on-color="success">
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" data-bootstrap-switch data-off-color="secondary" name="modulos[<?= $i; ?>][crear]" <?= $crearCheck ?> data-on-color="success">
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" data-bootstrap-switch data-off-color="secondary" name="modulos[<?= $i; ?>][actualizar]" <?= $actualizarCheck ?> data-on-color="success">
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" data-bootstrap-switch data-off-color="secondary" name="modulos[<?= $i; ?>][eliminar]" <?= $eliminarCheck ?> data-on-color="success">
                                    </td>
                                </tr>
                                <?php
                                    $no++;
                                    // CIERRE DEL CICLO FOR
                                    }

                                ?>
                        </tbody>
                        </table>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-success" type="submit"><i class="fas fa-check-circle"></i> Guardar</button>
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-sign-out-alt"></i> Salir</button>
                    </div>
                </form>
            </div>

        </div>
    <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>