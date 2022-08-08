let formUpdateUser = document.getElementById('formUpdateUser');

formUpdateUser.addEventListener('submit', function (e){
    e.preventDefault();

    let idUser = document.getElementById('idUser').value;

    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + 'Perfil/updateMyUser/' + idUser;
    var formData = new FormData(formUpdateUser);
    request.open("POST", ajaxUrl, true);
    request.send(formData);
}); 