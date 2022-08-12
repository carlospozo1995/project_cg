// OPEN MODAL NEW ROL
function modalNewRol() {
    document.getElementById("idRol").value = "";
    document.querySelector(".modal-header").classList.replace("headerUpdate-mc", "headerRegister-mc");
    document.querySelector(".modal-title").innerHTML = "Nuevo Rol";
    document.getElementById("btnSubmitRol").classList.replace("bg-success", "btn-primary");
    document.querySelector(".btnText").innerHTML = "Guardar";
    formNewRol.reset();

    $('#modalFormRol').modal('show');
}

//LOAD DATA TABLE ROLES
var tableRoles;
document.addEventListener('DOMContentLoaded', function () {
    tableRoles = $("#tableRoles").DataTable({
        "aProcessing": true,
        "aServerSide":true,
        "language":{
            "url":"//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        },
        "ajax":{
            "url": base_url + "Roles/getRoles",
            "dataSrc":"",
        },
        "columns":[
            {"data":"idrol"},
            {"data":"nombrerol"},
            {"data":"descripcion"},
            {"data":"status"},
            {"data":"actions"},
        ],
        "responsive": true,
        "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "Todos"] ],
        "dom": 'lBfrtip',
        "buttons": [
            "copy", "csv", "excel", "pdf", "print", "colvis"
        ],
        "bDestroy":true,
        "order":[[0,"asc"]],
        "iDisplayLength":10,
    });

    var formNewRol = document.getElementById("formNewRol");

    formNewRol.onsubmit = function (e) {
        e.preventDefault(e);

        var intIdRol = document.getElementById("idRol").value;
        var strNombre = document.getElementById("txtNombre").value;
        var strDescripcion = document.getElementById("txtDescripcion").value;
        var intStatus = document.getElementById("listStatus").value;

        if (strNombre == "" || strDescripcion == "" || intStatus == "") {
            Swal.fire("Atención", "Asegúrese de llenar todos los campos.", "error");
        }else{
            loading.style.display = "flex";
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + 'Roles/setRol';
            var formData = new FormData(formNewRol);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    
                    if (objData.status) {
                        $('#modalFormRol').modal('hide');
                        formNewRol.reset();
                        Swal.fire("Roles de usuario", objData.msg, "success");
                        tableRoles.ajax.reload(function () {
                        });
                    }else{
                        Swal.fire("Error", objData.msg, "error");
                    }
                }
                loading.style.display = "none";
                return false;
            }
        }
    }
})

// PERMISOS ROL
function permisos(idrol) {
    
    var idRol = idrol;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxetUser = base_url + 'Permisos/getPermisosRol/' + idRol;
    request.open("GET", ajaxetUser, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            document.getElementById("contentModalPermisos").innerHTML = request.responseText;
            
            // SWITCH OFF/ON
            $("input[data-bootstrap-switch]").each(function(){
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });
            // -----------------------------

            $('.modalPermisos').modal('show');
            document.getElementById("formPermisos").addEventListener('submit', savePermisos, false);
        }    
    }
       
}

function savePermisos(e) {
    e.preventDefault();
    
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + 'Permisos/setPermisos';
    var formElement = document.getElementById("formPermisos");
    var formData  = new FormData(formElement);
    request.open("POST", ajaxUrl, true);
    request.send(formData);

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);
        
            if (objData.status) {
                Swal.fire(
                    'Permisos de usuario',
                    objData.msg,
                    'success'
                );
            }else{
                Swal.fire(
                    'Error',
                    objData.msg,
                    'error'
                );
            }
        }
    }
}

// EDITAR ROL
function editRol(idrol) {
    
    document.querySelector(".modal-header").classList.replace("headerRegister-mc", "headerUpdate-mc");
    document.querySelector(".modal-title").innerHTML = "Actualizar Rol";
    document.getElementById("btnSubmitRol").classList.replace("btn-primary", "bg-success");
    document.querySelector(".btnText").innerHTML = "Actualizar";

    var idRol = idrol;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxetUser = base_url + 'Roles/getRol/' + idRol;
    request.open("GET", ajaxetUser, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);

            if (objData.status) {
                document.getElementById("idRol").value = objData.data.idrol;
                document.getElementById("txtNombre").value = objData.data.nombrerol;
                document.getElementById("txtDescripcion").value = objData.data.descripcion;
                document.getElementById("listStatus").value = objData.data.status;

                $('#modalFormRol').modal('show');
            }else{
                Swal.fire("Error", objData.msg, "error");
            }
        }
    }
        
}

// ELIMINAR ROL

function deleteRol(idrol) {
    var idRol = idrol;
    Swal.fire({
        title: 'Eliminar Rol',
        text: "Realmente quiere eliminar el rol!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + 'Roles/delRol/';
            var strData = "idRol=" + idRol; 
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);

            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if(objData.status){
                        Swal.fire(
                            'Eliminado!',
                            objData.msg,
                            'success'
                        );
                        tableRoles.ajax.reload(function () {
                        });
                    }else{
                        Swal.fire(
                            'Atención!',
                            objData.msg,
                            'error'
                        );
                    }
                }
            }
        }
    });
}