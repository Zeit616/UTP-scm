$(document).ready(function(){
        $("#tablaAgendaContactos").on("click", ".botonEliminarContactoMedio",function(){
            var tablaAgendaContactos = $("#tablaAgendaContactos").DataTable();
            if(tablaAgendaContactos.row(this).child.isShown()) {
                var data = tablaAgendaContactos.row(this).data();                
            } else {                
                var data = tablaAgendaContactos.row($(this).parents('tr')).data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
            }; 
            var datos = new FormData();
            var CodContacto = data[0];
            datos.append("CodContacto", CodContacto);
            $.ajax({
                url: "../../model/eliminarBaseDeDatos/eliminarContactoMedio.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                //dataType: "json",
                success: function(respuesta) {  
                    if (respuesta == "1") {                        
                        //recargar dataTable
                            var recarga = $("#tablaAgendaContactos").DataTable();
                            recarga.ajax.reload();
                        //toast de registro exitoso    
                            console.log("registro exitoso");
                            aceptado("Contacto eliminado");
                    } else {                        
                        //toast de registro fallido
                            console.log("error");
                            rechazado(respuesta);
                    }
                },
            });
        });        
});