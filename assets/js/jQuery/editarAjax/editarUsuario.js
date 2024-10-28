function editarUsuario(){
    //Editar en tabla medios
    var datos = new FormData();
    var Id = $("#EditarIdUsuario").val();
    var Nombre = $("#EditarNombreUsuario").val();
    var Contraseña = $("#EditarContraseña").val();
    var Rol = $("#EditarRolUsuario").val();
    var Estado = $("#EditarEstadoUsuario").val();
    datos.append("Id", Id);   
    datos.append("Nombre", Nombre);
    datos.append("Contraseña", Contraseña);
    datos.append("Rol", Rol);
    datos.append("Estado", Estado);
    $.ajax({
        url: "../../model/editarBaseDeDatos/editarUsuario.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        //dataType: "json",
        success: function(respuesta) {  
            if (respuesta == "1") {
                //limpiar inputs del formulario
                    limpiarInputsEditarUsuario();
                //cerrar modal  
                    $('#modalEditarUsuario').modal('hide'); 
                //recargar dataTable
                    var recarga = $("#tablaUsuarios").DataTable();
                    recarga.ajax.reload();
                //toast de registro exitoso    
                    console.log("registro exitoso");
                    aceptado("Usuario Editado");
            } else {
                //limpiar inputs del formulario
                    limpiarInputsEditarUsuario();
                //cerrar modal
                    $('#modalEditarUsuario').modal('hide');
                //toast de registro fallido
                    console.log("error");
                    rechazado(respuesta);
            }
        },
    });
}