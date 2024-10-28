<div class="container-fluid">
    <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Contactos del Medio: <span style="color: red;"> <?php echo($_GET["NombreMedio"]); ?> </span></h1>
                    </div>                
                </div>
            </div>
        </div>
    <!-- Fin content-header -->

    <!-- Contenido principal -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Tarjeta colapsable con DataTable de Medios -->                
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Medios</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <table id="tablaAgendaContactos" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Cod Contacto</th>
                                                        <th>Cod Medio</th>
                                                        <th>Nombre</th>
                                                        <th>Telefono</th>
                                                        <th>Correo</th>
                                                        <th>Opciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody> 
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Cod Contacto</th>
                                                        <th>Cod Medio</th>
                                                        <th>Nombre</th>
                                                        <th>Telefono</th>
                                                        <th>Correo</th>
                                                        <th>Opciones</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                </div>
            </div>
        </div>
    <!-- Fin contenido principal -->
</div>

<!-- Scripts Necesarios para funcionamiento -->
    <!-- DataTables & plugins -->
        <script src="../../plugins/dataTables/jquery.dataTables.min.js"></script>
        <script src="../../plugins/dataTables/dataTables.bootstrap4.min.js"></script>
        <script src="../../plugins/dataTables/dataTables.responsive.min.js"></script>
        <script src="../../plugins/dataTables/responsive.bootstrap4.min.js"></script>
        <script src="../../plugins/dataTables/dataTables.buttons.min.js"></script>                
        <script src="../../plugins/dataTables/buttons.bootstrap4.min.js"></script>
        <script src="../../plugins/jzip/jszip.min.js"></script>                
        <script src="../../plugins/pdfMake/pdfmake.min.js"></script>
        <script src="../../plugins/pdfMake/vfs_fonts.js"></script>
        <script src="../../plugins/dataTables/buttons.html5.min.js"></script>
        <script src="../../plugins/dataTables/buttons.print.min.js"></script>
        <script src="../../plugins/dataTables/buttons.colVis.min.js"></script>
    <!-- Script para añadir contacto medio -->
        <script>
            var CodMedio = '<?php echo($_GET["CodMedio"]); ?> ';
        </script>
        <script src="../../js/jQuery/registroAjax/añadirContactoMedio.js"></script>
    <!-- Script para editar contacto medio -->
        <script src="../../js/jQuery/editarAjax/editarContactoMedio.js"></script>
    <!-- Script para eliminar contacto -->
        <script src="../../js/jQuery/eliminarAjax/eliminarContactoMedio.js"></script>
    <!-- Iniciar DataTable -->
        <script src="../../js/jQuery/dataTables/usuario/dataTableAgendaMedios.js"></script>
<!-- Fin Scripts Necesarios para funcionamiento -->                          