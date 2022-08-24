

function modalNewCategoria() {
    document.getElementById("idCategoria").value = "";
    document.querySelector(".modal-header").classList.replace("headerUpdate-mc", "headerRegister-mc");
    document.querySelector(".modal-title").innerHTML = "Nueva Categoria";
    document.getElementById("btnSubmitCategoria").classList.replace("bg-success", "btn-primary");
    document.querySelector(".btnText").innerHTML = "Guardar";

    $("#modalFormCategoria").modal("show");
    formCategoria.reset();
    // document.getElementById('form_alert').innerHTML = "";
    // // removePhoto();
    // // rowTable = "";
}



document.addEventListener("DOMContentLoaded", function () {
    var formNewCategoria = document.getElementById("formCategoria");

    formNewCategoria.addEventListener("submit", function (e) {
        e.preventDefault();
        var intIdCategoria = document.getElementById("idCategoria").value;
        var nameCategoria = document.getElementById("nameCategoria").value;
        var desCategoria = document.getElementById("desCategoria").value;
        var categoriaFatherId = document.getElementById("categoriaFatherId").value;
        var intStatus = document.getElementById("listStatus").value;
        // var fileFoto = document.getElementById('foto').value;

        if (nameCategoria == "" || desCategoria == "" || intStatus == "") {
            Swal.fire("Atención", "Asegúrese de llenar todos los campos.", "error");
        }else{
            loading.style.display = "flex";
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + 'Categorias/setCategoria';
            var formData = new FormData(formCategoria);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            // request.onreadystatechange = function () {
            //     if (request.readyState == 4 && request.status == 200) {
            //         var objData = JSON.parse(request.responseText);

                    // if(objData.status){
                        // $('#modalFormCategoria').modal('hide');
                        // formCategoria.reset();
                        // Swal.fire("Categorias", objData.msg, "success");
                        // removePhoto();  

                    // }else{
                    //     Swal.fire("Error", objData.msg, "error");
                    // }
                // }
                loading.style.display = "none";
                return false;
            // }
        }
    })

}, false)



// var tableCategorias;
// var rowTable = "";
// document.addEventListener("DOMContentLoaded", function () {
//     if(document.getElementById("foto")){
//         var foto = document.getElementById("foto");
//         foto.onchange = function(e) {
//             var uploadFoto = document.getElementById("foto").value;
//             var fileimg = document.getElementById("foto").files;
//             var nav = window.URL || window.webkitURL;
//             var contactAlert = document.getElementById('form_alert');
//             if(uploadFoto !=''){
//                 var type = fileimg[0].type;
//                 var name = fileimg[0].name;
//                 if(type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png'){
//                     contactAlert.innerHTML = '<p class="errorArchivo">El archivo selecionado no es válido. Intentelo de nuevo.</p>';
//                     if(document.getElementById('img')){
//                         document.getElementById('img').remove();
//                     }
//                     document.querySelector('.delPhoto').classList.add("notBlock");
//                     foto.value="";
//                     return false;
//                 }else{  
//                         contactAlert.innerHTML='';
//                         if(document.getElementById('img')){
//                             document.getElementById('img').remove();
//                         }
//                         document.querySelector('.delPhoto').classList.remove("notBlock");
//                         var objeto_url = nav.createObjectURL(this.files[0]);
//                         document.querySelector('.prevPhoto div').innerHTML = "<img id='img' src="+objeto_url+">";
//                     }
//             }else{
//                 alert("No selecciono foto");
//                 if(document.getElementById('img')){
//                     document.getElementById('img').remove();
//                 }
//             }
//         }
//     }
    
//     if(document.querySelector(".delPhoto")){
//         var delPhoto = document.querySelector(".delPhoto");
//         delPhoto.onclick = function(e) {
//             document.getElementById('foto_remove').value = 1;
//             removePhoto();
//         }
//     }

//     tableCategorias = $("#tableCategorias").DataTable({
//         "aProcessing": true,
//         "aServerSide":true,
//         "language":{
//             "url":"//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
//         },
//         "ajax":{
//             "url": base_url + "Categorias/getCategorias",
//             "dataSrc":"",
//         },
//         "columns":[
//             {"data":"idcategoria"},
//             {"data":"nombre"},
//             {"data":"descripcion"},
//             {"data":"status"},
//             {"data":"actions"},
//         ],
//         "responsive": true,
//         "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "Todos"] ],
//         "dom": 'lBfrtip',
//         "buttons": [
//             "copy", "csv", "excel", "pdf", "print", "colvis"
//         ],
//         "bDestroy":true,
//         "order":[[0,"asc"]],
//         "iDisplayLength":10,
//     });

//     var formCategoria = document.getElementById("formCategoria");

//     formCategoria.onsubmit = function (e) {
//         e.preventDefault(e);

//         var intIdCategoria = document.getElementById("idCategoria").value;
//         var strNombre = document.getElementById("txtNombre").value;
//         var strDescripcion = document.getElementById("txtDescripcion").value;
//         var intStatus = document.getElementById("listStatus").value;
//         var fileFoto = document.getElementById('foto').value;

//         if (strNombre == "" || strDescripcion == "" || intStatus == "") {
//             Swal.fire("Atención", "Asegúrese de llenar todos los campos.", "error");
//         }else{
//             loading.style.display = "flex";
//             var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
//             var ajaxUrl = base_url + 'Categorias/setCategoria';
//             var formData = new FormData(formCategoria);
//             request.open("POST", ajaxUrl, true);
//             request.send(formData);
//             request.onreadystatechange = function () {
//                 if (request.readyState == 4 && request.status == 200) {
//                     var objData = JSON.parse(request.responseText);

//                     if(objData.status){
//                         if (rowTable == "") {
//                             tableCategorias.ajax.reload(function () {
//                             });
//                         }else{
                            
//                             let htmlStatus = intStatus == 1 ? '<div class="text-center"><span class="bg-success p-1 rounded"><i class="fas fa-user"></i> Activo</span></div>' : '<div class="text-center"><span class="bg-danger p-1 rounded"><i class="fas fa-user-slash"></i> Inactivo</span></div>';
                            
//                             rowTable.cells[1].textContent = strNombre;
//                             rowTable.cells[2].textContent = strDescripcion;
//                             rowTable.cells[3].innerHTML = htmlStatus;
                            
//                         }
//                         $('#modalFormCategoria').modal('hide');
//                         formCategoria.reset();
//                         Swal.fire("Categorias", objData.msg, "success");
//                         removePhoto();  

//                     }else{
//                         Swal.fire("Error", objData.msg, "error");
//                     }
//                 }
//                 loading.style.display = "none";
//                 return false;
//             }
//         }
//     }

// },false);

// function modalNewCategoria() {
//     document.getElementById("idCategoria").value = "";
//     document.querySelector(".modal-header").classList.replace("headerUpdate-mc", "headerRegister-mc");
//     document.querySelector(".modal-title").innerHTML = "Nueva Categoria";
//     document.getElementById("btnSubmitCategoria").classList.replace("bg-success", "btn-primary");
//     document.querySelector(".btnText").innerHTML = "Guardar";

//     $("#modalFormCategoria").modal("show");
//     formCategoria.reset();
//     document.getElementById('form_alert').innerHTML = "";
//     removePhoto();
//     rowTable = "";
// }


// //  VER DATOS DE CATEGORIA

// function viewCategoria(idCategoria) {
//     let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
//     let urlCategoria = base_url + 'Categorias/viewCategoria/' + idCategoria;
//     request.open("GET", urlCategoria, true);
//     request.send();

//     request.onreadystatechange = function () {
//         if (request.readyState == 4 && request.status == 200) {
//             let objData = JSON.parse(request.responseText);
//             if (objData.status) {
//                 let statusCategoria = objData.data.status == 1 ? '<span class="bg-success p-1 rounded"><i class="fas fa-user"></i> Activo</span>' : '<span class="bg-danger p-1 rounded"><i class="fas fa-user-slash"></i> Inactivo</span>';

//                 document.getElementById('celNombre').innerHTML = objData.data.nombre;
//                 document.getElementById('celDescripcion').innerHTML = objData.data.descripcion;
//                 document.getElementById('celImagen').innerHTML = '<img id="img" src="'+ objData.data.url_portada +'" alt="">';
//                 document.getElementById('celFecharegistro').innerHTML = objData.data.datecreate;
//                 document.getElementById('celEstado').innerHTML = statusCategoria;
//                 $('#modalViewCategoria').modal('show');
//             }else{
//                 Swal.fire("Error", objData.msg, "error");
//             }
//         }
        
//     }    
// }

// // EDITAR DATOS CATEGORIA

// function editCategoria(element, idCategoria) {
//     rowTable = element.parentNode.parentNode.parentNode;
//     document.querySelector(".modal-header").classList.replace("headerRegister-mc", "headerUpdate-mc");
//     document.querySelector(".modal-title").innerHTML = "Actualizar Categoria";
//     document.getElementById("btnSubmitCategoria").classList.replace("btn-primary", "bg-success");
//     document.querySelector(".btnText").innerHTML = "Actualizar";
//     let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
//     let ajaxetCategoria = base_url + 'Categorias/viewCategoria/' + idCategoria;
//     request.open("GET", ajaxetCategoria, true);
//     request.send();

//     request.onreadystatechange = function () {
//         if (request.readyState == 4 && request.status == 200) {
//             let objData = JSON.parse(request.responseText);
//             if (objData.status) {
//                 objData.data.portada != 'imgCategoria.png' ? document.querySelector('.delPhoto').classList.remove("notBlock") : document.querySelector('.delPhoto').classList.add("notBlock");
//                 document.getElementById('foto_remove').value = 0;
//                 document.getElementById("idCategoria").value = objData.data.idcategoria;
//                 document.getElementById('foto_actual').value = objData.data.portada;
//                 document.getElementById("txtNombre").value = objData.data.nombre;
//                 document.getElementById("txtDescripcion").value = objData.data.descripcion;
//                 document.getElementById("listStatus").value = objData.data.status;
//                 document.querySelector('.prevPhoto div').innerHTML = '<img id="img" src="'+ objData.data.url_portada +'" alt="">';
//                 document.getElementById('form_alert').innerHTML = "";
//                 $("#modalFormCategoria").modal("show");
//             }
//         }
//     }    
// }

// // ELIMINAR CATEGORIA

// function deleteCategoria(idCategoria) {
//     Swal.fire({
//         title: 'Eliminar categoria',
//         text: "Realmente quiere eliminar la categoria!",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Si, eliminar!'
//     }).then((result) => {
//         if (result.isConfirmed) {
//             let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
//             let ajaxUrl = base_url + 'Categorias/delCategoria/' + idCategoria;
//             request.open("POST", ajaxUrl, true);
//             request.send();

//             request.onreadystatechange = function () {
//                 if (request.readyState == 4 && request.status == 200) {
//                     let objData = JSON.parse(request.responseText);
//                     if(objData.status){
//                         Swal.fire(
//                             'Eliminado!',
//                             objData.msg,
//                             'success'
//                         );
//                         tableCategorias.ajax.reload(function () {
//                         });
//                     }else{
//                         Swal.fire(
//                             'Atención!',
//                             objData.msg,
//                             'error'
//                         );
//                     }
//                 }
//             }

//         }
//     });
// }

// function removePhoto(){
//     document.getElementById('foto').value ="";
//     document.querySelector('.delPhoto').classList.add("notBlock");
//     if (document.getElementById('img')){
//         document.getElementById('img').remove();
//     }
// }