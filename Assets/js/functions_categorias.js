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
                    contactAlert.innerHTML = '<p class="errorArchivo">El archivo no es válido.</p>';
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
    
    function removePhoto(){
        document.getElementById('foto').value ="";
        document.querySelector('.delPhoto').classList.add("notBlock");
        document.getElementById('img').remove();
    }
    
},false);