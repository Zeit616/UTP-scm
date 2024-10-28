<?php
require_once "../conexcionDataBase.php";
    $CodMedio = $_POST["CodMedio"];
    $stmt = conection::conectar()->prepare("SELECT CodContacto, CodMedio, Nombre, Telefono, Correo, '' as opciones FROM `agenda` WHERE CodMedio='$CodMedio'");

    $stmt -> execute();

    $respuesta = $stmt -> fetchAll();

echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
?>