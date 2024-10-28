function añadirUsuario(){
    //Registrar en tabla medios
    var datos = new FormData();
    var Nombre = $("#AñadirNombreUsuario").val();
    var Contraseña = $("#AñadirContraseña").val();
    var Rol = $("#AñadirRolUsuario").val();
    datos.append("Nombre", Nombre);
    datos.append("Contraseña", Contraseña);
    datos.append("Rol", Rol);
    $.ajax({
        url: "../../model/registrarBaseDeDatos/añadirUsuario.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        //dataType: "json",
        success: function(respuesta) {  
            if (respuesta == "1") {
                //limpiar inputs del formulario
                    limpiarInputsAñadirUsuario();
                //cerrar modal  
                    $('#modalAñadirUsuario').modal('hide'); 
                //recargar dataTable
                    var recarga = $("#tablaUsuarios").DataTable();
                    recarga.ajax.reload();
                //toast de registro exitoso    
                    console.log("registro exitoso");
                    aceptado("Registro exitoso");
            } else {
                //limpiar inputs del formulario
                    limpiarInputsAñadirUsuario();
                //cerrar modal
                    $('#modalAñadirUsuario').modal('hide');
                //toast de registro fallido
                    console.log("error");
                    rechazado(respuesta);
            }
        },
    });
};