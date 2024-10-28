<?php
require_once "../conexcionDataBase.php";
if(isset($_POST["CodNoticia"])){
    //Establecer codigo del medio
        $CodNoticia = $_POST["CodNoticia"];    

    //Eliminar archivo
        $carpeta = "../../storage/";
        $archivoBuscado = $CodNoticia;
        $archivosDeLaCarpeta = scandir($carpeta);
        foreach($archivosDeLaCarpeta as $archivo){
            $rutaArchivo = $carpeta . $archivo;
            if(is_file($rutaArchivo)){
                $infoArchivo = pathinfo($rutaArchivo);
                $nombreArchivo = $infoArchivo["filename"];
                if($nombreArchivo === $archivoBuscado){
                    unlink($rutaArchivo);
                }
            }
        }
    //Eliminar imagen
    $carpeta = "../../storage/";
    $archivoBuscadoImagen = "Imagen".$CodNoticia;
    $archivosDeLaCarpeta = scandir($carpeta);
    foreach($archivosDeLaCarpeta as $archivo){
        $rutaArchivo = $carpeta . $archivo;
        if(is_file($rutaArchivo)){
            $infoArchivo = pathinfo($rutaArchivo);
            $nombreArchivo = $infoArchivo["filename"];
            if($nombreArchivo === $archivoBuscadoImagen){
                unlink($rutaArchivo);
            }
        }
    }
    //Eliminar de tabla medios
        $stmt3 = conection::conectar()->prepare("DELETE FROM noticia WHERE CodNoticia='$CodNoticia'");    
        $stmt3 -> execute();    
    //retornar registro exitoso    
        echo(1);
}else{
    //retornar error
        echo("Fallo al eliminar");
};


/*

*/
?>
                        



                