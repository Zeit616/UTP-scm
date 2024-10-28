$('#DescargarArchivoAdjunto').click(function(e) {
    e.preventDefault();
    var codigoDescargar =  $("#idCodigoDescargar").val()
    
    if (codigoDescargar === "") {
        // El campo está vacío
        advertencia("No existe archivo alguno.");
        return;
    }

    var archivoURL = '../../storage/' + codigoDescargar;
    var link = document.createElement('a');
    link.href = archivoURL;
    link.download = codigoDescargar;
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
});
