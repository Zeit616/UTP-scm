<?php
require_once "../conexcionDataBase.php";
if(isset($_POST["Nombre"]) && isset($_POST["Categoria"])){
    //Establecer nombre del medio
        $Nombre = $_POST["Nombre"];
    //Establecer categoria del medio
        $Categoria = $_POST["Categoria"];
    //Generar codigo de medio
        $stmt = conection::conectar()->prepare("SELECT * FROM contenedordecodigos WHERE CodPerteneciente = 'CodMedio'");    
        $stmt -> execute();
        $resultado = $stmt->fetch();    
        $CodPerteneciente = $resultado[1];
        $CodAlmacenado = $resultado[2];
        $NuevoCodAlmacenado = $CodAlmacenado + 1;
        $CodMedio = $CodPerteneciente . $NuevoCodAlmacenado;    
    //Actualizar contador de codigo    
        $stmt2 = conection::conectar()->prepare("UPDATE contenedordecodigos SET CodAlmacenado = '$NuevoCodAlmacenado' WHERE CodPerteneciente = 'CodMedio'");    
        $stmt2 -> execute();    
    //Registrar en tabla medios
        $stmt3 = conection::conectar()->prepare("INSERT INTO medios (CodMedio, Nombre, Categoria) VALUES ('$CodMedio', '$Nombre', '$Categoria')");    
        $stmt3 -> execute();    
    //retornar registro exitoso    
        echo(1);
}else{
    //retornar error
        echo("Fallo al registrar");
};
?>