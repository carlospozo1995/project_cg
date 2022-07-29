// LOGIN FLIPPED
$('.login-content [data-toggle="flip"]').click(function() {
    $('.login').toggleClass('flipped');
    return false;
});

document.addEventListener('DOMContentLoaded', function(){
    if (document.getElementById("formLogin")) {
        let formLogin = document.getElementById("formLogin");
        formLogin.addEventListener("submit", function (e) {
            e.preventDefault();
            let strEmail = document.getElementById("txtEmail").value;
            let strPassword = document.getElementById("txtPassword").value;
            
            if (strEmail == "" || strPassword == "") {
                Swal.fire("Por favor", "Ingrese el usuario y la contraseña.", "error");
                return false;
            }else{
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = base_url + 'Login/loginUser';
                var formData = new FormData(formLogin);
                request.open("POST", ajaxUrl, true);
                request.send(formData);
                request.onreadystatechange = function () {
                    
                    if (request.readyState != 4) return;
                    if (request.status == 200) {
                        var objData = JSON.parse(request.responseText);
                        if (objData.status) {
                            window.location = base_url + "sistema";
                        }else{
                            Swal.fire("Atención", objData.msg, "warning");
                            strPassword = document.getElementById("txtPassword").value = "";
                        }
                    }else{
                        Swal.fire("Atención", "Error en el proceso", "error");
                    }
                    return false;
                }
            }
        });
    }
}, false);