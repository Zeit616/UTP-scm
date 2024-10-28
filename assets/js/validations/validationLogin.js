const formulario = document.getElementById("formularioLogin");
const usuario = document.getElementById("inputUsuario");
const contraseña = document.getElementById("inputContraseña");
const inputsAceptados = /^[A-Za-z0-9\s]+$/;

formulario.addEventListener("submit", e=>{
  if (usuario.value.length == 0 || contraseña.value.length == 0){
    //Asviso de Sweet Alert ("Debe llenar todos los campos necesarios")
    informacion("Debe llenar todos los campos");
    e.preventDefault();
  }else if(!inputsAceptados.test(usuario.value)){
    //Aviso de Sweet Alert ("Caracteres no permitidos")
    usuario.value = "";
    contraseña.value = "";
    advertencia("No ingrese caracteres prohibidos")
    e.preventDefault();
  }
})