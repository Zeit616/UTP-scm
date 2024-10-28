$(document).ready(function(){
    tablaMedios = $("#tablaMedios").DataTable({
        "ajax": {
            url: "../../model/listarDataTables/listarMedios.php",
            dataSrc: "",
            type: "POST",
            data: {listar : 1},
        },
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "columnDefs": [
            {
                //CodMedio
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
                //Categoria
                targets: 2,
                orderable: true,
                visible: true    
            },
            {
                //Opciones
                targets: 3,
                orderable: false,
                visible: true,
                render: function(data, type, full, meta){
                    return(
                        "<center>" +
                        "<span class = 'botonEditarMedio text-primary px-1' style = 'cursor : pointer;'>" +
                        "<i class='fa-solid fa-file-pen'></i>" +
                        "</span>" +
                        "<span class = 'botonEliminarMedio text-danger px-1' style = 'cursor : pointer;'>" +
                        "<i class='fa-solid fa-trash'></i>" +
                        "</span>" +
                        "<span class = 'botonVerAgenda text-success px-1' style = 'cursor : pointer;'>" +                    
                        "<i class='fa-solid fa-address-book'></i>" +                    
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
