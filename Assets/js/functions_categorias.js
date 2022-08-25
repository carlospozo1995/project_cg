

function modalNewCategoria() {
    document.getElementById("idCategoria").value = "";
    document.querySelector(".modal-header").classList.replace("headerUpdate-mc", "headerRegister-mc");
    document.querySelector(".modal-title").innerHTML = "Nueva Categoria";
    document.getElementById("btnSubmitCategoria").classList.replace("bg-success", "btn-primary");
    document.querySelector(".btnText").innerHTML = "Agregar";
    $("#modalFormCategoria").modal("show");
}

document.addEventListener('DOMContentLoaded', function () {

    if (document.getElementById('foto')){
        var foto = document.getElementById('foto');
        foto.onchange = function (e) {
            var uploadFoto = document.getElementById('foto').value;
            var fileImg = document.getElementById('foto').files;
            var nav = window.URL || window.webkitURL;
            var alertFoto =  document.getElementById('foto_alert')
            if (uploadFoto != ""){
                var typeFoto = fileImg[0].type;
                var nameFoto = fileImg[0].name;
                if (typeFoto != 'image/jpeg' && typeFoto != "image/png" && typeFoto != "image/jpg") {
                    alertFoto.innerHTML = '<p class="errorArchivo">El archivo selecionado no es válido. Intentelo de nuevo.</p>';
                    return false;
                }else{
                    alertFoto.innerHTML='';
                    var objeto_url = nav.createObjectURL(this.files[0]);
                    console.log(objeto_url);
                    document.querySelector('.prevPhoto div').innerHTML = "<img id='img' src="+objeto_url+">";
                }
            }else{
                
            }

            // console.log(typeFoto)
        }
    }

    var formCategoria = document.getElementById('formCategoria');
    formCategoria.onsubmit = function (e) {
        e.preventDefault();
        var intIdCategoria = document.getElementById('idCategoria').value;
        var strTitulo = document.getElementById('txtTitulo').value;
        var intStatus = document.getElementById('listStatus').value;
    }
}, false);