// LOGIN FLIPPED
$('.login-content [data-toggle="flip"]').click(function() {
    $('.login').toggleClass('flipped');
    return false;
});

let loading = document.getElementById('loading'); 
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
                loading.style.display = 'flex';
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
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
                    loading.style.display = 'none';
                    return false;
                }
            }
        });
    }

    if (document.getElementById('formResetPass')) {
        
        let formResetPass = document.getElementById('formResetPass');

        formResetPass.addEventListener('submit', function (e) {
            e.preventDefault();
            let strEmail = document.getElementById("txtResetEmail").value;

            if (strEmail == "") {
                Swal.fire("Por favor", "Escribe tu correo electrónico.", "error");
                return false;
            }else{
                loading.style.display = 'flex';
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = base_url + 'Login/resetPass';
                var formData = new FormData(formResetPass);
                request.open("POST", ajaxUrl, true);
                request.send(formData);
                request.onreadystatechange = function () {
                    if (request.readyState != 4) return;
                    if (request.status == 200) {
                        var objData = JSON.parse(request.responseText);

                        if (objData.status){
                            Swal.fire({
                                title:'',
                                text:objData.msg,
                                icon:'success',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Ok'
                            }).then((result) => {
                                if (result.isConfirmed){
                                    window.location = base_url + "login";
                                    // window.location = base_url;
                                }
                            });
                        }else{
                            Swal.fire("Atención", objData.msg, "warning");
                        }
                    }else{
                        Swal.fire("Atención", "Error en el proceso.", "error");
                    }
                    loading.style.display = 'none';
                    return false;
                }
            }
        });
    }

    if (document.getElementById('formCambiarPass')) {
        let formCambiarPass = document.getElementById('formCambiarPass');
        formCambiarPass.addEventListener('submit', function (e) {
           e.preventDefault();
           let password = document.getElementById("txtPassword").value;
           let confirmPassword  = document.getElementById("txtPasswordConfirm").value;
           let idUsuario = document.getElementById('idUsuario').value;

            if (password == '' || confirmPassword == '') {
                Swal.fire("Por favor", "Rellene los campos pedidos.", "error");
                return false;
            }else{
        
                if (password.length < 5) {
                    Swal.fire("Atención", "La contraseña debe tener un mínimo de 5 caracteres.", "info");
                    return false;
                }

                if (password !== confirmPassword){
                    Swal.fire("Atención", "Las contraseñas deben ser iguales.", "error");
                    return false;
                }
                loading.style.display = 'flex';
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = base_url + 'Login/setPassword';
                var formData = new FormData(formCambiarPass);
                request.open('POST', ajaxUrl, true);
                request.send(formData);
                request.onreadystatechange = function () {
                    if (request.readyState !=4) return;
                    if (request.status == 200){
                        var objData = JSON.parse(request.responseText);
                        
                        if (objData.status){
                            Swal.fire({
                                title:'',
                                text:objData.msg,
                                icon:'success',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Iniciar sesión',
                                closeOnConfirm:false,
                            }).then((result) => {
                                if (result.isConfirmed){
                                    window.location = base_url + "login";
                                }else{
                                    window.location = base_url + "login";
                                }
                            });
                        }else{
                            Swal.fire("Atención", objData.msg, "warning");
                        }
                    }else{
                        Swal.fire("Atención", "Error en el proceso.", "error");
                    }
                    loading.style.display = 'none';
                    return false;
                }
            }
        });
    }

    
    
}, false);

// SHOW PASSWORD
function showPassword(obj) {
    let inputPass = document.querySelectorAll('.inputReset');
    if (obj.classList.contains('fa-eye-slash')) {
        obj.classList.remove('fa-eye-slash');
        obj.classList.add('fa-eye');
        inputPass.forEach(function (input) {
            input.type = 'text';
        });
    }else{
        obj.classList.add('fa-eye-slash');
        obj.classList.remove('fa-eye');
        inputPass.forEach(function (input) {
            input.type = 'password';
        });
    }
}