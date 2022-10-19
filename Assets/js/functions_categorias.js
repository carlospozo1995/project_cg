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
    document.getElementById('foto_alert').innerHTML = "";
    document.querySelector('.errorCategoria').textContent = "";
    document.querySelector('.photo').style.display = 'block';

    document.getElementById('icono_alert').innerHTML = "";
    document.querySelector('.errorIcono').textContent = "";
    document.querySelector('.icon').style.display = 'block';
    removePhoto();
    removeIcono();
    rowTable = "";
}

document.addEventListener('DOMContentLoaded', function () {
    let listCategorias = document.getElementById('listCategorias');
    let contPhoto = document.querySelector('.photo');
    let contIcon = document.querySelector('.icon');
    listCategorias.onchange = function (e) {
        if (listCategorias.value == 0 ) {
            contPhoto.style.display = 'block';
            contIcon.style.display = 'block';
            document.querySelector('.errorCategoria').textContent = "";
            document.querySelector('.errorIcono').textContent = "";
            document.getElementById('foto_alert').innerHTML = "";
            document.getElementById('icono_alert').innerHTML = "";
        }else{
            contPhoto.style.display = 'none';
            contIcon.style.display = 'none';
            document.querySelector('.errorCategoria').textContent = 'Las categorias superiores solo pueden tener una imagen.';
            document.querySelector('.errorIcono').textContent = 'Las categorias superiores solo pueden tener un icono.';
            removePhoto();
            removeIcono();
        }
    };


    /*UPLOAD IMG CATEGORIA*/
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
    // -------------------------


    // UOLOAD ICON CATEGORIA
    if (document.getElementById('icono')) {
        var icono = document.getElementById('icono');
        icono.onchange = function (e) {
            var uploadIcono = document.getElementById('icono').value;
            var fileIcono = document.getElementById('icono').files;
            var navIcon = window.URL || window.webkitURL;
            var alertIcono =  document.getElementById('icono_alert');
            if (uploadIcono != "") {
                var typeIcono = fileIcono[0].type;
                var nameIcono = fileIcono[0].name;
                if (typeIcono != 'image/jpeg' && typeIcono != "image/png" && typeIcono != "image/jpg") {
                    alertIcono.innerHTML = '<p class="errorArchivo">El archivo selecionado no es válido. Intentelo de nuevo.</p>';
                    if(document.getElementById('iconImg')){
                        document.getElementById('iconImg').remove();
                    }
                    document.querySelector('.delIcono').classList.add("notBlock");
                    icono.value = "";
                    return false;
                }else{
                    alertIcono.innerHTML = "";
                    if(document.getElementById('iconImg')){
                        document.getElementById('iconImg').remove();
                    }
                    document.querySelector('.delIcono').classList.remove("notBlock");
                    var url_icono = navIcon.createObjectURL(this.files[0]);
                    document.querySelector('.prevIcono div').innerHTML = "<img style='width:100%' id='iconImg' src="+url_icono+">";
                }
            }else{
                alert('Seleccione una foto');
                if(document.getElementById('iconImg')){
                    document.getElementById('iconImg').remove();
                }
            }
        }
    }

    if(document.querySelector(".delIcono")){
        var delIcono = document.querySelector(".delIcono");
        delIcono.onclick = function(e) {
            document.getElementById('icono_remove').value = 1;
            removeIcono();  
        }
    }
    // -------------------------

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
        var iconCtg = document.getElementById('icono').value;
        var iconoActual = document.getElementById('icono_actual').value;

        var valCtgList = document.getElementById('listCategorias').value;
        var ctgTextVal = "";
        document.getElementById('listCategorias').value == 0 ? ctgTextVal = "" : ctgTextVal = $("#listCategorias").find("option:selected").text();
        ctgTextVal = ctgTextVal.replaceAll("-","");

        var intStatus = document.getElementById('listStatus').value;

        if(strTitulo == "" || intStatus == "" || valCtgList == ""){
            Swal.fire("Atención", "Asegúrese de llenar los campos requeridos.", "error");
            return false;
        }else{
            if (valCtgList == 0) {
                if (intIdCategoria == "") {
                    if (iconCtg == "") {
                        Swal.fire("Atención", "Asegúrese de llenar los campos requeridos.", "error");
                        return false;}
                }else{
                    if (iconCtg == "" && iconoActual == "") {
                        Swal.fire("Atención", "Asegúrese de llenar los campos requeridos.", "error");
                        return false;}
                }
            }

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
                        removePhoto();
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
                document.getElementById('celIcono').innerHTML = '<img id="iconImg" src="'+ objData.data.url_icon +'" alt="">';
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

                document.getElementById("idCategoria").value = objData.data.idcategoria;
                document.getElementById('foto_actual').value = objData.data.imgcategoria;
                document.getElementById('foto_remove').value = 0;

                document.getElementById('icono_actual').value = objData.data.icon_category_father;
                document.getElementById('icono_remove').value = 0;

                document.getElementById("txtTitulo").value = objData.data.nombre;
                document.getElementById("listStatus").value = objData.data.status;
                if (objData.data.categoria_father_id == null) {
                    document.getElementById("listCategorias").value = 0;
                    selectAllCategorias(idCategoria, 0);
                    document.querySelector('.prevPhoto div').innerHTML = '<img id="img" src="'+ objData.data.url_imgcategoria +'" alt="">';  
                    document.querySelector('.photo').style.display = 'block'
                    document.querySelector('.errorCategoria').textContent = "";
                    objData.data.imgcategoria != 'imgCategoria.png' && objData.data.imgcategoria != "" ? document.querySelector('.delPhoto').classList.remove("notBlock") : document.querySelector('.delPhoto').classList.add("notBlock");
                    document.getElementById('foto_alert').innerHTML = "";

                    document.querySelector('.prevIcono div').innerHTML = '<img style="width:100%" id="iconImg" src="'+ objData.data.url_icon +'">';
                    document.querySelector('.icon').style.display = 'block'
                    document.querySelector('.errorIcono').textContent = "";
                    objData.data.icon_category_father != "" ? document.querySelector('.delIcono').classList.remove("notBlock") : document.querySelector('.delIcono').classList.add("notBlock");
                    document.getElementById('icono_alert').innerHTML = "";
                } else{
                    document.getElementById("listCategorias").value = objData.data.categoria_father_id;
                    selectAllCategorias(idCategoria, objData.data.categoria_father_id)
                    document.querySelector('.photo').style.display = 'none';
                    document.querySelector('.icon').style.display = 'none';
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

function removePhoto(){
    document.getElementById('foto').value ="";
    document.querySelector('.delPhoto').classList.add("notBlock");
    if (document.getElementById('img')){
        document.getElementById('img').remove();
    }
}

function removeIcono(){
    document.getElementById('icono').value ="";
    document.querySelector('.delIcono').classList.add("notBlock");
    if (document.getElementById('iconImg')){
        document.getElementById('iconImg').remove();
    }
}