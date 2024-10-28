$(document).ready(function(){
    tablaUsuarios = $("#tablaUsuarios").DataTable({
        "ajax": {
            url: "../../model/listarDataTables/listarUsuarios.php",
            dataSrc: "",
            type: "POST",
            data: {listar : 1},
        },
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "columnDefs": [
            {
                //Id
                targets: 0,
                orderable: false,
                visible: false    
            },
            {
                //Nombre
                targets: 1,
                orderable: true,
                visible: true    
            },
            {
                //Usuario
                targets: 2,
                orderable: false,
                visible: true    
            },
            {
                //Contraseña
                targets: 3,
                orderable: false,
                visible: false    
            },
            {
                //Rol
                targets: 4,
                orderable: true,
                visible: true    
            },
            {
                //Estado
                targets: 5,
                orderable: true,
                visible: true    
            },
            {
                //Opciones
                targets: 6,
                orderable: false,
                visible: true,
                render: function(data, type, full, meta){
                    return(
                        "<center>" +
                        "<span class = 'botonEditarUsuario text-primary px-1' style = 'cursor : pointer;'>" +
                        "<i class='fa-solid fa-file-pen'></i>" +
                        "</span>" +
                        "<span class = 'botonEliminarUsuario text-danger px-1' style = 'cursor : pointer;'>" +
                        "<i class='fa-solid fa-trash'></i>" +
                        "</span>" +
                        "</center>"
                    )
                }
            }
        ],
        "language": {url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"},
        "dom": "Bfrtilp",
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#tablaMedios_wrapper .col-md-6:eq(0)');
    
});