let formUpdateUser = document.getElementById('formUpdateUser');

formUpdateUser.addEventListener('submit', function (e){
    e.preventDefault();
    var identificacion = document.getElementById("identificacion").value;
    var nombre = document.getElementById("nombre").value;
    var apellido = document.getElementById("apellido").value;
    var telefono = document.getElementById("telefono").value;
    var email = document.getElementById("email").value;

    if (identificacion == "" || nombre == "" || apellido == "" || telefono == "" || email == "") {
        Swal.fire("Atención", "Asegúrese de llenar todos los campos.", "error");
        return false;
    }else{
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + 'Perfil/updateMyUser';
        var formData = new FormData(formUpdateUser);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
    }

    // let idUser = document.getElementById('idUser').value;

    
}); 