window.addEventListener('load', function () {
    rolesUsuario();
},false);


document.getElementById("btnNewUser").addEventListener("click", function () {
    $("#modalFormUser").modal("show");
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
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + 'Usuarios/setUsuario';
        var formData = new FormData(formNewUser);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        // request.onreadystatechange =function () {
        //     if (request.readyState == 4 && request.status == 200) {
        //         var objData = JSON.parse(request.responseText);
        //         if (objData.status) {
        //             $("#modalFormUser").modal("hide");
        //             formNewUser.reset();
        //             Swal.fire("Usuarios", objData.msg, "success");
        //             tableUsuarios.ajax.reload(function () {
                    
        //             });
        //         }else{
        //             Swal.fire("Error", objData.msg, "error");
        //         }
        //     }else{
        //         console.log("error");
        //     }
        // }
    }
}

function rolesUsuario() {
    var ajaxUrl = base_url + 'Roles/getSelectRoles';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open('GET', ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            document.getElementById("listRolid").innerHTML = request.responseText;
            document.getElementById("listRolid").value = 1;
            $("#listRolid").select2();
        }
    }
}
