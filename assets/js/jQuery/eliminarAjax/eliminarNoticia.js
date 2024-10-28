$(document).ready(function(){
        $("#tablaNoticias").on("click", ".botonEliminarNoticia",function(){
            var tablaNoticias = $("#tablaNoticias").DataTable();
            if(tablaNoticias.row(this).child.isShown()) {
                var data = tablaNoticias.row(this).data();                
            } else {                
                var data = tablaNoticias.row($(this).parents('tr')).data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
            }; 
            var datos = new FormData();
            var CodNoticia = data[0];
            datos.append("CodNoticia", CodNoticia);
            $.ajax({
                url: "../../model/eliminarBaseDeDatos/eliminarNoticia.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                //dataType: "json",
                success: function(respuesta) {  
                    //recargar dataTable
                        var recarga = $("#tablaNoticias").DataTable();
                        recarga.ajax.reload();
                    //toast de registro exitoso    
                        console.log("registro exitoso");
                        aceptado("Noticia eliminada");
                },
            });
        });        
});