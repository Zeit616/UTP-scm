<?php
    class conection{
        static public function conectar(){
            try{
                $conn = new PDO("mysql:host=localhost;dbname=id20964128_scmgloria", "id20964128_administradorscm", "@Tamalito12", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                return $conn;
            }
            catch(PDOException $e){
                echo "conexcion fallida por: " . $e->getMessage();
            }
        }
    }
?>