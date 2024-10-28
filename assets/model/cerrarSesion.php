<?php
session_start();
session_destroy();
header("Location: ../../index.html?error=5");//avisar de cerrado de sesion exitoso
?>