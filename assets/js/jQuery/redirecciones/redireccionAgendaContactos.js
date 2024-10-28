$(document).ready(function(){                

    $("#tablaMedios").on("click", ".botonVerAgenda",function(){                              

        var tablaMedios = $("#tablaMedios").DataTable();
        if(tablaMedios.row(this).child.isShown()) {
            var data = tablaMedios.row(this).data();                
        } else {                
            var data = tablaMedios.row($(this).parents('tr')).data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
        }; 
      //Recoger datos de la tabla seleccionada
        var CodMedio = data[0];
        var NombreMedio = data[1];
        var redireccionamiento = 'agendaMedios.php?CodMedio='+CodMedio+'&NombreMedio='+NombreMedio;
        redireccionamiento = redireccionamiento.replace(/ /g, '');
      //Redireccionar y enviar datos a la pagina precios.php            
        CargarPlantilla(redireccionamiento,'content-wrapper');

    });
});