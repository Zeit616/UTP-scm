$(document).ready(function(){
    //Abrir-Cerrar modal de añadir usuario
        $('#abrirModalAñadirNoticia').click(function() {
            $('#modalAñadirNoticia').modal('show');
        });
        $('#cerrarModalAñadirNoticia').click(function() {
            $('#modalAñadirNoticia').modal('hide');
        });

//Abrir-Cerrar modal de editar medio
    $("#tablaNoticias").on("click", ".botonEditarNoticia",function(){
        //Abrir modal Editar item
            $("#modalEditarNoticia").modal("show");              
        //Llenar inputs al mostrar modal
            var tablaNoticias = $("#tablaNoticias").DataTable();
            if(tablaNoticias.row(this).child.isShown()) {
                var data = tablaNoticias.row(this).data();                
            } else {                
                var data = tablaNoticias.row($(this).parents('tr')).data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
            };   
        
            $("#CodNoticiaEditar").val(data[0]);
            $("#EditarFechaNoticia").val(data[1]);
            $("#EditarMedioNoticia").val(data[2]);
            $("#EditarTitular").val(data[3]);
            $("#EditarEspacio").val(data[4]);
            $("#EditarPeriodista").val(data[5]);
            $("#EditarImpacto").val(data[6]);
            $("#EditarComentario").val(data[7]);
            $("#EditarRecomendaciones").val(data[8]);
            $("#EditarFuente").val(data[9]);
            $("#EditarEnlaceAdicional").val(data[11]);
    });
    $('#cerrarModalEditarNoticia').click(function() {
        $('#modalEditarNoticia').modal('hide');
    }); 
    //Abrir-Cerrar modal ver noticia
    $("#tablaNoticias").on("click", ".botonVerNoticia",function(){
        //Abrir modal ver noticia
            $("#modalVerNoticia").modal("show"); 
        //Llenar modal de la noticia con la informacion
            var tablaNoticias = $("#tablaNoticias").DataTable();
            if(tablaNoticias.row(this).child.isShown()) {
                var data = tablaNoticias.row(this).data();                
            } else {                
                var data = tablaNoticias.row($(this).parents('tr')).data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
            };
            var CodNoticia = data[0];
            var Fecha = data[1];
            var Medio = data[2];
            var Titular = data[3];
            var Espacio = data[4];
            var Periodista = data[5];
            var Impacto = data[6];
            var Comentarios = data[7];
            var Recomendaciones = data[8];
            var Fuente = data[9];
            var ArchivoAdjunto = data[10];
            var EnlaceAdicional = data[11];
            $("#CodNoticiaPoint").val(CodNoticia);
            $("#idCodigoDescargar").val(ArchivoAdjunto);
            $("#tituloDelModal").html('"' + Titular + '"'); 
            $("#VerFechaNoticia").val(Fecha);
            $("#VerTipoMedioNoticia").val(Medio);
            $("#VerTitularNoticia").val(Titular);
            $("#VerEspacioNoticia").val(Espacio);
            $("#VerPeriodistaNoticia").val(Periodista);
            $("#VerImpactoNoticia").val(Impacto);
            $("#VerComentarioNoticia").val(Comentarios);
            $("#VerRecomendacionesNoticia").val(Recomendaciones);

            //Ver imagen en modal
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
                            $("#ImagenenModal").attr("src", ruta + val);
                            $("#ImagenenModal").show();
                            return false; // Detener la iteración después de encontrar la primera coincidencia
                        }
                    });
                }
            });

            //modificacion de fuente de la noticia
                $("#VerFuenteNoticia").hide();
                // Eliminar cualquier botón existente
                $("#botonVerFuenteNoticia").remove();

                var $botonVerFuente = $("<button>", {
                    id: "botonVerFuenteNoticia",
                    text: "Ver Fuente",
                    click: function() {
                        window.open(Fuente, "_blank");
                    }
                  });
                  $botonVerFuente.addClass("form-control btn btn-primary btn-lg");                
                  $("#VerFuenteNoticia").after($botonVerFuente);
            //modificacion de fuente de la noticia

            //modificacion de fuente adicional
                $("#VerFuentesAdicionalesNoticia").hide();
                $("#botonVerFuenteNoticiaAdicional").remove();
                var $botonVerFuenteAdicional = $("<button>", {
                    id: "botonVerFuenteNoticiaAdicional",
                    text: "Ver Fuente adicional",
                    click: function() {
                        window.open(EnlaceAdicional, "_blank");
                    }
                  });
                  $botonVerFuenteAdicional.addClass("form-control btn btn-danger btn-lg");                
                  $("#VerFuentesAdicionalesNoticia").after($botonVerFuenteAdicional);
            //modificacion de fuente adicional
    }); 
    $('#cerrarModalVerNoticia').click(function() {
        $('#modalVerNoticia').modal('hide');
    }); 
});