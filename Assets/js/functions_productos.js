
var tableProductos;
var rowTable;

function modalNewProducto(){
    document.querySelector(".modal-header").classList.replace("headerUpdate-mc", "headerRegister-mc");
    document.querySelector(".modal-title").innerHTML = "Nuevo Producto";
    document.getElementById("btnSubmitProducto").classList.replace("bg-success", "btn-primary");
    document.querySelector(".btnText").innerHTML = "Agregar";
    var idProducto = document.getElementById('idProducto').value = "";
    ctgProductos(idProducto);
    $('#modalFormProducto').modal('show');
    formProducto.reset();
    rowTable = "";
    validFocus();
}

document.addEventListener('DOMContentLoaded', function () {
    
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

                            if(rowTable == ""){
                                let btnView = "";
                                let btnUpdate = "";
                                let btnDelete = ""; 

                                if (objData.permisos.ver == 1) {
                                    btnView = '<button type="button" class="btn btn-secondary btn-sm" onclick="viewProducto('+objData.idData+')" tilte="Ver"><i class="fas fa-eye"></i></button>';
                                }
                                if (objData.permisos.actualizar == 1){
                                    btnUpdate = ' <button type="button" class="btn btn-primary btn-sm" onclick="editProducto(this,'+objData.idData+')" tilte="Editar"><i class="fas fa-pencil-alt"></i></button>';
                                }

                                if (objData.permisos.eliminar == 1 && objData.idUser == 1) {
                                    btnDelete = ' <button type="button" class="btn btn-danger btn-sm" onclick="deleteProducto('+objData.idData+')" tilte="Eliminar"><i class="fas fa-trash"></i></button>';
                                }

                                $("#tableProductos").DataTable().row.add([
                                    objData.idData,
                                    codProd,
                                    nameProd,
                                    priceProd,
                                    stock,
                                    htmlStatus,
                                    '<div class="text-center"> '+btnView+btnUpdate+btnDelete+'</div>'
                                ]).draw(false);
                            }

                            document.getElementById('idProducto').value = objData.idproducto;
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