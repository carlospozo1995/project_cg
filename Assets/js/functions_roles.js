// OPEN MODAL NEW ROL
$("#btnNewRol").click(function () {
    document.querySelector(".modal-header").classList.replace("headerUpdate-mc", "headerRegister-mc");
    document.querySelector(".modal-title").innerHTML = "Nuevo Rol";
    document.getElementById("btnSubmitRol").classList.replace("bg-success", "btn-primary");
    document.querySelector(".btnText").innerHTML = "Guardar";
    formNewRol.reset();

    $('#modalFormRol').modal('show');
})

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
            "url": base_url + "/Roles/getRoles",
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
        initComplete: function(){
            btnEditRol();
        },
    });
})


// INSERT NEW ROL

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
                        btnEditRol();
                    });
                }else{
                    Swal.fire("Error", objData.msg, "error");
                }
            }
        }
    }
}

function btnEditRol() {
    var btnEditRol = document.querySelectorAll(".btnEditRol");
    btnEditRol.forEach(function (btnEdit) {
        btnEdit.addEventListener('click', function () {

            document.querySelector(".modal-header").classList.replace("headerRegister-mc", "headerUpdate-mc");
            document.querySelector(".modal-title").innerHTML = "Actualizar Rol";
            document.getElementById("btnSubmitRol").classList.replace("btn-primary", "bg-success");
            document.querySelector(".btnText").innerHTML = "Actualizar";

            var idRol = this.getAttribute('rl');
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


            
        })
    })
}


