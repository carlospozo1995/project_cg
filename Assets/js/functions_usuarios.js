// OPEN MODAL USERS
function modalNewUser() {
    document.getElementById("idUsuario").value = "";
    document.querySelector(".modal-header").classList.replace("headerUpdate-mc", "headerRegister-mc");
    document.querySelector(".modal-title").innerHTML = "Nuevo Usuario";
    document.getElementById("btnSubmitUser").classList.replace("bg-success", "btn-primary");
    document.querySelector(".btnText").innerHTML = "Guardar";
    $("#listRolid").select2("val", "1");
    formNewUser.reset();
    $("#modalFormUser").modal("show");
    validFocus();
}

//LOAD DATA TABLE USERS
var tableUsers;
document.addEventListener('DOMContentLoaded', function () {
    tableUsers = $("#tableUsuarios").DataTable({
        "aProcessing": true,
        "aServerSide":true,
        "language":{
            "url":"//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        },
        "ajax":{
            "url": base_url + "/Usuarios/getUsuarios",
            "dataSrc":"",
        },
        "columns":[
            {"data":"idusuario"},
            {"data":"nombres"},
            {"data":"apellidos"},
            {"data":"email_user"},
            {"data":"telefono"},
            {"data":"nombrerol"},
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
        "iDisplayLength":3,
        "order":[[0,"asc"]],
    });

    var formNewUser = document.getElementById("formNewUser");

    formNewUser.onsubmit = function (e) {
        e.preventDefault();

        var strIdentificacion = document.getElementById("txtIdentificacion").value;
        var strNombre = document.getElementById("txtNombre").value;
        var strApellido = document.getElementById("txtApellido").value;
        var intTelefono = document.getElementById("txtTelefono").value;
        var strEmail = document.getElementById("txtEmail").value;
        var intTipoUsuario = document.getElementById("listRolid").value;
        var strPassword = document.getElementById("txtPassword").value;

        if (strIdentificacion == "" || strNombre == "" || strApellido == "" || intTelefono == "" || strEmail == "" || intTipoUsuario == "") {
            Swal.fire("Atención", "Asegúrese de llenar todos los campos.", "error");
            return false;
        }else{
            let elementsValid = document.getElementsByClassName("valid");
            for (let i = 0; i < elementsValid.length; i++) {
                if (elementsValid[i].classList.contains("is-invalid")) {
                    Swal.fire("Atención", "Por favor asegúrese de no tener campos en rojo.", "error");
                    return false;
                }
            }

            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + 'Usuarios/setUsuario';
            var formData = new FormData(formNewUser);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange =function () {
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        $("#modalFormUser").modal("hide");
                        formNewUser.reset();
                        Swal.fire("Usuarios", objData.msg, "success");
                        tableUsers.ajax.reload(function () {
                        });
                    }else{
                        Swal.fire("Error", objData.msg, "error");
                    }
                }
            }
        }
    }
});

window.addEventListener('load', function () {
    rolesUsuario();
    showPassword();
})

// MOSTAR ROLES EN EL SELECT DEL MODAL NEW USERS
function rolesUsuario() {
    var ajaxUrl = base_url + 'Roles/getSelectRoles';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open('GET', ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            document.getElementById("listRolid").innerHTML = request.responseText;
            // document.getElementById("listRolid").value = 1;
            $("#listRolid").select2();
        }
    }
}

// MOSTRAR Y OCULTAR CONTRASEÑA
function showPassword() {
    var inputPassword = document.getElementById('txtPassword');
    var iconEye = document.querySelector('.show-password');

    iconEye.addEventListener('click', function (e) {
        var eye = e.target;
        if (eye.classList.contains('show-password')) {
            eye.classList.remove('show-password');
            eye.classList.remove('fa-eye-slash');
            eye.classList.add('fa-eye');            
            inputPassword.type = 'text';
        }else{
            eye.classList.remove('fa-eye');
            eye.classList.add('fa-eye-slash');
            eye.classList.add('show-password');
            inputPassword.type = 'password';
        }
    })
}

// VER DATOS DEL USUARIO
function viewUser(idUsuario) {
    var idUser = idUsuario;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var urlUser = base_url + 'Usuarios/viewUsuario/' + idUser;
    request.open("GET", urlUser, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);

            if (objData.status) {
                var statuUser = objData.data.status == 1 ? '<span class="bg-success p-1 rounded"><i class="fas fa-user"></i> Activo</span>' : '<span class="bg-danger p-1 rounded"><i class="fas fa-user-slash"></i> Inactivo</span>';
                
                document.getElementById("celIdentificacion").innerHTML = objData.data.identificacion;
                document.getElementById("celNombre").innerHTML = objData.data.nombres;
                document.getElementById("celApellido").innerHTML = objData.data.apellidos;
                document.getElementById("celTelefono").innerHTML = objData.data.telefono;
                document.getElementById("celEmailUser").innerHTML = objData.data.email_user;
                document.getElementById("celTipoUsuario").innerHTML = objData.data.nombrerol;
                document.getElementById("celEstado").innerHTML = statuUser;
                document.getElementById("celFecharegistro").innerHTML = objData.data.fechaRegistro;
                $('#modalViewUser').modal('show');
            }else{
                Swal.fire("Error", objData.msg, "error");
            }  
        }
    }
}

// EDITAR USUARIO
function editUser(idUsuario) {
    document.querySelector(".modal-header").classList.replace("headerRegister-mc", "headerUpdate-mc");
    document.querySelector(".modal-title").innerHTML = "Actualizar Usuario";
    document.getElementById("btnSubmitUser").classList.replace("btn-primary", "bg-success");
    document.querySelector(".btnText").innerHTML = "Actualizar";
    validFocus();

    var idUser = idUsuario;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxetUser = base_url + 'Usuarios/viewUsuario/' + idUser;
    request.open("GET", ajaxetUser, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);

            if (objData.status) {
                document.getElementById("idUsuario").value = objData.data.idusuario;
                document.getElementById("txtIdentificacion").value = objData.data.identificacion;
                document.getElementById("txtNombre").value = objData.data.nombres;
                document.getElementById("txtApellido").value = objData.data.apellidos;
                document.getElementById("txtTelefono").value = objData.data.telefono;
                document.getElementById("txtEmail").value = objData.data.email_user;
                document.getElementById("listRolid").value = objData.data.idrol;
                document.getElementById("listStatus").value = objData.data.status;
                $("#listRolid").select2();
                $('#modalFormUser').modal('show');
            }
        }
        
    }
}

// ELIMINAR USUARIO
function deleteUser(idUsuario) {
    var idUser = idUsuario;
    Swal.fire({
        title: 'Eliminar Usuario',
        text: "Realmente quiere eliminar el usuario!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + 'Usuarios/delUser/' + idUser;
            request.open("POST", ajaxUrl, true);
            request.send();

            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);

                    if(objData.status){
                        Swal.fire(
                            'Eliminado!',
                            objData.msg,
                            'success'
                        );
                        tableUsers.ajax.reload(function () {
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

// VALIDAR EL FOCUS DE LOS INPUTS
function validFocus() {
    let valid = document.querySelectorAll(".valid");
    valid.forEach(function (valid) {
        valid.classList.remove("is-invalid");
        valid.classList.remove("is-valid");
    });
}