//Validacion de inputs de añadir medio
    $(function () {
        $.validator.setDefaults({
          submitHandler: function () {  
            añadirContacto();
          },
        });
        $("#formularioAñadirContacto").validate({
          rules: {
            NameAñadirNombreContacto:{
                required: true,
            },
            NameAñadirTelefonoContacto: {
              required: true,
              number: true,
              minlength: 5,
              maxlength: 9
            },
            NameAñadirCorreoContacto: {
              required: true,
              email: true
            },
          },
          messages: {
            NameAñadirNombreContacto:{
              required: "Ingrese el nombre del contacto"
            },
            NameAñadirTelefonoContacto: {
              required: "Ingrese el celular o telefono del contacto",
              number: "Debe ingresar solo numeros",
              minlength: "Debe ingresar almenos el telefono del contacto",
              maxlength: "Debe ingresar un numero de celular (9 numeros)"
            },
            NameAñadirCorreoContacto: {
              required: "Ingrese el correo del contacto",
              email: "Ingrese un formato de correo estandar"
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
//Validacion de inputs de editar medio
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {  
      editarContactoMedio();
    },
  });
  $("#formularioEditarContacto").validate({
    rules: {
      NameEditarNombreContacto:{
          required: true,
      },
      NameEditarTelefonoContacto: {
        required: true,
        number: true,
        minlength: 5,
        maxlength: 9
      },
      NameEditarCorreoContacto: {
        required: true,
        email: true
      },
    },
    messages: {
      NameEditarNombreContacto:{
        required: "Ingrese el nombre del contacto"
      },
      NameEditarTelefonoContacto: {
        required: "Ingrese el celular o telefono del contacto",
        number: "Debe ingresar solo numeros",
        minlength: "Debe ingresar almenos el telefono del contacto",
        maxlength: "Debe ingresar un numero de celular (9 numeros)"
      },
      NameEditarCorreoContacto: {
        required: "Ingrese el correo del contacto",
        email: "Ingrese un formato de correo estandar"
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