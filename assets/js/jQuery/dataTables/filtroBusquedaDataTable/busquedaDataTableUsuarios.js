$(document).ready(function() {
    var tablaUsuarios = $("#tablaUsuarios").DataTable();
    $("#BuscarNombre").keyup(function() {
      tablaUsuarios.column(1).search(this.value).draw();
    });
    $("#BuscarUsuario").keyup(function() {
      tablaUsuarios.column(2).search(this.value).draw();
    });
    $("#BuscarRol").change(function() {
        var Rol = $(this).val();
        tablaUsuarios.column(4).search(Rol).draw();
    });
    $("#BuscarEstado").change(function() {
      var Estado = $(this).val();
      tablaUsuarios.column(5).search(Estado).draw();
    });
    
  });
  