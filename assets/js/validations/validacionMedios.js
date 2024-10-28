//Validacion de inputs de añadir medio
    $(function () {
        $.validator.setDefaults({
          submitHandler: function () {  
            añadirMedio();
          },
        });
        $("#formularioAñadirMedio").validate({
          rules: {
            NameAñadirNombreMedio:{
                required: true,
            },
            NameAñadirCategoriaMedio: {
              required: true,
            },
          },
          messages: {
            NameAñadirNombreMedio:{
                required: "Ingrese el nombre del medio",
            },
            NameAñadirCategoriaMedio: {
              required: "Elija la categoría del medio",
            }      
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
//Validacion de inputs de editar medio
  $(function () {
    $.validator.setDefaults({
      submitHandler: function () {  
        editarMedio();
      },
    });
    $("#formularioEditarMedio").validate({
      rules: {
        NameEditarNombreMedio:{
            required: true,
        },
        NameEditarCategoriaMedio: {
          required: true,
        },
      },
      messages: {
        NameEditarNombreMedio:{
            required: "Ingrese el nombre del medio",
        },
        NameEditarCategoriaMedio: {
          required: "Elija la categoría del medio",
        }      
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