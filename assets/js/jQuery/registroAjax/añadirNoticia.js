function añadirNoticia(){
    //Registrar en tabla medios
    var datos = new FormData();
    var Fecha = $("#AñadirFechaNoticia").val();
    var Medio = $("#AñadirMedioNoticia").val();
    var Titular = $("#AñadirTitular").val();
    var Imagen = $("#AñadirImagen")[0];
    var Espacio = $("#AñadirEspacio").val();
    var Periodista = $("#AñadirPeriodista").val();
    var Impacto = $("#AñadirImpacto").val();
    var Comentarios = $("#AñadirComentario").val();
    var Recomendaciones = $("#AñadirRecomendaciones").val();
    var Fuente = $("#AñadirFuente").val();
    var ArchivoAdjunto = $("#AñadirArchivoAdjunto")[0];
    var FuenteAdicional = $("#AñadirEnlaceAdicional").val();
    datos.append("Fecha", Fecha);
    datos.append("Medio", Medio);
    datos.append("Titular", Titular);
    datos.append("Imagen", Imagen.files[0]);
    datos.append("Espacio", Espacio);
    datos.append("Periodista", Periodista);
    datos.append("Impacto", Impacto);
    datos.append("Comentarios", Comentarios);
    datos.append("Recomendaciones", Recomendaciones);
    datos.append("Fuente", Fuente);
    datos.append("ArchivoAdjunto", ArchivoAdjunto.files[0]);
    datos.append("FuenteAdicional", FuenteAdicional);
    $.ajax({
        url: "../../model/registrarBaseDeDatos/añadirNoticia.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        //dataType: "json",
        success: function(respuesta) {  
            if (respuesta == "1") {
                //limpiar inputs del formulario
                limpiarInputsAñadirNoticia();
                //cerrar modal  
                    $('#modalAñadirNoticia').modal('hide'); 
                //recargar dataTable
                    var recarga = $("#tablaNoticias").DataTable();
                    recarga.ajax.reload();
                //toast de registro exitoso    
                    console.log("registro exitoso");
                    aceptado("Registro exitoso");
            } else {
                //limpiar inputs del formulario
                limpiarInputsAñadirNoticia();
                //cerrar modal
                    $('#modalAñadirNoticia').modal('hide');
                //toast de registro fallido
                    console.log("error");
                    rechazado(respuesta);
            }
        },
    });
};