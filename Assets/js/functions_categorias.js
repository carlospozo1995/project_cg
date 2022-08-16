function modalNewCategory() {
    document.getElementById("idCategory").value = "";
    document.querySelector(".modal-header").classList.replace("headerUpdate-mc", "headerRegister-mc");
    document.querySelector(".modal-title").innerHTML = "Nuevo Usuario";
    document.getElementById("btnSubmitCategory").classList.replace("bg-success", "btn-primary");
    document.querySelector(".btnText").innerHTML = "Guardar";
    $("#modalFormCategory").modal("show");
}

document.addEventListener("DOMContentLoaded", function () {
    if(document.getElementById("foto")){
        var foto = document.getElementById("foto");
        foto.onchange = function(e) {
            var uploadFoto = document.getElementById("foto").value;
            var fileimg = document.getElementById("foto").files;
            var nav = window.URL || window.webkitURL;
            var contactAlert = document.getElementById('form_alert');
            if(uploadFoto !=''){
                var type = fileimg[0].type;
                var name = fileimg[0].name;
                if(type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png'){
                    contactAlert.innerHTML = '<p class="errorArchivo">El archivo selecionado no es válido. Intentelo de nuevo.</p>';
                    if(document.getElementById('img')){
                        document.getElementById('img').remove();
                    }
                    document.querySelector('.delPhoto').classList.add("notBlock");
                    foto.value="";
                    return false;
                }else{  
                        contactAlert.innerHTML='';
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
            removePhoto();
        }
    }

    var formNewCategory = document.getElementById("formNewCategory");

    formNewCategory.onsubmit = function (e) {
        e.preventDefault(e);

        var intIdCategory = document.getElementById("idCategory").value;
        var strNombre = document.getElementById("txtNombre").value;
        var strDescripcion = document.getElementById("txtDescripcion").value;
        var intStatus = document.getElementById("listStatus").value;
        // var fileFoto = document.getElementById('foto').value;

        if (strNombre == "" || strDescripcion == "" || intStatus == "") {
            Swal.fire("Atención", "Asegúrese de llenar todos los campos.", "error");
        }else{
            // loading.style.display = "flex";
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + 'Categorias/setCategoria';
            var formData = new FormData(formNewCategory);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            console.log(request);
            // request.onreadystatechange = function () {
            //     if (request.readyState == 4 && request.status == 200) {
            //         var objData = JSON.parse(request.responseText);
                    
            //         if (objData.status) {
            //             $('#modalFormCategory').modal('hide');
            //             formNewCategory.reset();
            //             Swal.fire("Categorias", objData.msg, "success");
            //             // tableRoles.ajax.reload(function () {
            //             // });
            //         }else{
            //             Swal.fire("Error", objData.msg, "error");
            //         }
            //     }
            //     loading.style.display = "none";
            //     return false;
            // }
        }
    }

},false);

function removePhoto(){
    document.getElementById('foto').value ="";
    document.querySelector('.delPhoto').classList.add("notBlock");
    document.getElementById('img').remove();
}