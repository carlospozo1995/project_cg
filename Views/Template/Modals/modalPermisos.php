<div class="modal fade modalPermisos" id="modal-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Permisos - Roles de Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="" id="formPermisos" name="formPermisos">
                    <input type="hidden" id="rolid" name="rolid" value="<?= $data['rolid'] ?>">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Módulo</th>
                                    <th>Ver</th>
                                    <th>Crear</th>
                                    <th>Actualizar</th>
                                    <th>Eliminar</th>
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
                                    <td>
                                        <?= $no; ?>
                                        <input type="hidden" name="modulos[<?= $i; ?>][idmodulo]" value="<?= $idModulo ?>">
                                    </td>
                                    <td><?= $modulos[$i]['titulo']; ?></td>
                                    <td>
                                        <input type="checkbox" data-bootstrap-switch data-off-color="secondary" data-on-color="success">
                                    </td>
                                    <td>
                                        <input type="checkbox" data-bootstrap-switch data-off-color="secondary" data-on-color="success">
                                    </td>
                                    <td>
                                        <input type="checkbox" data-bootstrap-switch data-off-color="secondary" data-on-color="success">
                                    </td>
                                    <td>
                                        <input type="checkbox" data-bootstrap-switch data-off-color="secondary" data-on-color="success">
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