function añadirMedio(){
    //Registrar en tabla medios
    var datos = new FormData();
    var Nombre = $("#AñadirNombreMedio").val();
    var Categoria = $("#AñadirCategoriaMedio").val();    
    datos.append("Nombre", Nombre);
    datos.append("Categoria", Categoria);
    $.ajax({
        url: "../../model/registrarBaseDeDatos/añadirMedio.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        //dataType: "json",
        success: function(respuesta) {  
            if (respuesta == "1") {
                //limpiar inputs del formulario
                    limpiarInputsAñadirMedio();
                //cerrar modal  
                    $('#modalAñadirMedio').modal('hide'); 
                //recargar dataTable
                    var recarga = $("#tablaMedios").DataTable();
                    recarga.ajax.reload();
                //toast de registro exitoso    
                    console.log("registro exitoso");
                    aceptado("Registro exitoso");
            } else {
                //limpiar inputs del formulario
                    limpiarInputsAñadirMedio();
                //cerrar modal
                    $('#modalAñadirMedio').modal('hide');
                //toast de registro fallido
                    console.log("error");
                    rechazado(respuesta);
            }
        },
    });
};