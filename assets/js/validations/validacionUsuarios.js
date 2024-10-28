//Validacion de inputs de añadir medio
    $(function () {
        $.validator.setDefaults({
          submitHandler: function () {  
            añadirUsuario();
          },
        });
        $("#formularioAñadirUsuario").validate({
          rules: {
            NameAñadirNombreUsuario:{
              required: true,
            },
            NameAñadirContraseña:{
              required: true,
            },
            NameAñadirRolUsuario: {
              required: true,
            },
          },
          messages: {
            NameAñadirNombreUsuario:{
              required: "Debe ingresar el nombre completo del usuario",
            },
            NameAñadirContraseña:{
              required: "Debe registrar una contraseña para el usuario",
            },
            NameAñadirRolUsuario: {
              required: "Asigne un rol al usuario",
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
//Validacion de inputs de añadir medio
  $(function () {
    $.validator.setDefaults({
      submitHandler: function () {  
        editarUsuario();
      },
    });
    $("#formularioEditarUsuario").validate({
      rules: {
        NameEditarNombreUsuario:{
          required: true,
        },
        NameEditarContraseña:{
          required: true,
        },
        NameEditarRolUsuario: {
          required: true,
        },
        NameEditarEstadoUsuario: {
          required: true,
        },
      },
      messages: {
        NameEditarNombreUsuario:{
          required: "Debe ingresar el nombre completo del usuario",
        },
        NameEditarContraseña:{
          required: "Debe registrar una contraseña para el usuario",
        },
        NameEditarRolUsuario: {
          required: "Asigne un rol al usuario",
        },
        NameEditarEstadoUsuario: {
          required: "Asigne un estado usuario",
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