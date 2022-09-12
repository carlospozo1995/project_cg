function modalNewProducto(){
    document.querySelector(".modal-header").classList.replace("headerUpdate-mc", "headerRegister-mc");
    document.querySelector(".modal-title").innerHTML = "Nuevo Producto";
    document.getElementById("btnSubmitProducto").classList.replace("bg-success", "btn-primary");
    document.querySelector(".btnText").innerHTML = "Agregar";
    var idProducto = document.getElementById('idProducto').value = "";
    $('#modalFormProducto').modal('show');
    formProducto.reset();
}

tinymce.init({
    selector: '#txtDescripcion'
});