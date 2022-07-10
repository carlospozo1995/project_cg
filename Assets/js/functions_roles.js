// OPEN MODAL NEW ROL
$("#btnNewRol").click(function () {
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
                        
                    });
                }else{
                    Swal.fire("Error", objData.msg, "error");
                }
            }
        }
    }
    

}


