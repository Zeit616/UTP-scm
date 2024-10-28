$(document).ready(function() {
    var tablaMedios = $("#tablaMedios").DataTable();
    $("#BuscarNombre").keyup(function() {
      tablaMedios.column(1).search(this.value).draw();
    });
    $("#BuscarCategoria").change(function() {
        var categoria = $(this).val();
        tablaMedios.column(2).search(categoria).draw();
      });
  });
  