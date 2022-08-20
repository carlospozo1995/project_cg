// OPEN MODAL USERS
function modalNewUser() {
    document.getElementById("idUsuario").value = "";
    document.querySelector(".modal-header").classList.replace("headerUpdate-mc", "headerRegister-mc");
    document.querySelector(".modal-title").innerHTML = "Nuevo Usuario";
    document.getElementById("btnSubmitUser").classList.replace("bg-success", "btn-primary");
    document.querySelector(".btnText").innerHTML = "Guardar";
    $("#listRolid").select2();
    formNewUser.reset();
    $("#modalFormUser").modal("show");
    validFocus();
    rowTable = "";
}

//LOAD DATA TABLE USERS
let tableUsers;
let rowTable = "";
document.addEventListener('DOMContentLoaded', function () {
    tableUsers = $("#tableUsuarios").DataTable({
        "aProcessing": true,
        "aServerSide":true,
        "language":{
            "url":"//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        },
        "ajax":{
            "url": base_url + "Usuarios/getUsuarios",
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
        "iDisplayLength":10,
        "order":[[0,"asc"]],
    });

    let formNewUser = document.getElementById("formNewUser");

    formNewUser.onsubmit = function (e) {
        e.preventDefault();

        let strIdentificacion = document.getElementById("txtIdentificacion").value;
        let strNombre = document.getElementById("txtNombre").value;
        let strApellido = document.getElementById("txtApellido").value;
        let intTelefono = document.getElementById("txtTelefono").value;
        let strEmail = document.getElementById("txtEmail").value;
        let intTipoUsuario = document.getElementById("listRolid").value;
        let intStatus = document.getElementById("listStatus").value;
        let strPassword = document.getElementById("txtPassword").value;

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
            loading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + 'Usuarios/setUsuario';
            let formData = new FormData(formNewUser);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange =function () {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        if (rowTable == "") {
                            tableUsers.ajax.reload(function () {
                            });
                        }else{
                            let htmlStatus = intStatus == 1 ? '<div class="text-center"><span class="bg-success p-1 rounded"><i class="fas fa-user"></i> Activo</span></div>' : '<div class="text-center"><span class="bg-danger p-1 rounded"><i class="fas fa-user-slash"></i> Inactivo</span></div>';

                            rowTable.cells[1].textContent = strNombre;
                            rowTable.cells[2].textContent = strApellido;
                            rowTable.cells[3].textContent = strEmail;
                            rowTable.cells[4].textContent = intTelefono;
                            rowTable.cells[5].textContent = document.querySelector('#listRolid').selectedOptions[0].text;
                            rowTable.cells[6].innerHTML = htmlStatus;
                            
                        }
                        $("#modalFormUser").modal("hide");
                        formNewUser.reset();
                        Swal.fire("Usuarios", objData.msg, "success");
                    }else{
                        Swal.fire("Error", objData.msg, "error");
                    }
                }
                loading.style.display = "none";
                return false;
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
    let ajaxUrl = base_url + 'Roles/getSelectRoles';
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open('GET', ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            document.getElementById("listRolid").innerHTML = request.responseText;
            $("#listRolid").select2();
        }
    }
}

// MOSTRAR Y OCULTAR CONTRASEÑA
function showPassword() {
    let inputPassword = document.getElementById('txtPassword');
    let iconEye = document.querySelector('.show-password');

    iconEye.addEventListener('click', function (e) {
        let eye = e.target;
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
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let urlUser = base_url + 'Usuarios/viewUsuario/' + idUsuario;
    request.open("GET", urlUser, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);

            if (objData.status) {
                let statusUser = objData.data.status == 1 ? '<span class="bg-success p-1 rounded"><i class="fas fa-user"></i> Activo</span>' : '<span class="bg-danger p-1 rounded"><i class="fas fa-user-slash"></i> Inactivo</span>';
                
                document.getElementById("celIdentificacion").innerHTML = objData.data.identificacion;
                document.getElementById("celNombre").innerHTML = objData.data.nombres;
                document.getElementById("celApellido").innerHTML = objData.data.apellidos;
                document.getElementById("celTelefono").innerHTML = objData.data.telefono;
                document.getElementById("celEmailUser").innerHTML = objData.data.email_user;
                document.getElementById("celTipoUsuario").innerHTML = objData.data.nombrerol;
                document.getElementById("celEstado").innerHTML = statusUser;
                document.getElementById("celFecharegistro").innerHTML = objData.data.fechaRegistro;
                $('#modalViewUser').modal('show');
            }else{
                Swal.fire("Error", objData.msg, "error");
            }  
        }
    }
}

// EDITAR USUARIO
function editUser(element, idUsuario) {
    rowTable = element.parentNode.parentNode.parentNode;
    document.querySelector(".modal-header").classList.replace("headerRegister-mc", "headerUpdate-mc");
    document.querySelector(".modal-title").innerHTML = "Actualizar Usuario";
    document.getElementById("btnSubmitUser").classList.replace("btn-primary", "bg-success");
    document.querySelector(".btnText").innerHTML = "Actualizar";
    validFocus();

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxetUser = base_url + 'Usuarios/viewUsuario/' + idUsuario;
    request.open("GET", ajaxetUser, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);

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
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + 'Usuarios/delUser/' + idUsuario;
            request.open("POST", ajaxUrl, true);
            request.send();

            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);

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

