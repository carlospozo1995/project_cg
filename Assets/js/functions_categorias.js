var rowTable;
var sonsCtg;

function modalNewCategoria() {
    $('#modalFormCategoria').modal('show');
    formCategoria.reset();
    var idCategoria = document.getElementById('idCategoria').value = "";
    document.querySelector(".modal-header").classList.replace("headerUpdate-mc", "headerRegister-mc");
    document.querySelector(".modal-title").innerHTML = "Nueva Categoria";
    document.getElementById("btnSubmitCategoria").classList.replace("bg-success", "btn-primary");
    document.querySelector(".btnText").innerHTML = "Agregar";
    var valCtgList = document.getElementById("listCategorias").value = 0;
    selectAllCategorias(idCategoria, valCtgList);   
    
    document.querySelectorAll('.contImgUpload').forEach(function (item) {
        item.querySelector('.alertImgUpload').innerHTML = "";
        if (item.querySelector('.errorArchivo')) {item.querySelector('.errorArchivo').textContent = ""}
        if (item.querySelector('.contImage')) {item.querySelector('.contImage').style.display = "block"}
        item.querySelector('.imagen_remove').value = 0;
        item.querySelector('.imagen_actual').value = "";
        removeImagen(item);
    });

    rowTable = "";
}

document.addEventListener('DOMContentLoaded', function () {
    let listCategorias = document.getElementById('listCategorias');

    listCategorias.onchange = function (e) {
        if (listCategorias.value == 0 ) {
            document.querySelectorAll('.contImgUpload').forEach(function (item) {
                if (item.querySelector('.contImage')) {item.querySelector('.contImage').style.display = "block"}
                if(item.querySelector('.errorArchivo')){item.querySelector('.errorArchivo').textContent = ""}
                item.querySelector('.alertImgUpload').innerHTML = "";
            })
            document.querySelector('.rqdIcon').innerHTML = "*";
        }else{
            document.querySelectorAll('.contImgUpload').forEach(function (item) {
                if (item.querySelector('.contImage')) {item.querySelector('.contImage').style.display = "none"}
                removeImagen(item);
            })
            document.querySelector('.rqdIcon').innerHTML = "";
            document.querySelector('.errorCategoria').textContent = 'Las categorias superiores solo pueden tener una imagen.';
            document.querySelector('.errorIcono').textContent = 'Las categorias superiores solo pueden tener un icono.';
        }
    };


    /*UPLOAD DIFFERENT IMAGES CATEGORIA*/

    if (document.getElementById('formCategoria')) {

        document.querySelectorAll('.contImgUpload').forEach(function (item) {

            if (item.querySelector('.imagen')) {
                var imagen = item.querySelector('.imagen');
                imagen.onchange =  function (e) {
                    var uploadImagen = item.querySelector('.imagen').value;
                    var fileImagen = item.querySelector('.imagen').files;
                    var nav = window.URL || window.webkitURL;
                    var alertImagen = item.querySelector('.alertImgUpload');

                    if (uploadImagen != "") {
                        var typeImagen = fileImagen[0].type;
                        var nameImagen = fileImagen[0].name;

                        if (typeImagen != 'image/jpeg' && typeImagen != "image/png" && typeImagen != "image/jpg") {
                            alertImagen.innerHTML = '<p class="errorArchivo">El archivo selecionado no es válido. Intentelo de nuevo.</p>';
                            
                            if (item.querySelector('.imgUpload')) {
                                item.querySelector('.imgUpload').remove();
                            }

                            item.querySelector('.delImgUpload').classList.add("notBlock");
                            imagen.value = "";
                            return false;
                        }else{
                            alertImagen.innerHTML = "";

                            if (item.querySelector('.imgUpload')) {
                                item.querySelector('.imgUpload').remove();
                            }

                            item.querySelector('.delImgUpload').classList.remove("notBlock");
                            var objeto_url = nav.createObjectURL(this.files[0]);
                            item.querySelector('.prevImgUpload div').style.backgroundColor = "#fff";
                            item.querySelector('.prevImgUpload div').innerHTML = '<img class="imgUpload" src="'+objeto_url+'">';

                        }
                    }else{
                        alert("No ha seleccionado una imagen.")
                        if (item.querySelector('.imgUpload')) {
                            item.querySelector('.imgUpload').remove();
                        }
                    }
                }
            } 

            if (item.querySelector('.delImgUpload')) {
                var delImagen = item.querySelector('.delImgUpload');
                delImagen.onclick = function () {
                    item.querySelector('.imagen_remove').value = 1;
                    removeImagen(item);
                }
            }   
        })

    }


    tableCategorias = $("#tableCategorias").DataTable({
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
        "order":[[0,"asc"]],
        "iDisplayLength":15,
    });

    formCategoria.addEventListener('submit', function (e) {
        e.preventDefault();
        var intIdCategoria = document.getElementById('idCategoria').value;
        var strTitulo = document.getElementById('txtTitulo').value;

        var valCtgList = document.getElementById('listCategorias').value;

        let icon = document.getElementById('icono').value;
        let iconActual = document.getElementById('icono_actual').value;

        var ctgTextVal = "";
        document.getElementById('listCategorias').value == 0 ? ctgTextVal = "" : ctgTextVal = $("#listCategorias").find("option:selected").text();
        ctgTextVal = ctgTextVal.replaceAll("-","");

        var intStatus = document.getElementById('listStatus').value;

        if(strTitulo == "" || intStatus == "" || valCtgList == ""){
            Swal.fire("Atención", "Asegúrese de llenar los campos requeridos.", "error");
            return false;
        }else{

            // if (valCtgList == 0) {
            //     if (intIdCategoria == "" && iconActual == "") {
            //         if (icon == "") {
            //             Swal.fire("Atención", "Asegúrese de llenar los campos requeridos.", "error");
            //             return false;
            //         }
            //     }
            //     // else{
            //     //     if (icon == "" && iconActual == "") {
            //     //         Swal.fire("Atención", "Asegúrese de llenar los campos requeridos.", "error");
            //     //         return false;}
            //     // }
            // }

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
                        let htmlStatus = intStatus == 1 ? '<div class="text-center"><span class="bg-success p-1 rounded"><i class="fas fa-user"></i> Activo</span></div>' : '<div class="text-center"><span class="bg-danger p-1 rounded"><i class="fas fa-user-slash"></i> Inactivo</span></div>';

                        if(rowTable == ""){
                            let btnView = "";
                            let btnUpdate = "";
                            let btnDelete = "";  

                            if(objData.permisos.ver == 1){btnView = '<button type="button" class=" btnViewCategory btn btn-secondary btn-sm" onclick="viewCategoria('+objData.idCtg+')" tilte="Ver"><i class="fas fa-eye"></i></button>'};

                            if(objData.permisos.actualizar == 1){btnUpdate = '<button type="button" class="btnEditCategoria btn btn-primary btn-sm" onclick="editCategoria(this,'+objData.idCtg+')" tilte="Editar"><i class="fas fa-pencil-alt"></i></button>'};

                            if(objData.permisos.eliminar == 1 && objData.idUser == 1){btnDelete = '<button type="button" class="btnDelete btn btn-danger btn-sm" onclick="deleteCategoria(this,'+objData.idCtg+')" tilte="Eliminar"><i class="fas fa-trash"></i></button>'};

                            $("#tableCategorias").DataTable().row.add([
                                objData.idCtg,
                                strTitulo,
                                ctgTextVal,
                                htmlStatus,
                                '<div class="text-center"> '+btnView+" "+btnUpdate+" "+btnDelete+'</div>'
                            ]).draw(false);
                        }else{
                            let n_row = $(rowTable).find("td:eq(0)").html();
                            let buttons_html = $(rowTable).find("td:eq(4)").html();
                            $("#tableCategorias").DataTable().row(rowTable).data([n_row,strTitulo, ctgTextVal, htmlStatus, buttons_html]).draw(false);

                            for (let i = 0; i < sonsCtg.length; i++) {
                                $("#tableCategorias").DataTable().cell(`#${sonsCtg[i].idcategoria}`).data(htmlStatus);
                            }
                        }
                        $("#modalFormCategoria").modal("hide");
                        formCategoria.reset();
                        Swal.fire("Categorias", objData.msg, "success");
                        // removePhoto();
                    }else{
                        Swal.fire("Error", objData.msg, "error");
                    }
                }
                loading.style.display = "none";
                return false;
            }
        }
    });

}, false);

function viewCategoria(idCategoria) {
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let urlCategoria = base_url + 'Categorias/getCategoria/' + idCategoria;
    request.open("GET", urlCategoria, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                let statusCategoria = objData.data.status == 1 ? '<span class="bg-success p-1 rounded"><i class="fas fa-user"></i> Activo</span>' : '<span class="bg-danger p-1 rounded"><i class="fas fa-user-slash"></i> Inactivo</span>';
                document.getElementById('celNombre').innerHTML = objData.data.nombre;
                document.getElementById('celImagen').innerHTML = '<img id="img" src="'+ objData.data.url_imgcategoria +'" alt="">';
                document.getElementById('celIcono').innerHTML = '<img src="'+ objData.data.url_icono +'" alt="">';
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
    rowTable = $(element).closest("tr")[0];
    let ischild = $(rowTable).hasClass("child");
    if(ischild){
        rowTable = $(rowTable).prev()[0];
    }

    document.querySelector(".modal-header").classList.replace("headerRegister-mc", "headerUpdate-mc");
    document.querySelector(".modal-title").innerHTML = "Actualizar Categoria";
    document.getElementById("btnSubmitCategoria").classList.replace("btn-primary", "bg-success");
    document.querySelector(".btnText").innerHTML = "Actualizar";
    document.getElementById("idCategoria").value = idCategoria;

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxetCategoria = base_url + 'Categorias/getCategoria/' + idCategoria;
    request.open("GET", ajaxetCategoria, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                $("#modalFormCategoria").modal("show");
                sonsCtg = objData.children;
                let dataCtg = objData.data;

                document.getElementById('photo_actual').value = dataCtg.imgcategoria;
                document.getElementById('icono_actual').value = dataCtg.icono;

                document.querySelectorAll('.contImgUpload').forEach(function (item) {
                    item.querySelector('.imagen_remove').value = 0;
                    item.querySelector('.imagen').value = "";
                })

                document.getElementById("txtTitulo").value = dataCtg.nombre;
                document.getElementById("listStatus").value = dataCtg.status;

                if (dataCtg.categoria_father_id == null) {
                    document.getElementById("listCategorias").value = 0;
                    selectAllCategorias(idCategoria, 0);
                    document.querySelector('.prevPhoto div').innerHTML = '<img class="imgUpload" src="'+ dataCtg.url_imgcategoria +'" alt="">'; 
                    document.querySelector('.prevIcono div').innerHTML = '<img class="imgUpload" src="'+ dataCtg.url_icono +'" alt="">';  
                    
                    document.querySelectorAll('.contImgUpload').forEach(function (item) {
                        if (item.querySelector('.contImage')) {item.querySelector('.contImage').style.display = "block"}
                        if(item.querySelector('.errorArchivo')){item.querySelector('.errorArchivo').textContent = ""}
                        item.querySelector('.alertImgUpload').innerHTML = "";
                    })

                    if (dataCtg.imgcategoria != 'imgCategoria.png' && dataCtg.imgcategoria != "") {
                        document.querySelector('.delPhoto').classList.remove("notBlock");
                        document.querySelector('.prevPhoto div').style.backgroundColor = '#fff'
                    }else{
                        document.querySelector('.delPhoto').classList.add("notBlock");
                    }
                    
                    document.querySelector('.prevIcono div').style.backgroundColor = '#fff'

                    if(dataCtg.icono != ""){document.querySelector('.delIcon').classList.remove("notBlock")}

                } else{
                    document.getElementById("listCategorias").value = dataCtg.categoria_father_id;
                    selectAllCategorias(idCategoria, dataCtg.categoria_father_id)

                    document.querySelectorAll('.contImgUpload').forEach(function (item) {
                        if (item.querySelector('.contImage')) {item.querySelector('.contImage').style.display = "none"}
                        removeImagen(item);
                    });

                    document.querySelector('.errorCategoria').textContent = 'Las categorias superiores solo pueden tener una imagen.';
                    document.querySelector('.errorIcono').textContent = 'Las categorias superiores solo pueden tener un icono.';
                }
            }
        }
    }     
}

function deleteCategoria(element, idCategoria) {
    Swal.fire({
        title: 'Eliminar categoria',
        text: "Realmente quiere eliminar la categoria!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + 'Categorias/delCategoria/' + idCategoria;
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
                                    $("#tableCategorias").DataTable().row(prevtr[0]).remove().draw(false);
                                }
                            }
                            else{
                                $("#tableCategorias").DataTable().row(row_closest[0]).remove().draw(false);
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


// ---------------------------------

function selectAllCategorias(idCategoria, valCtgList) {
    let ajaxUrl = "";
    idCategoria == "" ? ajaxUrl = 'Categorias/getCategorias': ajaxUrl = 'Categorias/getCategorias/' + idCategoria;

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open('GET', ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200){
            document.getElementById("listCategorias").innerHTML = request.responseText;
            document.getElementById("listCategorias").value = valCtgList;
            $("#listCategorias").select2();
        }
    }
}


// FUNCTION REMOVE IMG UPLOAD ICON DELETE
function removeImagen(item){
    item.querySelector('.imagen').value = "";
    item.querySelector('.delImgUpload').classList.add('notBlock');
    
    if (item.querySelector('.imgUpload')) {
        item.querySelector('.imgUpload').remove();
    }
}


