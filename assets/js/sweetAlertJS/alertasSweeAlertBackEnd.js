var url = new URL(window.location.href);
var error = url.searchParams.get("error");

switch (error) {
    case "1":
        informacion("Usuario no existe o la contraseña es incorrecta");
        break;
    case "2":
        advertencia("Opps.. algo salió mal")
        break;
    case "3":
        informacion("Complete todos los campos porfavor");
        break;
    case "4":
        rechazado("Acceso prohibido");
        break;
    case "5":
        informacion("Sesión cerrada");
        break;
    default:
        break;
}

function aceptado (){
    
}

function rechazado (valor){
    const Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }        
      })
      
    Toast.fire({
        icon: 'error',
        title: valor
      })
}

function advertencia (valor){
const Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }        
      })
      
    Toast.fire({
        icon: 'warning',
        title: valor
      })
}

function informacion (valor){
    const Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }        
      })
      
    Toast.fire({
        icon: 'info',
        title: valor
      })
}

