<?php
require_once "../conexcionDataBase.php";
if(isset($_POST["CodMedio"])){
    //Establecer codigo del medio
        $CodMedio = $_POST["CodMedio"];    
    //Eliminar de tabla medios
        $stmt3 = conection::conectar()->prepare("DELETE FROM medios WHERE CodMedio='$CodMedio'");    
        $stmt3 -> execute();    
    //retornar registro exitoso    
        echo(1);
}else{
    //retornar error
        echo("Fallo al eliminar");
};
?>