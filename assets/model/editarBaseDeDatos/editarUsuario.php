<?php
require_once "../conexcionDataBase.php";
if(isset($_POST["Nombre"]) && isset($_POST["Contraseña"]) && isset($_POST["Rol"])  && isset($_POST["Estado"]) && isset($_POST["Id"])){
    //Establecer codigo del usuario
        $Id = $_POST["Id"];
    //Establecer nombre del usuario
        $Nombre = $_POST["Nombre"];
    //Establecer Contraseña del usuario
        $Contraseña = $_POST["Contraseña"];
    //Establecer rol del usuario
        $Rol = $_POST["Rol"];
    //Establecer rol del usuario
        $Estado = $_POST["Estado"];
    //Registrar en tabla usuaruos
        $stmt3 = conection::conectar()->prepare("UPDATE usuarios SET Nombre='$Nombre', Contraseña='$Contraseña', Rol='$Rol', Estado='$Estado' WHERE `id`='$Id'");    
        $stmt3 -> execute();    
    //retornar registro exitoso    
        echo(1);
}else{
    //retornar error
        echo("Fallo al editar");
};
?>