let formNewCliente = document.getElementById('formNewCliente');

function modalNewCliente() {
	document.getElementById("idCliente").value = "";
    document.querySelector(".modal-header").classList.replace("headerUpdate-mc", "headerRegister-mc");
    document.querySelector(".modal-title").innerHTML = "Nuevo Cliente";
    document.getElementById("btnSubmitCliente").classList.replace("bg-success", "btn-primary");
    document.querySelector(".btnText").innerHTML = "Guardar";
	document.getElementById('formNewCliente').reset();
	$('#modalFormCliente').modal('show');
	validFocus();
}

window.addEventListener('load', function () {
	showPassword();
});

document.addEventListener('DOMContentLoaded', function () {
	formNewCliente.onsubmit = function (e) {
		e.preventDefault();

		let strIdentificacion = document.getElementById("txtIdentificacion").value;
        let strNombre = document.getElementById("txtNombre").value;
        let strApellido = document.getElementById("txtApellido").value;
        let intTelefono = document.getElementById("txtTelefono").value;
        let strEmail = document.getElementById("txtEmail").value;
        let strPassword = document.getElementById("txtPassword").value;

        if (strIdentificacion == '' || strNombre == '' || strApellido == '' || intTelefono == '' || strEmail == '' || strPassword == '')  {
        	
        }
	}
})