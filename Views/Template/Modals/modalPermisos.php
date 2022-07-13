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
                    
                </form>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>

        </div>
    <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>