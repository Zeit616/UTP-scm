<?php
require_once "../conexcionDataBase.php";
if(isset($_POST["Nombre"]) && isset($_POST["Contraseña"]) && isset($_POST["Rol"])){
    //Establecer nombre del usuario
        $Nombre = $_POST["Nombre"];
    //Establecer nombre del usuario        
        $NombreSinEspacios = str_replace(" ", "", $Nombre);
        $PrimeraLetraNombre = $NombreSinEspacios[0];
        $SegundaLetraNombre = $NombreSinEspacios[1];        
        $LetraAntepenultimaNombre = $NombreSinEspacios[-2];
        $LetraUltimaNombre = $NombreSinEspacios[-1];
        $fecha = date("Ymd");
        $hora = date("H");
        $minuto = date("i");
        $segundo = date("s");
        $tiempo_actual = $fecha . $hora . $minuto . $segundo;
        $Usuario = $PrimeraLetraNombre . $SegundaLetraNombre . $LetraAntepenultimaNombre . $LetraUltimaNombre . $tiempo_actual[2] . $tiempo_actual[3] . $tiempo_actual[4] . $tiempo_actual[5] . $tiempo_actual[11] . $tiempo_actual[12];
    //Establecer Contraseña del usuario
        $Contraseña = $_POST["Contraseña"];
    //Establecer rol del usuario
        $Rol = $_POST["Rol"];
    //Establecer Estado del usuario
        $Estado = "Activado";
    //Registrar en tabla usuarios
        $stmt3 = conection::conectar()->prepare("INSERT INTO usuarios (Nombre, Usuario, Contraseña, Rol, Estado) VALUES ('$Nombre', '$Usuario', '$Contraseña', '$Rol', '$Estado')");    
        $stmt3 -> execute();    
    //retornar registro exitoso    
        echo(1);
}else{
    //retornar error
        echo("Fallo al registrar");
};
?>