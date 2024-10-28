function editarNoticia(){
    //Registrar en tabla medios
    var datos = new FormData();
    var CodNoticia = $("#CodNoticiaEditar").val();
    var Fecha = $("#EditarFechaNoticia").val();
    var Medio = $("#EditarMedioNoticia").val();
    var Titular = $("#EditarTitular").val();
    var Imagen = $("#EditarImagen")[0];
    var Espacio = $("#EditarEspacio").val();
    var Periodista = $("#EditarPeriodista").val();
    var Impacto = $("#EditarImpacto").val();
    var Comentarios = $("#EditarComentario").val();
    var Recomendaciones = $("#EditarRecomendaciones").val();
    var Fuente = $("#EditarFuente").val();
    var ArchivoAdjunto = $("#EditarArchivoAdjunto")[0];
    var FuenteAdicional = $("#EditarEnlaceAdicional").val();
    datos.append("CodNoticia", CodNoticia);
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
        url: "../../model/editarBaseDeDatos/editarNoticia.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        //dataType: "json",
        success: function(respuesta) {  
            if (respuesta == "1") {
                //limpiar inputs del formulario
                    limpiarInputsEditarNoticia();
                //cerrar modal  
                    $('#modalEditarNoticia').modal('hide'); 
                //recargar dataTable
                    var recarga = $("#tablaNoticias").DataTable();
                    recarga.ajax.reload();
                //toast de registro exitoso    
                    console.log("registro exitoso");
                    aceptado("Registro exitoso");
            } else {
                //limpiar inputs del formulario
                    limpiarInputsEditarNoticia();
                //cerrar modal
                    $('#modalEditarNoticia').modal('hide');
                //toast de registro fallido
                    console.log("error");
                    rechazado(respuesta);
            }
        },
    });
};