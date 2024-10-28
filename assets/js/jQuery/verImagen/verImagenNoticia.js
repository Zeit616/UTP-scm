$('#VerImagen').click(function() {
    $('#modalVerImagen').modal('show');
    var archivoImagen = "Imagen" + $("#CodNoticiaPoint").val();
    var ruta = "../../storage/";

    // Obtener todas las imágenes que coincidan con el nombre del archivo
    $.ajax({
        url: ruta,
        success: function(data) {
            $(data).find("a").attr("href", function(i, val) {
                // Verificar si el nombre del archivo coincide sin importar la extensión
                if (val.startsWith(archivoImagen)) {
                    // Establecer la ruta de la imagen en el atributo src de la etiqueta <img>
                    $("#Imagen").attr("src", ruta + val);
                    $("#Imagen").show();
                    return false; // Detener la iteración después de encontrar la primera coincidencia
                }
            });
        }
    });
});
$(document).ready(function() {   
    $('#cerrarModalVerImagen').click(function() {
        $('#modalVerImagen').modal('hide');
   });
});
