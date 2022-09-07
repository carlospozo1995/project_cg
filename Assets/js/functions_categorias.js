function modalNewCategoria() {
    document.querySelector(".modal-header").classList.replace("headerUpdate-mc", "headerRegister-mc");
    document.querySelector(".modal-title").innerHTML = "Nueva Categoria";
    document.getElementById("btnSubmitCategoria").classList.replace("bg-success", "btn-primary");
    document.querySelector(".btnText").innerHTML = "Agregar";
    var idCategoria = document.getElementById('idCategoria').value = "";
    selectAllCategorias(idCategoria);
    $('#modalFormCategoria').modal('show');
}

function selectAllCategorias(idCategoria) {
    let ajaxUrl = "";
    idCategoria == "" ? ajaxUrl = 'Categorias/getCategorias': ajaxUrl = 
    'Categorias/getCategorias/' + idCategoria;

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open('GET', ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200){
            document.getElementById("listCategorias").innerHTML += request.responseText;
            $("#listCategorias").select2();
        }
    }
}