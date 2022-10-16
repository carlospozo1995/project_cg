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
    
        if (strIdentificacion == '' || strNombre == '' || strApellido == '' || intTelefono == '' || strEmail == '') {
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
            let ajaxUrl = base_url + 'Clientes/setCliente';
            let formData = new FormData(formNewCliente);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange =function () {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                    	let htmlStatus = '<div class="text-center"><span class="bg-success p-1 rounded"><i class="fas fa-user"></i> Activo</span></div>';

                    	if (rowTable == "") {
                    		let btnView = "";
                            let btnUpdate = "";
                            let btnDelete = ""; 
                    		
                    		 if (objData.permisosMod.ver == 1) {btnView = '<button type="button" class="btn btn-secondary btn-sm" onclick="viewCliente('+objData.idData+')" tilte="Ver"><i class="fas fa-eye"></i></button>'};

                            if (objData.permisosMod.actualizar == 1 && objData.userId == 1){
                                btnUpdate = ' <button type="button" class="btn btn-primary btn-sm" onclick="editCliente(this,'+objData.idData+')" tilte="Editar"><i class="fas fa-pencil-alt"></i></button>';
                            }

                            if (objData.permisosMod.eliminar == 1 && objData.userId == 1){
                                btnDelete = ' <button type="button" class="btn btn-danger btn-sm" onclick="deleteCliente(this,'+objData.idData+')" tilte="Eliminar"><i class="fas fa-trash"></i></button>';
                            }

                            $("#tableClientes").DataTable().row.add([
                                objData.idData,
                                strNombre,
                                strApellido,
                                strEmail,
                                intTelefono,
                                htmlStatus,
                                '<div class="text-center"> '+btnView+btnUpdate+btnDelete+'</div>'
                            ]).draw(false);
                    	}else{
                    		let n_row = $(rowTable).find("td:eq(0)").html();
                            let buttons_html = $(rowTable).find("td:eq(6)").html();
                            $("#tableClientes").DataTable().row(rowTable).data([n_row, strNombre, strApellido ,strEmail, intTelefono, htmlStatus, buttons_html]).draw(false);
                    	}

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



function viewCliente(idCliente) {
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let urlCliente = base_url + 'Usuarios/viewUsuario/' + idCliente;
    request.open("GET", urlCliente, true);
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
                $('#modalViewCliente').modal('show');
            }else{
                Swal.fire("Error", objData.msg, "error");
            }  
        }
    }
}

function editCliente(element, idCliente) {
    rowTable = $(element).closest("tr")[0];
    let ischild = $(rowTable).hasClass("child");
    if(ischild){
        rowTable = $(rowTable).prev()[0];
    }
    document.querySelector(".modal-header").classList.replace("headerRegister-mc", "headerUpdate-mc");
    document.querySelector(".modal-title").innerHTML = "Actualizar Usuario";
    document.getElementById("btnSubmitCliente").classList.replace("btn-primary", "bg-success");
    document.querySelector(".btnText").innerHTML = "Actualizar";
    validFocus();

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxetCliente = base_url + 'Usuarios/viewUsuario/' + idCliente;
    request.open("GET", ajaxetCliente, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);

            if (objData.status) {
                document.getElementById("idCliente").value = objData.data.idusuario;
                document.getElementById("txtIdentificacion").value = objData.data.identificacion;
                document.getElementById("txtNombre").value = objData.data.nombres;
                document.getElementById("txtApellido").value = objData.data.apellidos;
                document.getElementById("txtTelefono").value = objData.data.telefono;
                document.getElementById("txtEmail").value = objData.data.email_user;
                $('#modalFormCliente').modal('show');
            }
        }
    }
}

function deleteCliente(element, idCliente) {
    Swal.fire({
        title: 'Eliminar Cliente',
        text: "Realmente quiere eliminar el cliente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + 'Usuarios/delUser/' + idCliente;
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
                                    $("#tableClientes").DataTable().row(prevtr[0]).remove().draw(false);
                                }
                            }
                            else{
                                $("#tableClientes").DataTable().row(row_closest[0]).remove().draw(false);
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