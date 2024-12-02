<?php
    class conection{
        static public function conectar(){
            try{
                $conn = new PDO("mysql:host=bg5hkgpf7xqkv4sukieo-mysql.services.clever-cloud.com;dbname=bg5hkgpf7xqkv4sukieo", "ufmob2qfxcjv2h7y", "CrvkjMmwSBlHCmaspRKy", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                return $conn;
            }
            catch(PDOException $e){
                echo "conexcion fallida por: " . $e->getMessage();
            }
        }
    }
?>