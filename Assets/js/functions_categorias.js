var tableCategorias;
var rowTable = "" ;
function modalNewCategoria() {
    document.getElementById("idCategoria").value = "";
    document.querySelector(".modal-header").classList.replace("headerUpdate-mc", "headerRegister-mc");
    document.querySelector(".modal-title").innerHTML = "Nueva Categoria";
    document.getElementById("btnSubmitCategoria").classList.replace("bg-success", "btn-primary");
    document.querySelector(".btnText").innerHTML = "Agregar";
    $("#modalFormCategoria").modal("show");
    $("#listCategorias").select2();
    formCategoria.reset();
    document.getElementById('foto_alert').innerHTML = "";
    document.querySelector('.errorCategoria').textContent = "";
    document.querySelector('.photo').style.display = 'block';
    document.getElementById('listCategorias').value = "";
    selectCategorias();
    removePhoto();
}

document.addEventListener('DOMContentLoaded', function () {
    let listCategorias = document.getElementById('listCategorias');
    let contPhoto = document.querySelector('.photo');
    listCategorias.onchange = function (e) {
        if (listCategorias.value == "" ) {
            contPhoto.style.display = 'block';
            document.querySelector('.errorCategoria').textContent = "";
            document.getElementById('foto_alert').innerHTML = "";
        }else{
            contPhoto.style.display = 'none';
            document.querySelector('.errorCategoria').textContent = 'Las categorias principales solo pueden tener una imagen, no las subcategorias.';
            removePhoto();
        }
    }

    if (document.getElementById('foto')){
        var foto = document.getElementById('foto');
        foto.onchange = function (e) {
            var uploadFoto = document.getElementById('foto').value;
            var fileImg = document.getElementById('foto').files;
            var nav = window.URL || window.webkitURL;
            var alertFoto =  document.getElementById('foto_alert');
            if (uploadFoto != ""){
                var typeFoto = fileImg[0].type;
                var nameFoto = fileImg[0].name;
                if (typeFoto != 'image/jpeg' && typeFoto != "image/png" && typeFoto != "image/jpg") {
                    alertFoto.innerHTML = '<p class="errorArchivo">El archivo selecionado no es válido. Intentelo de nuevo.</p>';
                    if(document.getElementById('img')){
                        document.getElementById('img').remove();
                    }
                    document.querySelector('.delPhoto').classList.add("notBlock");
                    foto.value = "";
                    return false;
                }else{
                    alertFoto.innerHTML='';
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
            document.getElementById('foto_remove').value = 1;
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
            "url": base_url + "Categorias/tableCategorias",
            "dataSrc":"",
        },
        "columns":[
            {"data":"idcategoria"},
            {"data":"nombre"},
            {"data":"categoria_father_id"},
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

    var formCategoria = document.getElementById('formCategoria');
    formCategoria.onsubmit = function (e) {
        e.preventDefault();
        var intIdCategoria = document.getElementById('idCategoria').value;
        var strTitulo = document.getElementById('txtTitulo').value;
        var intCategoria = document.getElementById('listCategorias').value;
        var intStatus = document.getElementById('listStatus').value;
        if (strTitulo == "" || intStatus == "") {
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
                    if(objData.status){
                        if(rowTable == ""){
                            tableCategorias.ajax.reload(function () {
                            });
                        }else{
                            let htmlStatus = intStatus == 1 ? '<div class="text-center"><span class="bg-success p-1 rounded"><i class="fas fa-user"></i> Activo</span></div>' : '<div class="text-center"><span class="bg-danger p-1 rounded"><i class="fas fa-user-slash"></i> Inactivo</span></div>';
                            
                            rowTable.cells[1].textContent = strTitulo;
                            rowTable.cells[2].textContent = intCategoria;
                            rowTable.cells[3].innerHTML = htmlStatus;
                        }
                        $("#modalFormCategoria").modal("hide");
                        formCategoria.reset();
                        Swal.fire("Categorias", objData.msg, "success");
                        removePhoto();  
                        selectCategorias();            
                    }else{
                        Swal.fire("Error", objData.msg, "error");
                    }
                }
                loading.style.display = "none";
                return false;
            }
        }
    }
}, false);

function removePhoto(){
    document.getElementById('foto').value ="";
    document.querySelector('.delPhoto').classList.add("notBlock");
    if (document.getElementById('img')){
        document.getElementById('img').remove();
    }
}

window.addEventListener('load', function () {
    selectCategorias();
})

function selectCategorias(){
    let ajaxUrl = base_url + 'Categorias/getCategorias';
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open('GET', ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            document.getElementById("listCategorias").innerHTML = request.responseText;
            $("#listCategorias").select2();
        }
    }
}

function viewCategoria(idCategoria) {
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let urlCategoria = base_url + 'Categorias/viewCategoria/' + idCategoria;
    request.open("GET", urlCategoria, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                let statusCategoria = objData.data.status == 1 ? '<span class="bg-success p-1 rounded"><i class="fas fa-user"></i> Activo</span>' : '<span class="bg-danger p-1 rounded"><i class="fas fa-user-slash"></i> Inactivo</span>';
                document.getElementById('celNombre').innerHTML = objData.data.nombre;
                document.getElementById('celImagen').innerHTML = '<img id="img" src="'+ objData.data.url_imgcategoria +'" alt="">';
                document.getElementById('celFecharegistro').innerHTML = objData.data.datecreate;
                document.getElementById('celCatPadre').innerHTML = objData.data.fathercatname;
                document.getElementById('celEstado').innerHTML = statusCategoria;
                $('#modalViewCategoria').modal('show');
            }else{
                Swal.fire("Error", objData.msg, "error");
            }
        }
    }
}

function editCategoria(element, idCategoria) {
    rowTable = element.parentNode.parentNode.parentNode;
    document.querySelector(".modal-header").classList.replace("headerRegister-mc", "headerUpdate-mc");
    document.querySelector(".modal-title").innerHTML = "Actualizar Categoria";
    document.getElementById("btnSubmitCategoria").classList.replace("btn-primary", "bg-success");
    document.querySelector(".btnText").innerHTML = "Actualizar";
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxetCategoria = base_url + 'Categorias/viewCategoria/' + idCategoria;
    request.open("GET", ajaxetCategoria, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.getElementById("idCategoria").value = objData.data.idcategoria;
                document.getElementById('foto_actual').value = objData.data.imgcategoria;
                document.getElementById('foto_remove').value = 0;
                document.getElementById("txtTitulo").value = objData.data.nombre;  
                
                if (objData.data.categoria_father_id == null) {
                    document.getElementById("listCategorias").value = '';
                    $("#listCategorias").select2();
                    document.querySelector('.prevPhoto div').innerHTML = '<img id="img" src="'+ objData.data.url_imgcategoria +'" alt="">';  
                    document.querySelector('.photo').style.display = 'block'
                    document.querySelector('.errorCategoria').textContent = "";
                    objData.data.imgcategoria != 'imgCategoria.png' && objData.data.imgcategoria != "" ? document.querySelector('.delPhoto').classList.remove("notBlock") : document.querySelector('.delPhoto').classList.add("notBlock");

                    document.getElementById('foto_alert').innerHTML = "";
                }else{
                    document.getElementById("listCategorias").value = objData.data.categoria_father_id;
                    $("#listCategorias").select2("val", objData.data.categoria_father_id);
                }
                
                document.getElementById("listStatus").value = objData.data.status;
                
                $("#modalFormCategoria").modal("show");

            }
        }  

    }
} 