<?php
session_start();

if(empty($_SESSION["Nombre"])){
    //acceso no autorizado
    header("Location: ../../index.html?error=4");
}else{        
    $Nombre = $_SESSION["Nombre"];
    $Rol = $_SESSION["Rol"];
    switch ($Rol) {
        case 'Admin':
            header("Location: ../vistas/admin/vistaGenerica.php");
            break;
        case 'Usuario':
            header("Location: ../vistas/usuario/vistaGenerica.php");
            break;
        
        default:
        header("Location: ../../index.html?error=5");
            break;
    }
    
}

?>