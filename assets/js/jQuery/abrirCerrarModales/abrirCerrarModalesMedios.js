$(document).ready(function(){
    //Abrir-Cerrar modal de añadir medio
        $('#abrirModalAñadirMedio').click(function() {
            $('#modalAñadirMedio').modal('show');
        });
        $('#cerrarModalAñadirMedio').click(function() {
            $('#modalAñadirMedio').modal('hide');
        });
    //Abrir-Cerrar modal de editar medio
        $("#tablaMedios").on("click", ".botonEditarMedio",function(){
            //Abrir modal Editar item
                $("#modalEditarMedio").modal("show");              
            //Llenar inputs al mostrar modal
                var tablaMedios = $("#tablaMedios").DataTable();
                if(tablaMedios.row(this).child.isShown()) {
                    var data = tablaMedios.row(this).data();                
                } else {                
                    var data = tablaMedios.row($(this).parents('tr')).data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
                };   
                $("#CodMedioParaEditar").val(data[0]);
                $("#EditarNombreMedio").val(data[1]);
                $("#EditarCategoriaMedio").val(data[2]);
        });
        $('#cerrarModalEditarMedio').click(function() {
            $('#modalEditarMedio').modal('hide');
        }); 
});