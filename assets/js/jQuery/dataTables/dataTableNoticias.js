$(document).ready(function(){
    tablaUsuarios = $("#tablaNoticias").DataTable({
        "ajax": {
            url: "../../model/listarDataTables/listarNoticias.php",
            dataSrc: "",
            type: "POST",
            data: {listar : 1},
        },
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "columnDefs": [
            {
                //CodNoticia
                targets: 0,
                orderable: false,
                visible: false    
            },
            {
                //Fecha
                targets: 1,
                orderable: true,
                visible: true    
            },
            {
                //Medio
                targets: 2,
                orderable: true,
                visible: true    
            },
            {
                //Titular
                targets: 3,
                orderable: false,
                visible: true  
            },
            {
                //Espacio
                targets: 4,
                orderable: false,
                visible: false  
            },
            {
                //Periodista
                targets: 5,
                orderable: false,
                visible: false  
            },
            {
                //Impacto
                targets: 6,
                orderable: true,
                visible: true  
            },
            {
                //Comentarios
                targets: 7,
                orderable: false,
                visible: false  
            },
            {
                //Recomendaciones
                targets: 8,
                orderable: false,
                visible: false  
            },
            {
                //Fuente
                targets: 9,
                orderable: false,
                visible: false  
            },
            {
                //Archivo adjunto
                targets: 10,
                orderable: false,
                visible: false  
            },
            {
                //Enlace adicional
                targets: 11,
                orderable: false,
                visible: false  
            },
            {
                //Opciones
                targets: 12,
                orderable: false,
                visible: true,
                render: function(data, type, full, meta){
                    return(
                        "<center>" +
                        "<span class = 'botonEditarNoticia text-primary px-1' style = 'cursor : pointer;'>" +
                        "<i class='fa-solid fa-file-pen'></i>" +
                        "</span>" +
                        "<span class = 'botonEliminarNoticia text-danger px-1' style = 'cursor : pointer;'>" +
                        "<i class='fa-solid fa-trash'></i>" +
                        "</span>" +
                        "<span class = 'botonVerNoticia text-success px-1' style = 'cursor : pointer;'>" +
                        '<i class="fa-solid fa-eye"></i>' +
                        "</span>" +
                        "</center>"
                    )
                }
            }
        ],
        "language": {url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"},
        "dom": "Bfrtilp",
        "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#tablaNoticias_wrapper .col-md-6:eq(0)');
    
});
