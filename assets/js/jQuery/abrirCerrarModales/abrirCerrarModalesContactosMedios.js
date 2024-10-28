$(document).ready(function(){
    //Abrir-Cerrar modal de añadir contacto
        $('#abrirModalAñadirContacto').click(function() {
            $('#modalAñadirContacto').modal('show');
        });
        $('#cerrarModalAñadirContacto').click(function() {
            $('#modalAñadirContacto').modal('hide');
        });
    //Abrir-Cerrar modal de editar contacto
        $("#tablaAgendaContactos").on("click", ".botonEditarContactoMedio",function(){
            //Abrir modal Editar item
                $("#modalEditarContacto").modal("show");              
            //Llenar inputs al mostrar modal
                var tablaAgendaContactos = $("#tablaAgendaContactos").DataTable();
                if(tablaAgendaContactos.row(this).child.isShown()) {
                    var data = tabltablaAgendaContactosaMedios.row(this).data();                
                } else {                
                    var data = tablaAgendaContactos.row($(this).parents('tr')).data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
                };   
                $("#CodContactoEditarContacto").val(data[0]);
                $("#EditarNombreContacto").val(data[2]);
                $("#EditarTelefonoContacto").val(data[3]);
                $("#EditarCorreoContacto").val(data[4]);
        });
        $('#cerrarModalEditarContacto').click(function() {
            $('#modalEditarContacto').modal('hide');
       });
});