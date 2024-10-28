//Validacion de inputs de añadir noticia
    $(function () {
        $.validator.setDefaults({
          submitHandler: function () {  
            añadirNoticia();
          },
        });
        $("#formularioAñadirNoticia").validate({
          rules: {
            NameAñadirFechaNoticia:{
              required: true,
              date: true
            },
            NameAñadirMedioNoticia:{
              required: true,
            },
            NameAñadirTitular:{
              required: true,
            },
            NameAñadirPeriodista:{
              required: true,
            },
            NameAñadirImpacto:{
              required: true,
            },
            NameAñadirComentario:{
              required: true,
            },
            NameAñadirRecomendaciones:{
              required: true,
            },
            NameAñadirFuente:{
              required: true,
            },
          },
          messages: {
            NameAñadirFechaNoticia:{
              required: "Ingrese la fecha de la noticia",
              date: "Debe tener formato de fecha",
              },
              NameAñadirMedioNoticia:{
                required: "Seleccione el medio que presento la noticia",
              },
              NameAñadirTitular:{
                required: "Ingrese el titular de la noticia",
              },
              NameAñadirPeriodista:{
                required: "Ingrese el responsable de la noticia",
              },
              NameAñadirImpacto:{
                required: "Seleccione el impacto de la noticia",
              },
              NameAñadirComentario:{
                required: "Comente el impacto de la noticia",
              },
              NameAñadirRecomendaciones:{
                required: "Ingrese algunas recomendaciones",
              },
              NameAñadirFuente:{
                required: "Ingrese la pagina de donde viene la noticia",
              },
          },
          errorElement: "span",
          errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            element.closest(".form-group").append(error);
          },
          highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid");
          },
          unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass("is-invalid");
          },
        });
    });
    //Validacion de inputs de editar noticia
    $(function () {
      $.validator.setDefaults({
        submitHandler: function () {  
          editarNoticia();
        },
      });
      $("#formularioEditarNoticia").validate({
        rules: {
          NameEditarFechaNoticia:{
            required: true,
            date: true
          },
          NameEditarMedioNoticia:{
            required: true,
          },
          NameEditarTitular:{
            required: true,
          },
          NameEditarPeriodista:{
            required: true,
          },
          NameEditarImpacto:{
            required: true,
          },
          NameEditarComentario:{
            required: true,
          },
          NameEditarRecomendaciones:{
            required: true,
          },
          NameEditarFuente:{
            required: true,
          },
        },
        messages: {
          NameEditarFechaNoticia:{
            required: "Ingrese la fecha de la noticia",
            date: "Debe tener formato de fecha",
            },
            NameEditarMedioNoticia:{
              required: "Seleccione el medio que presento la noticia",
            },
            NameEditarTitular:{
              required: "Ingrese el titular de la noticia",
            },
            NameEditarPeriodista:{
              required: "Ingrese el responsable de la noticia",
            },
            NameEditarImpacto:{
              required: "Seleccione el impacto de la noticia",
            },
            NameEditarComentario:{
              required: "Comente el impacto de la noticia",
            },
            NameEditarRecomendaciones:{
              required: "Ingrese algunas recomendaciones",
            },
            NameEditarFuente:{
              required: "Ingrese la pagina de donde viene la noticia",
            },
        },
        errorElement: "span",
        errorPlacement: function (error, element) {
          error.addClass("invalid-feedback");
          element.closest(".form-group").append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass("is-invalid");
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass("is-invalid");
        },
      });
  });