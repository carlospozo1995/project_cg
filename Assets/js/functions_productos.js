
var tableProductos;
var rowTable;

function modalNewProducto(){
    document.querySelector(".modal-header").classList.replace("headerUpdate-mc", "headerRegister-mc");
    document.querySelector(".modal-title").innerHTML = "Nuevo Producto";
    document.getElementById("btnSubmitProducto").classList.replace("bg-success", "btn-primary");
    document.querySelector(".btnText").innerHTML = "Agregar";
    document.getElementById('idProducto').value = "";
    let valueCtgP = document.getElementById('dataPrimary').value;
    document.getElementById('listCategorias').value = valueCtgP
    $("#listCategorias").select2();
    $('#modalFormProducto').modal('show');
    formProducto.reset();
    rowTable = "";
    validFocus();
    document.querySelector(".card-footer").style.display = "none";
    document.querySelector("#containerImages").innerHTML = "";

    document.querySelectorAll('.contImgUpload').forEach(function (item) {
        item.querySelector('.alertImgUpload').innerHTML = "";
        item.querySelector('.imagen_remove').value = 0;
        item.querySelector('.imagen_actual').value = "";
        removeImagen(item);
    });
}

document.addEventListener('DOMContentLoaded', function () {

/*UPLOAD DIFFERENT IMAGES PRODUCTO*/
    if (document.getElementById('formProducto')) {
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
    // ------------------------------------------- //
    
    tableProductos = $("#tableProductos").DataTable({
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
        "iDisplayLength":10,
    });

    if (document.getElementById('formProducto')) {
        var formProducto = document.getElementById('formProducto');
        formProducto.addEventListener('submit', function (e) {
            e.preventDefault();
            var idProd = document.getElementById('idProducto').value;
            var nameProd  = document.getElementById('txtNombre').value;
            var descProd = document.getElementById('txtDescPcp').value;
            var marcaProd = document.getElementById('txtMarca').value;
            var codProd = document.getElementById('txtCodigo').value;
            var stock = document.getElementById("txtStock").value;
            var priceProd = document.getElementById('txtPrecio').value;
            var listCategoria = document.getElementById('listCategorias').value;
            var status = document.getElementById('listStatus').value;
            
            if (nameProd == "" || descProd == "" || marcaProd == "" || codProd == "" || stock == "" || priceProd == "" || listCategoria == "" || status == "") {
                Swal.fire("Atención", "Asegúrese de llenar todos los campos.", "error");
            }else{
                let elementsValid = document.getElementsByClassName("valid");
                for (let i = 0; i < elementsValid.length; i++) {
                    if (elementsValid[i].classList.contains("is-invalid")) {
                        Swal.fire("Atención", "Por favor asegúrese de no tener campos en rojo.", "error");
                        return false;
                    }
                }

                loading.style.display = "flex";
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP'); 
                var ajaxUrl = base_url + 'Productos/setProductos';
                var formData = new FormData(formProducto);
                request.open("POST", ajaxUrl, true);
                request.send(formData);
                request.onreadystatechange = function () {
                    if (request.readyState == 4 && request.status == 200) {
                        var objData = JSON.parse(request.responseText);
                        if(objData.status){
                            let htmlStatus = status == 1 ? '<div class="text-center"><span class="bg-success p-1 rounded"><i class="fas fa-user"></i> Activo</span></div>' : '<div class="text-center"><span class="bg-danger p-1 rounded"><i class="fas fa-user-slash"></i> Inactivo</span></div>';

                            let dataSliderDesktop = "";
                            let dataSliderMobile = "";

                            if (objData.sliderDesktop != "") {dataSliderDesktop = '<img style="width:80px; display:flex; margin:auto" src="'+objData.sliderDesktop+'">'}
                            if (objData.sliderMobile != "") {dataSliderMobile = '<img style="width:50px; display:flex; margin:auto" src="'+objData.sliderMobile+'">'}

                            if(rowTable == ""){
                                let btnView = "";
                                let btnUpdate = "";
                                let btnDelete = ""; 

                                if (objData.permisos.ver == 1) {
                                    btnView = '<button type="button" class="btn btn-secondary btn-sm" onclick="viewProducto('+objData.idproducto+')" tilte="Ver"><i class="fas fa-eye"></i></button>';
                                }
                                if (objData.permisos.actualizar == 1){
                                    btnUpdate = ' <button type="button" class="btn btn-primary btn-sm" onclick="editProducto(this,'+objData.idproducto+')" tilte="Editar"><i class="fas fa-pencil-alt"></i></button>';
                                }

                                if (objData.permisos.eliminar == 1 && objData.idUser == 1) {
                                    btnDelete = ' <button type="button" class="btn btn-danger btn-sm" onclick="deleteProducto(this,'+objData.idproducto+')" tilte="Eliminar"><i class="fas fa-trash"></i></button>';
                                }

                                $("#tableProductos").DataTable().row.add([
                                    objData.idproducto,
                                    codProd,
                                    nameProd,
                                    objData.price,
                                    stock,
                                    dataSliderDesktop,
                                    dataSliderMobile,
                                    htmlStatus,
                                    '<div class="text-center"> '+btnView+btnUpdate+btnDelete+'</div>'
                                ]).draw(false);
                            }else{
                                let n_row = $(rowTable).find("td:eq(0)").html();
                                let buttons_html = $(rowTable).find("td:eq(8)").html();

                                $("#tableProductos").DataTable().row(rowTable).data([n_row, codProd, nameProd, objData.priceUpdate ,stock, dataSliderDesktop, dataSliderMobile, htmlStatus, buttons_html]).draw(false);
                            }
                            $('#modalFormProducto').modal('hide');

                            document.getElementById('idProducto').value = objData.idproducto;
                            Swal.fire("Productos", objData.msg, "success");
                            validFocus();
                        }else{
                            Swal.fire("Error", objData.msg, "error");
                        }
                    }
                    loading.style.display = "none";
                    return false;
                }
            }
        });
    }

    if(document.querySelector('.btnAddImage')){
        let btnAddImage = document.querySelector('.btnAddImage');
        btnAddImage.addEventListener('click', function () {
            let key = Date.now();
            let newElement = document.createElement("div");
            newElement.id = 'div'+key;
            newElement.innerHTML = `
                <div class="prevImage"></div>
                <input type="file" name="foto" id="img${key}" class="inputUploadfile">
                <label for="img${key}" class="btnUploadfile"><i class="fas fa-upload"></i></label>
                <button class="btnDeleteImage" type="button" onclick="ftnDelItem('#div${key}')"><i class="fas fa-trash"></i></button>`;
            document.querySelector("#containerImages").appendChild(newElement);
            document.querySelector('#div'+key+' .btnUploadfile').click();
            fntInputFile();
        });
    }
    fntInputFile();
}, false);

// TEXT AREA TINYMCE
$(document).on('focusin', function(e) {
    if ($(e.target).closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root").length) {
        e.stopImmediatePropagation();
    }
});

tinymce.init({
    selector: '#txtDescGrl',
    setup: function (editor) {
         editor.on('change', function () {
            tinymce.triggerSave();
        });
        
    },
    width: "100%",
    height: 200,    
    statubar: true,
    plugins: [
        "advlist autolink lists charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking",
        "save table contextmenu directionality template paste textcolor"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | print preview fullpage | forecolor backcolor",
    branding: false,
});
// ----- -----------------------------------------
  
function fntInputFile() {
    let inputUploadfile = document.querySelectorAll(".inputUploadfile");
    inputUploadfile.forEach(function(itemUpload){
        itemUpload.addEventListener("change", function () {
            let idProducto = document.getElementById("idProducto").value;
            let parentId = this.parentNode.getAttribute("id");
            let idFile = this.getAttribute("id");
            let uploadFoto = document.getElementById(idFile).value;
            let fileImg = document.getElementById(idFile).files;
            let prevImg = document.querySelector("#"+parentId+" .prevImage");
            let nav = window.URL || window. webkitURL;

            if(uploadFoto != ""){
                let type = fileImg[0].type;
                let name = fileImg[0].name;
                if(type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png'){
                    prevImg.innerHTML = "Archivo no valido.";
                    uploadFoto.value = "";
                    return false;
                }else{
                    let objeto_url = nav.createObjectURL(this.files[0]);
                    prevImg.innerHTML = `<img class="loading" src="${base_url}Assets/images/loading.gif">`;

                    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                    let ajaxUrl = base_url + 'Productos/setImage';
                    let formData = new FormData;
                    formData.append('idProducto', idProducto);
                    formData.append('foto', this.files[0]);
                    request.open("POST",ajaxUrl,true);
                    request.send(formData);
                    request.onreadystatechange = function(){
                        if (request.readyState != 4) return;
                        if (request.status == 200) {
                            let objData = JSON.parse(request.responseText);
                            if(objData.status){
                                prevImg.innerHTML = `<img src="${objeto_url}">`;
                                document.querySelector("#"+parentId+" .btnDeleteImage").setAttribute("imgname", objData.imgname);
                                document.querySelector("#"+parentId+" .btnUploadfile").classList.add('notBlock');
                                document.querySelector("#"+parentId+" .btnDeleteImage").classList.remove('notBlock');
                                Swal.fire("Productos", objData.msg, "success");
                            }else{
                                Swal.fire("Error", objData.msg, "error");
                            }
                        }
                    }
                }
            }
        });
    });
}

function ftnDelItem(element) {
    let nameImg = document.querySelector(element+' .btnDeleteImage').getAttribute("imgname");
    let idProducto =  document.getElementById("idProducto").value;
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + 'Productos/delFile';

    let formData = new FormData();
    formData.append('idProducto', idProducto);
    formData.append('file', nameImg);
    request.open("POST", ajaxUrl, true);
    request.send(formData);

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                let itemRemove = document.querySelector(element); // select div container image
                itemRemove.parentNode.removeChild(itemRemove); //select parend div and remove div
                Swal.fire("", objData.msg, "success");
            }else{
                Swal.fire("", objData.msg, "error");
            }
        }
    }
}
          
function viewProducto(idProducto) {
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let urlProducto = base_url + 'Productos/getProducto/' + idProducto;
    request.open("GET", urlProducto, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if(objData.status){
                let htmlImages = "";
                let jsData = objData.data; 
                let status = jsData.status == 1 ? '<span class="bg-success p-1 rounded"><i class="fas fa-user"></i> Activo</span>' : '<span class="bg-danger p-1 rounded"><i class="fas fa-user-slash"></i> Inactivo</span>';
                document.getElementById('celCodigo').innerHTML = jsData.codproducto;
                document.getElementById('celNombre').innerHTML = jsData.nombre;
                document.getElementById('celMarca').innerHTML = jsData.marca;
                document.getElementById('celCtg').innerHTML = jsData.nameCtg;
                document.getElementById('celPrecio').innerHTML = jsData.precio;
                document.getElementById('celStock').innerHTML = jsData.stock;
                document.getElementById('celSlrDesktop').innerHTML = '<img src="'+ jsData.url_sliderDts +'" alt="">';
                document.getElementById('celSlrMobile').innerHTML = '<img src="'+ jsData.url_sliderMbl +'" alt="">';
                document.getElementById('celStatus').innerHTML = status;
                document.getElementById('celDescPcp').innerHTML = jsData.descprincipal;
                document.getElementById('celDescGrl').innerHTML = jsData.descgeneral;

                for (let i = 0; i < jsData.imagesProd.length; i++) {
                    htmlImages += `<img src="${jsData.imagesProd[i].url_image}">`;
                }
                document.getElementById('celImages').innerHTML = htmlImages;
                
                $('#modalViewProducto').modal('show');
            }else{
                Swal.fire("Error", objData.msg, "error");
            }
        }   
    }   
}

function editProducto(element, idProducto){
    rowTable = $(element).closest("tr")[0];
    let ischild = $(rowTable).hasClass("child");
    if(ischild){
        rowTable = $(rowTable).prev()[0];
    }
    document.querySelector(".modal-header").classList.replace("headerRegister-mc", "headerUpdate-mc");
    document.querySelector(".modal-title").innerHTML = "Actualizar Producto";
    document.getElementById("btnSubmitProducto").classList.replace("btn-primary", "bg-success");
    document.querySelector(".btnText").innerHTML = "Actualizar";
    document.querySelector(".card-footer").style.display = "block";
    var idProducto = document.getElementById('idProducto').value = idProducto;

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxetProducto = base_url + 'Productos/getProducto/' + idProducto;
    request.open("GET", ajaxetProducto, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                validFocus();
                let htmlImage = "";
                let dataProd  = objData.data;
                document.getElementById('txtNombre').value = dataProd.nombre;
                document.getElementById('txtDescPcp').value = dataProd.descprincipal;

                document.getElementById('sliderDst_actual').value = dataProd.sliderDesktop;
                document.getElementById('sliderMbl_actual').value = dataProd.sliderMobile;

                document.querySelectorAll('.contImgUpload').forEach(function (item) {
                    item.querySelector('.imagen_remove').value = 0;
                    item.querySelector('.imagen').value = "";
                    item.querySelector('.alertImgUpload').innerHTML = "";
                });

                if (dataProd.sliderDesktop != null && dataProd.sliderMobile != null){
                    document.querySelector('.prevSliderDst div').innerHTML = '<img class="imgUpload" src="'+ dataProd.url_sliderDts +'" alt="">'; 
                    document.querySelector('.delSliderDst').classList.remove('notBlock');
                    document.querySelector('.prevSliderMbl div').innerHTML = '<img class="imgUpload" src="'+ dataProd.url_sliderMbl +'" alt="">'; 
                    document.querySelector('.delSliderMbl').classList.remove('notBlock');
                }else{
                    document.querySelector('.prevSliderDst div').innerHTML = "";
                    document.querySelector('.prevSliderMbl div').innerHTML = ""
                    document.querySelector('.delSliderDst').classList.add('notBlock');
                    document.querySelector('.delSliderMbl').classList.add('notBlock');
                }

                if (dataProd.descgeneral != null) {
                    document.getElementById('txtDescGrl').value = dataProd.descgeneral;
                    tinymce.activeEditor.setContent(dataProd.descgeneral);
                }
                else{ 
                    document.getElementById('txtDescGrl').value = "";
                    tinymce.activeEditor.setContent(""); 
                }
                document.getElementById("sliderDscOne").value = dataProd.sliderDscOne;
                document.getElementById("sliderDscTwo").value = dataProd.sliderDscTwo;
                document.getElementById('txtMarca').value = dataProd.marca;
                document.getElementById('txtCodigo').value = dataProd.codproducto;
                document.getElementById('txtPrecio').value = dataProd.precio;
                document.getElementById('txtStock').value = dataProd.stock;
                document.getElementById('listCategorias').value = dataProd.categoriaid;
                $("#listCategorias").select2();
                document.getElementById('listStatus').value = dataProd.status;
                
                if (dataProd.imagesProd.length > 0) {
                    for (let p = 0; p < dataProd.imagesProd.length; p++) {
                        let key = Date.now()+p;
                        htmlImage += `
                            <div id="div${key}">
                                <div class="prevImage">
                                    <img src="${dataProd.imagesProd[p].url_image}">
                                </div>
                                <button type="button" class="btnDeleteImage" onclick="ftnDelItem('#div${key}')" imgname= "${dataProd.imagesProd[p].imagen}"><i class="fas fa-trash"></i></button>
                            </div>
                        `;
                    }
                }
                document.querySelector("#containerImages").innerHTML = htmlImage;

                $('#modalFormProducto').modal('show');
            }
        }
    }
}

function deleteProducto(element, idProducto) {
    Swal.fire({
        title: 'Eliminar producto',
        text: "Realmente quiere eliminar el Producto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + 'Productos/delProducto/' + idProducto;
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
                                    $("#tableProductos").DataTable().row(prevtr[0]).remove().draw(false);
                                }
                            }
                            else{
                                $("#tableProductos").DataTable().row(row_closest[0]).remove().draw(false);
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

// FUNCTION REMOVE IMG UPLOAD DELETE
function removeImagen(item){
    item.querySelector('.imagen').value = "";
    item.querySelector('.delImgUpload').classList.add('notBlock');
    
    if (item.querySelector('.imgUpload')) {
        item.querySelector('.imgUpload').remove();
    }
}