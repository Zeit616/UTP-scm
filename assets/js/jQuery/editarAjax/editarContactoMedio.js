function editarContactoMedio() {
  //Editar en tabla medios
  var datos = new FormData();
  var CodContacto = $("#CodContactoEditarContacto").val();
  var Nombre = $("#EditarNombreContacto").val();
  var Telefono = $("#EditarTelefonoContacto").val();
  var Correo = $("#EditarCorreoContacto").val();
  datos.append("CodContacto", CodContacto);
  datos.append("Nombre", Nombre);
  datos.append("Telefono", Telefono);
  datos.append("Correo", Correo);
  $.ajax({
    url: "../../model/editarBaseDeDatos/editarContactoMedio.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    //dataType: "json",
    success: function (respuesta) {
      if (respuesta == "1") {
        //cerrar modal
        $("#modalEditarContacto").modal("hide");
        //recargar dataTable
        var recarga = $("#tablaAgendaContactos").DataTable();
        recarga.ajax.reload();
        //toast de registro exitoso
        console.log("registro exitoso");
        aceptado("Contacto Editado");
      } else {
        //cerrar modal
        $("#modalEditarContacto").modal("hide");
        //toast de registro fallido
        console.log("error");
        rechazado(respuesta);
      }
    },
  });
}
