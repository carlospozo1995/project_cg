
function controlTag(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8) return true;
    else if(tecla == 0 || tecla == 9) return true;
    patron = /[0-9\s]/;
    n =  String.fromCharCode(tecla);
    return patron.test(n);
}

function testText(txtString) {
    var stringText = new RegExp(/^([a-zA-ZÑñÁáÉéÍíÓóÚú\s])*$/);
    if (stringText.test(txtString)){
        return true;
    }else{
        return false;
    }
}

function testEntero(intCant) {
    var intCantidad = new RegExp(/^([0-9])*$/);
    // var intCantidad = new RegExp(/^([0-9]{7,10})$/);
    if (intCantidad.test(intCant)){
        return true;
    }else{
        return false;
    }
}

function emailValidate(email) {
    var stringEmail = new RegExp(/^(([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9])+\.)+([a-zA-Z0-9]{2,4}))*$/);
    if (stringEmail.test(email) == false){
        return false;
    }else{
        return true;
    }
}

function validText() {
    let validText = document.querySelectorAll(".validText");
    validText.forEach(function (validText) {
        validText.addEventListener('keyup', function () {
            let inputValue = this.value;
            if (!testText(inputValue)) {
                this.classList.add('is-invalid');
            }else{
                this.classList.remove('is-invalid');
                valid(this, inputValue);
            }
        });
    });
}

function validNumber() {
    let validNumber  = document.querySelectorAll(".validNumber");
    validNumber.forEach(function (validNumber) {
        validNumber.addEventListener('keyup', function () {
            let inputValue = this.value;
            if (!testEntero(inputValue)) {
                this.classList.add('is-invalid');
            }else{
                this.classList.remove('is-invalid');
                valid(this, inputValue);
            }
        });
    });
}

function validEmail() {
    let validEmail  = document.querySelectorAll(".validEmail");
    validEmail.forEach(function (validEmail) {
        validEmail.addEventListener('keyup', function () {
            let inputValue = this.value;
            if (!emailValidate(inputValue)) {
                this.classList.add('is-invalid');
            }else{
                this.classList.remove('is-invalid');
                valid(this, inputValue);
            }
        });
    });
}

window.addEventListener('load', function () {
    validText();
    validNumber();
    validEmail();
}, false)

function valid(data, input) {
    data.classList.add('is-valid');
    if(input == ''){
        data.classList.remove('is-valid');
    }
}

// VALIDAR EL FOCUS DE LOS INPUTS
function validFocus() {
    let valid = document.querySelectorAll(".valid");
    valid.forEach(function (valid) {
        valid.classList.remove("is-invalid");
        valid.classList.remove("is-valid");
    });
}

// MOSTRAR Y OCULTAR CONTRASEÑA
function showPassword() {
    let inputPassword = document.getElementById('txtPassword');
    let iconEye = document.querySelector('.show-password');

    iconEye.addEventListener('click', function (e) {
        let eye = e.target;
        if (eye.classList.contains('show-password')) {
            eye.classList.remove('show-password');
            eye.classList.remove('fa-eye-slash');
            eye.classList.add('fa-eye');            
            inputPassword.type = 'text';
        }else{
            eye.classList.remove('fa-eye');
            eye.classList.add('fa-eye-slash');
            eye.classList.add('show-password');
            inputPassword.type = 'password';
        }
    })
}