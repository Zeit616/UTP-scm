<?php
require_once "../conexcionDataBase.php";

if (isset($_POST["Fecha"]) && isset($_POST["Medio"]) && isset($_POST["Titular"]) && isset($_POST["Periodista"]) && isset($_POST["Impacto"]) && isset($_POST["Comentarios"]) && isset($_POST["Recomendaciones"]) && isset($_POST["Fuente"])) {
    // Establecer codigo de la noticia
    $stmt = conection::conectar()->prepare("SELECT * FROM contenedordecodigos WHERE CodPerteneciente = 'CodNoticia'");
    $stmt->execute();
    $resultado = $stmt->fetch();
    $CodPerteneciente = $resultado[1];
    $CodAlmacenado = $resultado[2];
    $NuevoCodAlmacenado = $CodAlmacenado + 1;
    $CodNoticia = $CodPerteneciente . $NuevoCodAlmacenado;

    // Actualizar contador de codigo
    $stmt2 = conection::conectar()->prepare("UPDATE contenedordecodigos SET CodAlmacenado = '$NuevoCodAlmacenado' WHERE CodPerteneciente = 'CodNoticia'");
    $stmt2->execute();

    // Establecer fecha noticia
    $Fecha = $_POST["Fecha"];

    // Establecer medio noticia
    $Medio = $_POST["Medio"];

    // Establecer titular noticia
    $Titular = $_POST["Titular"];

    // Establecer imagen
    if (isset($_FILES["Imagen"]) && $_FILES["Imagen"]["error"] === UPLOAD_ERR_OK) {
        $NombreArchivoImagen = $_FILES["Imagen"]["name"];
        $NuevoNombreImagen = "Imagen" . $CodNoticia;
        $temporal = $_FILES["Imagen"]["tmp_name"];
        $Extension = pathinfo($NombreArchivoImagen, PATHINFO_EXTENSION);
        $NuevoNombreCompletoImagen = $NuevoNombreImagen . "." . $Extension;
        if (!file_exists("../../storage/")) {
            mkdir("../../storage/", 0777, true);
        }
        move_uploaded_file($temporal, "../../storage/" . $NuevoNombreCompletoImagen);
    } else {
        $NuevoNombreCompletoImagen = "";
    }

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

    // Establecer archivo adjunto noticia
    if (isset($_FILES["ArchivoAdjunto"]) && $_FILES["ArchivoAdjunto"]["error"] === UPLOAD_ERR_OK) {
        $NombreArchivo = $_FILES["ArchivoAdjunto"]["name"];
        $NuevoNombre = $CodNoticia;
        $temporal = $_FILES["ArchivoAdjunto"]["tmp_name"];
        $Extension = pathinfo($NombreArchivo, PATHINFO_EXTENSION);
        $NuevoNombreCompleto = $NuevoNombre . "." . $Extension;
        if (!file_exists("../../storage/")) {
            mkdir("../../storage/", 0777, true);
        }
        move_uploaded_file($temporal, "../../storage/" . $NuevoNombreCompleto);
    } else {
        $NuevoNombreCompleto = "";
    }

    // Establecer enlace adicional noticia
    $EnlaceAdicional = $_POST["FuenteAdicional"];

    // Registrar en tabla noticia
    $stmt3 = conection::conectar()->prepare("INSERT INTO noticia (CodNoticia, FechaNoticia, Medio, Titular, Espacio, Periodista, Impacto, ComentarioArticulo, Recomendaciones, FuenteNoticia, ArchivoAdjunto, EnlaceAdicional) VALUES ('$CodNoticia', '$Fecha', '$Medio', '$Titular', '$Espacio', '$Periodista', '$Impacto', '$Comentarios', '$Recomendaciones', '$Fuente', '$NuevoNombreCompleto', '$EnlaceAdicional')");
    $stmt3->execute();

    // Retornar registro exitoso
    echo "1";
} else {
    // Retornar error
    echo "Fallo al registrar";
}
?>
