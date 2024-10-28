$(document).ready(function() {
    var tablaNoticias = $("#tablaNoticias").DataTable();

    $("#BuscarMedioNoticia").change(function() {
      var Medio = $(this).val();
      tablaNoticias.column(2).search(Medio).draw();
    });
    $("#BuscarTitular").keyup(function() {
      tablaNoticias.column(3).search(this.value).draw();
    });
    $("#BuscarImpacto").change(function() {
      var Impacto = $(this).val();
      tablaNoticias.column(6).search(Impacto).draw();
    });
});
  