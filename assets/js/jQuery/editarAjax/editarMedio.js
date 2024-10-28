function editarMedio(){
    //Editar en tabla medios
    var datos = new FormData();
    var CodMedio = $("#CodMedioParaEditar").val();
    var Nombre = $("#EditarNombreMedio").val();
    var Categoria = $("#EditarCategoriaMedio").val(); 
    datos.append("CodMedio", CodMedio);   
    datos.append("Nombre", Nombre);
    datos.append("Categoria", Categoria);
    $.ajax({
        url: "../../model/editarBaseDeDatos/editarMedio.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        //dataType: "json",
        success: function(respuesta) {  
            if (respuesta == "1") {
                //limpiar inputs del formulario
                    limpiarInputsEditarMedio();
                //cerrar modal  
                    $('#modalEditarMedio').modal('hide'); 
                //recargar dataTable
                    var recarga = $("#tablaMedios").DataTable();
                    recarga.ajax.reload();
                //toast de registro exitoso    
                    console.log("registro exitoso");
                    aceptado("Medio Editado");
            } else {
                //limpiar inputs del formulario
                    limpiarInputsEditarMedio();
                //cerrar modal
                    $('#modalEditarMedio').modal('hide');
                //toast de registro fallido
                    console.log("error");
                    rechazado(respuesta);
            }
        },
    });
}