<?php
    require_once "conexcionDataBase.php";
    //Hacer validacion y seguridad en backend ademas de avisos necesarios
    $patron = "/[^a-zA-Z0-9]/";
    if(!empty($_POST["BotonPresionado"])){
        if(!empty($_POST["usuario"]) && !empty($_POST["contraseña"])){
            $usuario = preg_replace($patron, "", $_POST["usuario"]);
            $contraseña = $_POST["contraseña"];
            $stmt = conection::conectar()->prepare("SELECT * FROM usuarios WHERE Usuario = '$usuario' AND Contraseña = '$contraseña'");
            if ($stmt->execute()){
                if($stmt -> rowCount() > 0){
                    $variablesUsuario = $stmt -> fetchObject();
                    session_start();
                    $_SESSION["Nombre"] = $variablesUsuario->Nombre;
                    $_SESSION["Rol"] = $variablesUsuario->Rol;
                    $estado = $variablesUsuario->Estado;
                    if ($estado == "Inactivo") {
                        header("Location: ../../index.html?error=4");
                    }else{
                        //ingresar a la pagina generica
                        header("Location: existeSesion.php");                    
                    }
                    
                }else{
                    //Usuario no existe o la contraseña es incorrecta
                    header("Location: ../../index.html?error=1");
                }
            }else{
                //error de consulta
                header("Location: ../../index.html?error=2");
            }
        }else{
            //usuario o contraseña faltante
            header("Location: ../../index.html?error=3");
        }
    }else{
        //acceso prohibido
        header("Location: ../../index.html?error=4");
    }
    
?>