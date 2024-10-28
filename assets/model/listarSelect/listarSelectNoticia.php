<?php
require_once "../conexcionDataBase.php";

$stmt = conection::conectar()->prepare("SELECT Nombre FROM medios");              
        
$stmt -> execute();

$respuesta = $stmt->fetchAll();

echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
?>