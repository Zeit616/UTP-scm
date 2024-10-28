<?php
require_once "../conexcionDataBase.php";

    $stmt = conection::conectar()->prepare("SELECT CodNoticia, FechaNoticia, Medio, Titular, Espacio, Periodista, Impacto, ComentarioArticulo, Recomendaciones, FuenteNoticia, ArchivoAdjunto, EnlaceAdicional, '' as opciones FROM `noticia`");

    $stmt -> execute();

    $respuesta = $stmt -> fetchAll();

echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
?>