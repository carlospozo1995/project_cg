document.getElementById("btnNewUser").addEventListener("click", function () {
    $("#modalFormUser").modal("show");
});

var formNewUser = document.getElementById("formNewUser");

formNewUser.onsubmit = function (e) {
    e.preventDefault();

    var idUser = document.getElementById("idUser").value;
    var strCedula = document.getElementById("txtCedula").value;
    var strNombre = document.getElementById("txtNombres").value;
    var strApellido = document.getElementById("txtApellidos").value;
    var intTelefono = document.getElementById("txtTelefono").value;
    var strEmail = document.getElementById("txtEmail").value;
    var intRol = document.getElementById("listRolid").value;
    var intStatus = document.getElementById("listStatus").value;
    var strPassword = document.getElementById("txtPassword").value;

    if (strCedula == "" || strNombre == "" || strApellido == "" || intTelefono == "" || strEmail == "" || intRol == "" || intStatus == "" || strPassword == "") {
        Swal.fire("Atención", "Asegúrese de llenar todos los campos.", "error");
    }else{
        console.log("campos llenos")
    }
}

function rolesUsuario() {
    var ajaxUrl = base_url + 'Roles/getSelectRoles';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open('GET', ajaxUrl, true);
    request.send();
}

// $('.select2').select2()