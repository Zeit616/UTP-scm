<?php
require_once "../conexcionDataBase.php";
if(isset($_POST["Id"])){
    //Establecer codigo del medio
        $Id = $_POST["Id"];    
    //Eliminar de tabla medios
        $stmt3 = conection::conectar()->prepare("DELETE FROM usuarios WHERE `id`='$Id'");    
        $stmt3 -> execute();    
    //retornar registro exitoso    
        echo(1);
}else{
    //retornar error
        echo("Fallo al eliminar");
};
?>