let tableUsers;
let rowTable = "";

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
    rolesUsuario();
    validFocus();
    rowTable = "";
}

//LOAD DATA TABLE USERS
document.addEventListener('DOMContentLoaded', function () {
    tableUsers = $("#tableUsuarios").DataTable({
        "aProcessing": true,
        "aServerSide":true,
        "language":{
            "url":"//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        },
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
                        let htmlStatus = intStatus == 1 ? '<div class="text-center"><span class="bg-success p-1 rounded"><i class="fas fa-user"></i> Activo</span></div>' : '<div class="text-center"><span class="bg-danger p-1 rounded"><i class="fas fa-user-slash"></i> Inactivo</span></div>';

                        if (rowTable == "") {
                            let btnView = "";
                            let btnUpdate = "";
                            let btnDelete = ""; 

                            if (objData.permisos.ver == 1) {btnView = '<button type="button" class="btn btn-secondary btn-sm" onclick="viewUser('+objData.idData+')" tilte="Ver"><i class="fas fa-eye"></i></button>'};

                            if (objData.permisos.actualizar == 1 && objData.idData != objData.userData.idusuario){
                                btnUpdate = ' <button type="button" class="btn btn-primary btn-sm" onclick="editUser(this,'+objData.idData+')" tilte="Editar"><i class="fas fa-pencil-alt"></i></button>';
                            }

                            if (objData.permisos.eliminar == 1 objData.idData != objData.userData.idusuario){
                                btnDelete = ' <button type="button" class="btn btn-danger btn-sm" onclick="deleteUser(this,'+objData.idData+')" tilte="Eliminar"><i class="fas fa-trash"></i></button>';
                            }

                            $("#tableUsuarios").DataTable().row.add([
                                objData.idData,
                                strNombre,
                                strApellido,
                                strEmail,
                                intTelefono,
                                objData.userData.nombrerol,
                                htmlStatus,
                                '<div class="text-center"> '+btnView+btnUpdate+btnDelete+'</div>'
                            ]).draw(false);
                            
                        }else{
                            let n_row = $(rowTable).find("td:eq(0)").html();
                            let rol = document.querySelector('#listRolid').selectedOptions[0].text;
                            let buttons_html = $(rowTable).find("td:eq(7)").html();
                            $("#tableUsuarios").DataTable().row(rowTable).data([n_row, strNombre, strApellido ,strEmail, intTelefono ,rol, htmlStatus, buttons_html]).draw(false);
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
    rowTable = $(element).closest("tr")[0];
    let ischild = $(rowTable).hasClass("child");
    if(ischild){
        rowTable = $(rowTable).prev()[0];
    }
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
function deleteUser(element, idUsuario) {
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
                        let row_closest = $(element).closest("tr");
                        if(row_closest.length){
                            let ischild = $(row_closest).hasClass("child");
                            if(ischild){
                                let prevtr = row_closest.prev();
                                if(prevtr.length){
                                    $("#tableUsuarios").DataTable().row(prevtr[0]).remove().draw(false);
                                }
                            }
                            else{
                                $("#tableUsuarios").DataTable().row(row_closest[0]).remove().draw(false);
                            }
                        }
                        Swal.fire(
                            'Eliminado!',
                            objData.msg,
                            'success'
                        );
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

