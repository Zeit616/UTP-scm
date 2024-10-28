$(document).ready(function(){
        $("#tablaMedios").on("click", ".botonEliminarMedio",function(){
            var tablaMedios = $("#tablaMedios").DataTable();
            if(tablaMedios.row(this).child.isShown()) {
                var data = tablaMedios.row(this).data();                
            } else {                
                var data = tablaMedios.row($(this).parents('tr')).data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
            }; 
            var datos = new FormData();
            var CodMedio = data[0];
            datos.append("CodMedio", CodMedio);
            $.ajax({
                url: "../../model/eliminarBaseDeDatos/eliminarMedio.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                //dataType: "json",
                success: function(respuesta) {  
                    //recargar dataTable
                        var recarga = $("#tablaMedios").DataTable();
                        recarga.ajax.reload();
                    //toast de registro exitoso    
                        console.log("registro exitoso");
                        aceptado("Medio eliminado");
                },
            });
        });        
});