<div class="container-fluid">
    <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Medios</h1>
                    </div>                
                </div>
            </div>
        </div>
    <!-- Fin content-header -->
        
    <!-- Contenido principal -->
        <div class="content">
            <div class="container-fluid">
                <!-- Tarjeta colapsable de filtrar búsqueda -->                
                    <div class="col-12">
                        <div class="card card-primary collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title">Filtros de búsqueda</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <label for="BuscarNombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="BuscarNombre" data-index = "1">
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <label for="BuscarCategoria" class="form-label">Categoria</label>
                                        <select class="custom-select" id="BuscarCategoria" data-index = "2">
                                            <option value="" selected>Seleccione categoria del medio</option>
                                            <option value="Radio">Radio</option>
                                            <option value="Escrito">Escrito</option>
                                            <option value="Digital">Digital</option>
                                            <option value="Televisivo">Televisivo</option>
                                            <option value="Otro">Otro</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                        <table id="tablaMedios" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Cod Medio</th>
                                                    <th>Nombre</th>
                                                    <th>Categoria</th>
                                                    <th>Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Cod Medio</th>
                                                    <th>Nombre</th>
                                                    <th>Categoria</th>
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
    <!-- Iniciar DataTable -->
        <script src="../../js/jQuery/dataTables/usuario/dataTableMedios.js"></script>
    <!-- Filtros de busqueda -->
        <script src="../../js/jQuery/dataTables/filtroBusquedaDataTable/busquedaDataTableMedios.js"></script>
    <!-- Redireccionar a tabla agenda de medios -->
        <script src="../../js/jQuery/redirecciones/redireccionAgendaContactos.js"></script>
<!-- Fin Scripts Necesarios para funcionamiento -->                        