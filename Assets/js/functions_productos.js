// document.write(`<script src="${base_url}Assets/js/plugins/barcode/JsBarcode.all.min.js"></script>`);

function modalNewProducto(){
    document.querySelector(".modal-header").classList.replace("headerUpdate-mc", "headerRegister-mc");
    document.querySelector(".modal-title").innerHTML = "Nuevo Producto";
    document.getElementById("btnSubmitProducto").classList.replace("bg-success", "btn-primary");
    document.querySelector(".btnText").innerHTML = "Agregar";
    var idProducto = document.getElementById('idProducto').value = "";
    ctgProductos(idProducto);
    $('#modalFormProducto').modal('show');
    formProducto.reset();
    // $('#divBarCode').addClass('notBlock');
    validFocus();
}

document.addEventListener('DOMContentLoaded', function () {
    if (document.getElementById('formProducto')) {
        var formProducto = document.getElementById('formProducto');
        formProducto.addEventListener('submit', function (e) {
            e.preventDefault();
            var idProd = document.getElementById('idProducto').value;
            var nameProd  = document.getElementById('txtNombre').value;
            var descProd = document.getElementById('txtDescripcion').value;
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
                            $("#modalFormProducto").modal("hide");
                            formProducto.reset();
                            Swal.fire("Productos", objData.msg, "success");
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
}, false);

// CONFIGURACION TEXTAREA DESCRIPCION -TINYMCE
// $('#txtDescripcion').summernote();

// $(document).on('focusin', function(e) {
//     if ($(e.target).closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root").length) {
//         e.stopImmediatePropagation();
//     }
// });

// tinymce.init({
//     selector: '#txtDescripcion',
//     width: "100%",
//     height: 400,    
//     statubar: true,
//     plugins: [
//         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
//         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
//         "save table contextmenu directionality emoticons template paste textcolor"
//     ],
//     toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
//     branding: false,
// });
// -------------------------------------------

// CONFIGURACION BARCODE (CODIGODE BARRA JS)
// if(document.getElementById('txtCodigo')){
//     $('#txtCodigo').keyup(function (e) {
//         if(e.target.value.length >= 5) {
//             $('#divBarCode').removeClass('notBlock'); 
//             if($("#txtCodigo").hasClass("is-valid")){fntBarcode();}else{ $('#divBarCode').addClass('notBlock')}
//         }else{ 
//             $('#divBarCode').addClass('notBlock')
//         }
//     });
// }

// function fntBarcode() {
//     let codigo = document.getElementById('txtCodigo').value;
//     JsBarcode("#barcode", codigo);
// }

// function fntPrintBarcode(area) {
//     let elementArea = document.querySelector(area);
//     let vprint = window.open('', 'popimpr', 'height=400, width=600');
//     vprint.document.write(elementArea.innerHTML);
//     vprint.document.close();
//     vprint.print();
//     vprint.close();
// }
// -------------------------------------------

function ctgProductos(idProducto) {
    let ajaxUrl = "";
    idProducto == "" ? ajaxUrl = 'Productos/getCategorias': ajaxUrl = 'Productos/getCategorias/' + idProducto;

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open('GET', ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200){
            document.getElementById("listCategorias").innerHTML = request.responseText;
            $("#listCategorias").select2();
        }
    }
}