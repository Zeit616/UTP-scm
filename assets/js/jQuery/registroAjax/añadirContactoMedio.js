function añadirContacto(){
    //Registrar en tabla medios
    var datos = new FormData();        
    var Nombre = $("#AñadirNombreContacto").val();
    var Telefono = $("#AñadirTelefonoContacto").val();    
    var Correo = $("#AñadirCorreoContacto").val();    
    datos.append("CodMedio", CodMedio);
    datos.append("Nombre", Nombre);
    datos.append("Telefono", Telefono);
    datos.append("Correo", Correo);
    $.ajax({
        url: "../../model/registrarBaseDeDatos/añadirContactoMedio.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        //dataType: "json",
        success: function(respuesta) {  
            if (respuesta == "1") {
                //limpiar inputs del formulario
                    limpiarInputsAñadirContacto();
                //cerrar modal  
                    $('#modalAñadirContacto').modal('hide'); 
                //recargar dataTable
                    var recarga = $("#tablaAgendaContactos").DataTable();
                    recarga.ajax.reload();
                //toast de registro exitoso    
                    console.log("registro exitoso");
                    aceptado("Registro exitoso");
            } else {
                //limpiar inputs del formulario
                    limpiarInputsAñadirContacto();
                //cerrar modal
                    $('#modalAñadirContacto').modal('hide');
                //toast de registro fallido
                    console.log("error");
                    rechazado(respuesta);
            }
        },
    });    
};