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
                <!-- Boton añadir Medio -->
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center aling-items-center">
                            <button type="button" class="btn btn-app bg-success" id="abrirModalAñadirMedio">
                                <i class="fas fa-users"></i> Añadir Medio
                            </button>                        
                        </div>
                    </div>
                <!-- Modal "añadir medio" -->
                    <div class="modal fade" id="modalAñadirMedio">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h4 class="modal-title">Añadir Medio</h4>
                                    <button type="button" style="color: white;" class="close" id="cerrarModalAñadirMedio" onclick="limpiarInputsAñadirMedio()">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body bg-secondary ">
                                    <form id="formularioAñadirMedio">
                                        <div class="card-body row">
                                            <div class="col-12 form-group">
                                                <label for="AñadirNombreMedio">Nombre</label>
                                                <input type="text" name="NameAñadirNombreMedio" class="form-control" id="AñadirNombreMedio" placeholder="Ingrese el nombre del medio">
                                            </div>
                                            <div class="col-12 form-group">
                                                <label for="AñadirCategoriaMedio">Medio</label>
                                                <select class="custom-select" id="AñadirCategoriaMedio" name="NameAñadirCategoriaMedio">
                                                    <option value="" disabled selected hidden>Seleccione categoria del medio</option>
                                                    <option value="Radio">Radio</option>
                                                    <option value="Escrito">Escrito</option>
                                                    <option value="Digital">Digital</option>
                                                    <option value="Televisivo">Televisivo</option>
                                                    <option value="Otro">Otro</option>
                                                </select>
                                            </div>                                                
                                        </div>
                                        <div class="card-footer">
                                          <button type="submit" class="btn btn-primary mx-5 my-5" id="botonAñadirMedio">Guardar</button>
                                          <button type="button" class="btn btn-danger" id="botonLimpiarInputsAñadirMedio" onclick="limpiarInputsAñadirMedio()">Limpiar registro</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- Modal "editar medio" -->
                    <div class="modal fade" id="modalEditarMedio">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h4 class="modal-title">Editar Medio</h4>
                                    <button type="button" style="color: white;" class="close" id="cerrarModalEditarMedio">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body bg-secondary ">                
                                    <form id="formularioEditarMedio">
                                        <div class="card-body row">
                                            <div class="col-12 form-group">
                                                <label for="EditarNombreMedio">Nombre</label>
                                                <input type="text" name="NameEditarNombreMedio" class="form-control" id="EditarNombreMedio" placeholder="Ingrese el nombre del medio">
                                            </div>
                                            <div class="col-12 form-group">
                                                <label for="EditarCategoriaMedio">Medio</label>
                                                <select class="custom-select" id="EditarCategoriaMedio" name="NameEditarCategoriaMedio">
                                                    <option value="" disabled selected hidden>Seleccione categoria del medio</option>
                                                    <option value="Radio">Radio</option>
                                                    <option value="Escrito">Escrito</option>
                                                    <option value="Digital">Digital</option>
                                                    <option value="Televisivo">Televisivo</option>
                                                    <option value="Otro">Otro</option>
                                                </select>
                                            </div>   
                                            <input type="text" id="CodMedioParaEditar" style="display:none;">                                             
                                        </div>
                                        <div class="card-footer">
                                          <button type="submit" class="btn btn-primary mx-5 my-5" id="botonEditarMedio">Guardar</button>
                                          <button type="button" class="btn btn-danger" id="botonLimpiarInputsEditarMedio" onclick="limpiarInputsEditarMedio()">Limpiar registro</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
    <!-- Recursos necesarios para la validación de inputs -->
        <script src="../../js/jQuery/jquery.validate.min.js"></script>
        <script src="../../js/jQuery/additional-methods.min.js"></script>
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
    <!-- Script abrir/cerrar modales -->    
        <script src="../../js/jQuery/abrirCerrarModales/abrirCerrarModalesMedios.js"></script>
    <!-- Script para la validación de inputs de formularios -->
        <script src="../../js/validations/validacionMedios.js"></script>
    <!-- Script para limpiar campos de todos los Formularios de registro -->
        <script src="../../js/limpiarInputs/limpiarInputs.js"></script>
    <!-- Script para añadir medio -->
        <script src="../../js/jQuery/registroAjax/añadirMedio.js"></script>
    <!-- Script para editar medio -->
        <script src="../../js/jQuery/editarAjax/editarMedio.js"></script>
    <!-- Script para eliminar medio -->
        <script src="../../js/jQuery/eliminarAjax/eliminarMedio.js"></script>
    <!-- Iniciar DataTable -->
        <script src="../../js/jQuery/dataTables/dataTableMedios.js"></script>
    <!-- Filtros de busqueda -->
        <script src="../../js/jQuery/dataTables/filtroBusquedaDataTable/busquedaDataTableMedios.js"></script>
    <!-- Redireccionar a tabla agenda de medios -->
        <script src="../../js/jQuery/redirecciones/redireccionAgendaContactos.js"></script>
<!-- Fin Scripts Necesarios para funcionamiento -->                        