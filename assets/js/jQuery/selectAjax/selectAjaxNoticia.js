$(document).ready(function() {
  $.ajax({
    url: "../../model/listarSelect/listarSelectNoticia.php",
    cache: false,
    contentType: false,
    processData: false,
    dataType: 'json',
    success: function(respuesta){

      var options1 ='<option value="" disabled selected hidden>Seleccione el medio responsable</option>';

      for (let index = 0; index < respuesta.length; index++){
        options1 = options1 + '<option value=' + respuesta[index][0] + '>' + respuesta[index][0] + '</option>'; 
      }
      var options2 ='<option value="" selected>Seleccione el medio responsable</option>';

      for (let index = 0; index < respuesta.length; index++){
        options2 = options2 + '<option value=' + respuesta[index][0] + '>' + respuesta[index][0] + '</option>'; 
      }
      $('#AñadirMedioNoticia').html(options1);
      $('#EditarMedioNoticia').html(options1);
      $('#BuscarMedioNoticia').html(options2);
    }
  });
})
