//LOAD DATA TABLE ROLES
var tableRoles;
document.addEventListener('DOMContentLoaded', function () {
    tableRoles = $("#tableRoles").DataTable({
        "aProcessing": true,
        "aServerSide":true,
        "language":{
            "url":"//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        },
        "ajax":{
            "url": base_url + "/Roles/getRoles",
            "dataSrc":"",
        },
        "columns":[
            {"data":"idrol"},
            {"data":"nombrerol"},
            {"data":"descripcion"},
            {"data":"status"},
        ],
        "responsive": true,
        "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "Todos"] ],
        "dom": 'lBfrtip',
        "buttons": [
            "copy", "csv", "excel", "pdf", "print", "colvis"
        ],
        "bDestroy":true,
        "order":[[0,"asc"]],
        initComplete: function(){
            
        },
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
})





// OPEN MODAL ROL
$("#btnNewRol").click(function openModal() {
    $('#modalFormRol').modal('show');
})



// $("#example1").DataTable({
//     "responsive": true, "lengthChange": true, "autoWidth": false,
//     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
//     "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "Todos"] ],
// }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


