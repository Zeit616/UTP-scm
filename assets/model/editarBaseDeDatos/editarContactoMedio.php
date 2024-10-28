<?php
require_once "../conexcionDataBase.php";
if(isset($_POST["CodContacto"]) && isset($_POST["Nombre"]) && isset($_POST["Telefono"]) && isset($_POST["Correo"])){
    //Establecer el codigo del contacyo
        $CodContacto = $_POST["CodContacto"];
    //Establecer nombre del contacto
        $Nombre = $_POST["Nombre"];
    //Establecer telefono del contacto
        $Telefono = $_POST["Telefono"];    
    //Establecer correo del contacto
        $Correo = $_POST["Correo"];    
    //Registrar en tabla 
        $stmt3 = conection::conectar()->prepare("UPDATE agenda SET Nombre='$Nombre', Telefono='$Telefono', Correo='$Correo' WHERE CodContacto='$CodContacto'");    
        $stmt3 -> execute();    
    //retornar registro exitoso    
        echo(1);
}else{
    //retornar error
        echo("Fallo al registrar");
};
?>