var tableCategorias;

document.addEventListener("DOMContentLoaded", function () {
    if(document.getElementById("foto")){
        var foto = document.getElementById("foto");
        foto.onchange = function(e) {
            var uploadFoto = document.getElementById("foto").value;
            var fileimg = document.getElementById("foto").files;
            var nav = window.URL || window.webkitURL;
            var contactAlert = document.getElementById('form_alert');
            if(uploadFoto !=''){
                var type = fileimg[0].type;
                var name = fileimg[0].name;
                if(type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png'){
                    contactAlert.innerHTML = '<p class="errorArchivo">El archivo selecionado no es válido. Intentelo de nuevo.</p>';
                    if(document.getElementById('img')){
                        document.getElementById('img').remove();
                    }
                    document.querySelector('.delPhoto').classList.add("notBlock");
                    foto.value="";
                    return false;
                }else{  
                        contactAlert.innerHTML='';
                        if(document.getElementById('img')){
                            document.getElementById('img').remove();
                        }
                        document.querySelector('.delPhoto').classList.remove("notBlock");
                        var objeto_url = nav.createObjectURL(this.files[0]);
                        document.querySelector('.prevPhoto div').innerHTML = "<img id='img' src="+objeto_url+">";
                    }
            }else{
                alert("No selecciono foto");
                if(document.getElementById('img')){
                    document.getElementById('img').remove();
                }
            }
        }
    }
    
    if(document.querySelector(".delPhoto")){
        var delPhoto = document.querySelector(".delPhoto");
        delPhoto.onclick = function(e) {
            removePhoto();
        }
    }

    tableCategorias = $("#tableCategorias").DataTable({
        "aProcessing": true,
        "aServerSide":true,
        "language":{
            "url":"//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        },
        "ajax":{
            "url": base_url + "Categorias/getCategorias",
            "dataSrc":"",
        },
        "columns":[
            {"data":"idcategoria"},
            {"data":"nombre"},
            {"data":"descripcion"},
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
        "order":[[0,"asc"]],
        "iDisplayLength":10,
    });

    var formCategoria = document.getElementById("formCategoria");

    formCategoria.onsubmit = function (e) {
        e.preventDefault(e);

        var intIdCategoria = document.getElementById("idCategoria").value;
        var strNombre = document.getElementById("txtNombre").value;
        var strDescripcion = document.getElementById("txtDescripcion").value;
        var intStatus = document.getElementById("listStatus").value;
        var fileFoto = document.getElementById('foto').value;

        if (strNombre == "" || strDescripcion == "" || intStatus == "") {
            Swal.fire("Atención", "Asegúrese de llenar todos los campos.", "error");
        }else{
            loading.style.display = "flex";
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + 'Categorias/setCategoria';
            var formData = new FormData(formCategoria);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    
                    if (objData.status) {
                        $('#modalFormCategoria').modal('hide');
                        formCategoria.reset();
                        Swal.fire("Categorias", objData.msg, "success");
                        if (document.getElementById('img')) removePhoto();  
                        tableCategorias.ajax.reload(function () {
                        });
                    }else{
                        Swal.fire("Error", objData.msg, "error");
                    }
                }
                loading.style.display = "none";
                return false;
            }
        }
    }

},false);

function modalNewCategoria() {
    document.getElementById("idCategoria").value = "";
    document.querySelector(".modal-header").classList.replace("headerUpdate-mc", "headerRegister-mc");
    document.querySelector(".modal-title").innerHTML = "Nueva Categoria";
    document.getElementById("btnSubmitCategoria").classList.replace("bg-success", "btn-primary");
    document.querySelector(".btnText").innerHTML = "Guardar";

    $("#modalFormCategoria").modal("show");
    formCategoria.reset();
    if (document.getElementById('img')) removePhoto();
}


function removePhoto(){
    document.getElementById('foto').value ="";
    document.querySelector('.delPhoto').classList.add("notBlock");
    document.getElementById('img').remove();
}

//  VER DATOS DE CATEGORIA

function viewCategoria(idCategoria) {
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let urlCategoria = base_url + 'Categorias/viewCategoria/' + idCategoria;
    request.open("GET", urlCategoria, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            console.log(objData)

            if (objData.status) {
                let statusCategoria = objData.data.status == 1 ? '<span class="bg-success p-1 rounded"><i class="fas fa-user"></i> Activo</span>' : '<span class="bg-danger p-1 rounded"><i class="fas fa-user-slash"></i> Inactivo</span>';

                document.getElementById('celNombre').innerHTML = objData.data.nombre;
                document.getElementById('celDescripcion').innerHTML = objData.data.descripcion;
                document.getElementById('celImagen').innerHTML = '<img src="'+ base_url+'Assets/images/uploads/'+objData.data.portada+'" alt="">';
                document.getElementById('celFecharegistro').innerHTML = objData.data.fechaRegistro;
                document.getElementById('celEstado').innerHTML = statusCategoria;
                $('#modalViewCategoria').modal('show');
            }else{
                Swal.fire("Error", objData.msg, "error");
            }
        }
        
    }    
    
}
