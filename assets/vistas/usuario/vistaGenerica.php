<?php
  header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
?>

<meta http-equiv="Expires" content="0">
<meta http-equiv="Last-Modified" content="0">
<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
<meta http-equiv="Pragma" content="no-cache">

<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="../../img/favicon.png" type="image/x-icon">

        <title>Pagina principal</title>    

        <!-- Estilos Necesarios -->
            
            <!-- Google Font: Source Sans Pro -->
                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">   
            <!-- Css DataTables -->                
                <link rel="stylesheet" href="../../css/dataTables/dataTables.bootstrap4.min.css">    
                <link rel="stylesheet" href="../../css/dataTables/responsive.bootstrap4.min.css">
                <link rel="stylesheet" href="../../css/dataTables/buttons.bootstrap4.min.css">
            <!-- Theme style -->
                <link rel="stylesheet" href="../../css/adminlte/adminlte.min.css">
            <!-- Correcciones del tema principal-->
                <link rel="stylesheet" href="../../css/adminlte/correcciones.css"> 
            <!--Swet Alert Estilos-->
                <link rel="stylesheet" href="../../css/sweetAlert2/sweetalert2.min.css">                  
            <!--Estilos para imagenes de noticia-->
                <link rel="stylesheet" href="../../css/estilosNoticia.css">                  
        
        <!-- Estilos Necesarios -->

        <!-- Scripts Necesarios -->
            <!-- jQuery -->
            <script src="../../js/jQuery/jquery-3.7.0.min.js"></script>
            <!-- Bootstrap 5.3 -->
                <script src="../../js/boostrap5/bootstrap.bundle.min.js"></script>
            <!-- Font Awsome -->
                <script src="https://kit.fontawesome.com/9de8b34569.js" crossorigin="anonymous"></script>            
            <!-- AdminLTE App -->
                <script src="../../js/adminlte/adminlte.min.js"></script>
            
            <!-- Recursos necesarios para Sweet Alert -->
                <script src="../../js/sweetAlertJS/sweetalert2.all.min.js"></script>
            <!-- Script avisos Sweet Alert -->
                <script src="../../js/sweetAlertJS/alertasSweeAlertFrontEnd.js"></script>
        <!-- Fin Scripts Necesarios -->
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper"><!-- Div que contiene todo -->
            <!-- Navbar -->
                <?php include "navbar.php"; ?>
            <!-- Fin navbar -->

            <!-- Contenedor Sidebar -->
                <?php include "aside.php"; ?>
            <!-- Fin contenedor Sidebar -->
  
            <!-- Contenedor de pagina Principal -->
                <div class="content-wrapper">                    
                    <?php include "controlImpacto.php"; ?>
                </div>
            <!-- Fin contenedor de pagina Principal -->

            <!-- Footer -->
                <?php include "footer.php"; ?>
            <!-- Fin footer -->
        </div>
    </body>
        <!-- Scripts Necesarios -->            
            <!-- Cargar paginas en vista generica -->    
                <script src="../../js/renders/renderPaginas.js"></script>
            <!-- Mostrar menu seleccionado -->    
                <script src="../../js/renders/selectorAside.js"></script>
        <!-- Fin Scripts Necesarios -->
        
</html>
