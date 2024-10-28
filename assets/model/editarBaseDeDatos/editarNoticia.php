<?php
require_once "../conexcionDataBase.php";

if (isset($_POST["Fecha"]) && isset($_POST["Medio"]) && isset($_POST["Titular"]) && isset($_POST["Periodista"]) && isset($_POST["Impacto"]) && isset($_POST["Comentarios"]) && isset($_POST["Recomendaciones"]) && isset($_POST["Fuente"])) {
    // Establecer código de la noticia
    $CodNoticia = $_POST["CodNoticia"];

    // Establecer fecha noticia
    $Fecha = $_POST["Fecha"];

    // Establecer medio noticia
    $Medio = $_POST["Medio"];

    // Establecer titular noticia
    $Titular = $_POST["Titular"];

    // Establecer espacio noticia
    $Espacio = $_POST["Espacio"];

    // Establecer Periodista noticia
    $Periodista = $_POST["Periodista"];

    // Establecer impacto noticia
    $Impacto = $_POST["Impacto"];

    // Establecer comentarios noticia
    $Comentarios = $_POST["Comentarios"];

    // Establecer recomendaciones noticia
    $Recomendaciones = $_POST["Recomendaciones"];

    // Establecer fuente noticia
    $Fuente = $_POST["Fuente"];

    // Establecer enlace adicional noticia
    $EnlaceAdicional = $_POST["FuenteAdicional"];

    // Establecer archivo adjunto noticia
    if (isset($_FILES["ArchivoAdjunto"]) && $_FILES["ArchivoAdjunto"]["error"] === UPLOAD_ERR_OK) {
        // Registrar con archivo adjunto
        $carpeta = "../../storage/";
        $archivoBuscado = $CodNoticia;
        $NombreArchivo = $_FILES["ArchivoAdjunto"]["name"];
        $NuevoNombre = $CodNoticia;
        $temporal = $_FILES["ArchivoAdjunto"]["tmp_name"];
        $Extension = pathinfo($NombreArchivo, PATHINFO_EXTENSION);
        $NuevoNombreCompleto = $NuevoNombre . "." . $Extension;
        if (!file_exists("../../storage/")) {
            mkdir("../../storage/", 0777, true);
        }

        // Eliminar archivo preexistente
        $archivosDeLaCarpeta = scandir($carpeta);
        foreach ($archivosDeLaCarpeta as $archivo) {
            $rutaArchivo = $carpeta . $archivo;
            if (is_file($rutaArchivo)) {
                $infoArchivo = pathinfo($rutaArchivo);
                $nombreArchivo = $infoArchivo["filename"];
                if ($nombreArchivo === $archivoBuscado) {
                    unlink($rutaArchivo);
                }
            }
        }

        // Subir archivo adjunto
        move_uploaded_file($temporal, "../../storage/" . $NuevoNombreCompleto);

        // Registrar en tabla noticia
        $stmt3 = conection::conectar()->prepare("UPDATE noticia SET FechaNoticia=?, Medio=?, Titular=?, Espacio=?, Periodista=?, Impacto=?, ComentarioArticulo=?, Recomendaciones=?, FuenteNoticia=?, ArchivoAdjunto=?, EnlaceAdicional=? WHERE CodNoticia=?");
        $stmt3->execute([$Fecha, $Medio, $Titular, $Espacio, $Periodista, $Impacto, $Comentarios, $Recomendaciones, $Fuente, $NuevoNombreCompleto, $EnlaceAdicional, $CodNoticia]);
    } else {
        // Registrar sin archivo adjunto
        $stmt3 = conection::conectar()->prepare("UPDATE noticia SET FechaNoticia=?, Medio=?, Titular=?, Espacio=?, Periodista=?, Impacto=?, ComentarioArticulo=?, Recomendaciones=?, FuenteNoticia=?, EnlaceAdicional=? WHERE CodNoticia=?");
        $stmt3->execute([$Fecha, $Medio, $Titular, $Espacio, $Periodista, $Impacto, $Comentarios, $Recomendaciones, $Fuente, $EnlaceAdicional, $CodNoticia]);
    }

    // Establecer imagen
    if (isset($_FILES["Imagen"]) && $_FILES["Imagen"]["error"] === UPLOAD_ERR_OK) {
        $carpetaImagen = "../../storage/";
        $nombreImagen = "Imagen" . $CodNoticia;
        $nombreArchivoImagen = $_FILES["Imagen"]["name"];
        $temporalImagen = $_FILES["Imagen"]["tmp_name"];
        $extensionImagen = pathinfo($nombreArchivoImagen, PATHINFO_EXTENSION);
        $nuevoNombreCompletoImagen = $nombreImagen . "." . $extensionImagen;

        // Eliminar imagen preexistente
        $archivosImagenCarpeta = scandir($carpetaImagen);
        foreach ($archivosImagenCarpeta as $archivoImagen) {
            $rutaImagen = $carpetaImagen . $archivoImagen;
            if (is_file($rutaImagen)) {
                $infoImagen = pathinfo($rutaImagen);
                $nombreArchivoImagen = $infoImagen["filename"];
                if ($nombreArchivoImagen === $nombreImagen) {
                    unlink($rutaImagen);
                }
            }
        }

        // Subir imagen
        move_uploaded_file($temporalImagen, $carpetaImagen . $nuevoNombreCompletoImagen);
    }

    // Retornar registro exitoso
    echo "1";
} else {
    // Retornar error
    echo "Fallo al registrar";
}
?>
