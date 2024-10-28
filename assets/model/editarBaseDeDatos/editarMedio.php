<?php
require_once "../conexcionDataBase.php";
if(isset($_POST["Nombre"]) && isset($_POST["Categoria"])){
    //Establecer codigo del medio
        $CodMedio = $_POST["CodMedio"];
    //Establecer nombre del medio
        $Nombre = $_POST["Nombre"];
    //Establecer categoria del medio
        $Categoria = $_POST["Categoria"];    
    //Registrar en tabla medios
        $stmt3 = conection::conectar()->prepare("UPDATE medios SET Nombre='$Nombre', Categoria='$Categoria' WHERE CodMedio='$CodMedio'");    
        $stmt3 -> execute();    
    //retornar registro exitoso    
        echo(1);
}else{
    //retornar error
        echo("Fallo al editar");
};
?>