<?php
require_once "../conexcionDataBase.php";
if(isset($_POST["CodMedio"]) && isset($_POST["Nombre"]) && isset($_POST["Telefono"]) && isset($_POST["Correo"])){
    //Establecer el codigo del medio asociado
        $CodMedio = $_POST["CodMedio"];
    //Establecer nombre del contacto
        $Nombre = $_POST["Nombre"];
    //Establecer telefono del contacto
        $Telefono = $_POST["Telefono"];    
    //Establecer correo del contacto
        $Correo = $_POST["Correo"];    
    //Registrar en tabla 
        $stmt3 = conection::conectar()->prepare("INSERT INTO agenda (CodMedio, Nombre, Telefono, Correo) VALUES ('$CodMedio', '$Nombre', '$Telefono', '$Correo')");    
        $stmt3 -> execute();    
    //retornar registro exitoso    
        echo(1);
}else{
    //retornar error
        echo("Fallo al registrar");
};
?>