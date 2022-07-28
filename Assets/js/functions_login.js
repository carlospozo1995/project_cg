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
                    if (request.readyState == 4 && request.status == 200) {
                        var objData = JSON.parse(request.responseText);
                        if (objData.status) {
                            
                        }else{
                            Swal.fire("Error", objData.msg, "warning");
                        }
                    }
                }
            }
        });
    }
}, false);