window.addEventListener('load', function () {
    rolesUsuario();
},false);


document.getElementById("btnNewUser").addEventListener("click", function () {
    $("#modalFormUser").modal("show");
});

var formNewUser = document.getElementById("formNewUser");

formNewUser.onsubmit = function (e) {
    e.preventDefault();

    var strCedula = document.getElementById("txtCedula").value;
    var strNombre = document.getElementById("txtNombres").value;
    var strApellido = document.getElementById("txtApellidos").value;
    var intTelefono = document.getElementById("txtTelefono").value;
    var strEmail = document.getElementById("txtEmail").value;
    var intTipoUsuario = document.getElementById("listRolid").value;
    var strPassword = document.getElementById("txtPassword").value;

    if (strCedula == "" || strNombre == "" || strApellido == "" || intTelefono == "" || strEmail == "" || intTipoUsuario == "" || strPassword == "") {
        Swal.fire("Atención", "Asegúrese de llenar todos los campos.", "error");
    }else{
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + 'Usuarios/setUsers';
        var formData = new FormData(formNewUser);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
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
