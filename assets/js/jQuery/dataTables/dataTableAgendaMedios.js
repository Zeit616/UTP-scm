
    $(document).ready(function(){
        tablaAgendaMedios = $("#tablaAgendaContactos").DataTable({
            "ajax": {
                url: "../../model/listarDataTables/listarAgendaMedios.php",
                dataSrc: "",
                type: "POST",
                data: {CodMedio : CodMedio},
            },
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "columnDefs": [
                {
                    //CodContacto
                    targets: 0,
                    orderable: false,
                    visible: false    
                },
                {
                    //CodMedio
                    targets: 1,
                    orderable: false,
                    visible: false  
                },
                {
                    //Nombre
                    targets: 2,
                    orderable: true,
                    visible: true    
                },
                {
                    //Telefono
                    targets: 3,
                    orderable: false,
                    visible: true    
                },
                {
                    //Correo
                    targets: 4,
                    orderable: false,
                    visible: true    
                },
                {
                    //Opciones
                    targets: 5,
                    orderable: false,
                    visible: true,
                    render: function(data, type, full, meta){
                        return(
                            "<center>" +
                            "<span class = 'botonEditarContactoMedio text-primary px-1' style = 'cursor : pointer;'>" +
                            "<i class='fa-solid fa-file-pen'></i>" +
                            "</span>" +
                            "<span class = 'botonEliminarContactoMedio text-danger px-1' style = 'cursor : pointer;'>" +
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
        }).buttons().container().appendTo('#tablaAgendaContactos_wrapper .col-md-6:eq(0)');
        
    });