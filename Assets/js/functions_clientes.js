let formNewCliente = document.getElementById('formNewCliente');
let tableClientes;
let rowTable = "";


function modalNewCliente() {
	document.getElementById("idCliente").value = "";
    document.querySelector(".modal-header").classList.replace("headerUpdate-mc", "headerRegister-mc");
    document.querySelector(".modal-title").innerHTML = "Nuevo Cliente";
    document.getElementById("btnSubmitCliente").classList.replace("bg-success", "btn-primary");
    document.querySelector(".btnText").innerHTML = "Guardar";
	document.getElementById('formNewCliente').reset();
	$('#modalFormCliente').modal('show');
	validFocus();
	rowTable = "";
}

window.addEventListener('load', function () {
	showPassword();
});

document.addEventListener('DOMContentLoaded', function () {
    tableClientes = $("#tableClientes").DataTable({
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

	tableClientes = $('#tableClientes').DataTable();
	formNewCliente.onsubmit = function (e) {
		e.preventDefault();

		let strIdentificacion = document.getElementById("txtIdentificacion").value;
        let strNombre = document.getElementById("txtNombre").value;
        let strApellido = document.getElementById("txtApellido").value;
        let intTelefono = document.getElementById("txtTelefono").value;
        let strEmail = document.getElementById("txtEmail").value;
        let strPassword = document.getElementById("txtPassword").value;

        if (strIdentificacion == '' || strNombre == '' || strApellido == '' || intTelefono == '' || strEmail == '' || strPassword == '')  {
        	Swal.fire("Atención", "Asegúrese de llenar todos los campos.", "error");
            return false;
        }
        else{
        	let elementsValid = document.getElementsByClassName("valid");
            for (let i = 0; i < elementsValid.length; i++) {
                if (elementsValid[i].classList.contains("is-invalid")) {
                    Swal.fire("Atención", "Por favor asegúrese de no tener campos en rojo.", "error");
                    return false;
                }
            }

            loading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + 'Clientes/setCliente';
            let formData = new FormData(formNewCliente);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange =function () {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                    	// let htmlStatus = intStatus == 1 ? '<div class="text-center"><span class="bg-success p-1 rounded"><i class="fas fa-user"></i> Activo</span></div>' : '<div class="text-center"><span class="bg-danger p-1 rounded"><i class="fas fa-user-slash"></i> Inactivo</span></div>';

                    	// if (rowTable == "") {
                    	// 	let btnView = "";
                     //        let btnUpdate = "";
                     //        let btnDelete = ""; 
                    	// }

                    	$("#modalFormCliente").modal("hide");
                        formNewCliente.reset();
                        Swal.fire("Cliente", objData.msg, "success");
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