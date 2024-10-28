<?php
require_once "../conexcionDataBase.php";
if(isset($_POST["CodContacto"])){
    //Establecer codigo del contacto
        $CodContacto = $_POST["CodContacto"];    
    //Eliminar de tabla medios
        $stmt3 = conection::conectar()->prepare("DELETE FROM agenda WHERE CodContacto='$CodContacto'");    
        $stmt3 -> execute();    
    //retornar registro exitoso    
        echo(1);
}else{
    //retornar error
        echo("Fallo al eliminar");
};
?>