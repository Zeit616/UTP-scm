<div class="container-fluid">
    <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Usuarios</h1>
                    </div>                
                </div>
            </div>
        </div>
    <!-- Fin content-header -->

    <!-- Contenido principal -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Boton añadir Usuario -->
                        <div class="col-12 d-flex justify-content-center aling-items-center">
                            <button type="button" class="btn btn-app bg-success" id="abrirModalAñadirUsuario">
                                <i class="fas fa-users"></i> Añadir Usuario
                            </button>                        
                        </div>
                    <!-- Modal "añadir Usuario" -->
                        <div class="modal fade" id="modalAñadirUsuario">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h4 class="modal-title">Añadir Usuario</h4>
                                        <button type="button" style="color: white;" class="close" id="cerrarModalAñadirUsuario" onclick="limpiarInputsAñadirUsuario()">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body bg-secondary ">
                                        <form id="formularioAñadirUsuario">
                                            <div class="card-body row">
                                                <div class="col-sm-12 col-md-6 col-lg-4 form-group">
                                                    <label for="AñadirNombreUsuario">Nombre</label>
                                                    <input type="text" name="NameAñadirNombreUsuario" class="form-control" id="AñadirNombreUsuario" placeholder="Ingrese el nombre completo">
                                                </div>                                                
                                                <div class="col-sm-12 col-md-6 col-lg-4 form-group">
                                                    <label for="AñadirContraseña">Contraseña</label>
                                                    <input type="text" name="NameAñadirContraseña" class="form-control" id="AñadirContraseña" placeholder="Ingrese la contraseña">
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-4 form-group">
                                                    <label for="AñadirRolUsuario">Rol</label>
                                                    <select class="custom-select" id="AñadirRolUsuario" name="NameAñadirRolUsuario">
                                                        <option value="" disabled selected hidden>Seleccione el rol del usuario</option>
                                                        <option value="Periodista">Periodista</option>
                                                        <option value="Usuario">Usuario</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                              <button type="submit" class="btn btn-primary mx-5 my-5" id="botonAñadirUsuario">Guardar</button>
                                              <button type="button" class="btn btn-danger" id="botonLimpiarInputsAñadirUsuario" onclick="limpiarInputsAñadirUsuario()">Limpiar registro</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- Modal "editar Usuario" -->
                        <div class="modal fade" id="modalEditarUsuario">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h4 class="modal-title">Editar Usuario</h4>
                                        <button type="button" style="color: white;" class="close" id="cerrarModalEditarUsuario" onclick="limpiarInputsEditarUsuario()">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body bg-secondary ">
                                        <form id="formularioEditarUsuario">
                                            <input type="text" style="display: none;" id="EditarIdUsuario">
                                            <div class="card-body row">
                                                <div class="col-sm-12 col-md-6 col-lg-4 form-group">
                                                    <label for="EditarNombreUsuario">Nombre</label>
                                                    <input type="text" name="NameEditarNombreUsuario" class="form-control" id="EditarNombreUsuario" placeholder="Ingrese el nombre completo">
                                                </div>                                                
                                                <div class="col-sm-12 col-md-6 col-lg-4 form-group">
                                                    <label for="EditarContraseña">Contraseña</label>
                                                    <input type="text" name="NameEditarContraseña" class="form-control" id="EditarContraseña" placeholder="Ingrese la contraseña">
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-4 form-group">
                                                    <label for="EditarRolUsuario">Rol</label>
                                                    <select class="custom-select" id="EditarRolUsuario" name="NameEditarRolUsuario">
                                                        <option value="" disabled selected hidden>Seleccione el rol del usuario</option>
                                                        <option value="Periodista">Periodista</option>
                                                        <option value="Usuario">Usuario</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-4 form-group">
                                                    <label for="EditarEstadoUsuario">Estado</label>
                                                    <select class="custom-select" id="EditarEstadoUsuario" name="NameEditarEstadoUsuario">
                                                        <option value="" disabled selected hidden>Seleccione el estado del usuario</option>
                                                        <option value="Activado">Activado</option>
                                                        <option value="Inactivo">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                              <button type="submit" class="btn btn-primary mx-5 my-5" id="botonEditarUsuario">Guardar</button>
                                              <button type="button" class="btn btn-danger" id="botonLimpiarInputsEditarUsuario" onclick="limpiarInputsEditarUsuario()">Limpiar registro</button>
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
                                            <label for="BuscarUsuario" class="form-label">Usuario</label>
                                            <input type="text" class="form-control" id="BuscarUsuario" data-index = "2">
                                        </div>                                        
                                        <div class="col-lg-6 col-md-12">
                                            <label for="BuscarRol" class="form-label">Rol</label>
                                            <select class="custom-select" id="BuscarRol" data-index = "4">
                                                <option value="" selected>Seleccione rol del usuario</option>
                                                <option value="Periodista">Periodista</option>
                                                <option value="Usuario">Usuario</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <label for="BuscarEstado" class="form-label">Estado</label>
                                            <select class="custom-select" id="BuscarEstado" data-index = "5">
                                                <option value="" selected>Seleccione estado del usuario</option>
                                                <option value="Activado">Activado</option>
                                                <option value="Inactivo">Inactivo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- Tarjeta colapsable con DataTable de usuarios -->                
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Usuarios</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">                                        
                                            <table id="tablaUsuarios" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Nombre completo</th>
                                                        <th>Usuario</th>
                                                        <th>Contraseña</th>
                                                        <th>Rol</th>
                                                        <th>Estado</th>
                                                        <th>Opciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Nombre completo</th>
                                                        <th>Usuario</th>
                                                        <th>Contraseña</th>
                                                        <th>Rol</th>
                                                        <th>Estado</th>
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
        <script src="../../js/jQuery/abrirCerrarModales/abrirCerrarModalesUsuarios.js"></script>
    <!-- Script para la validación de inputs de formularios -->
        <script src="../../js/validations/validacionUsuarios.js"></script>
    <!-- Script para limpiar campos de todos los Formularios de registro -->
        <script src="../../js/limpiarInputs/limpiarInputs.js"></script>
    <!-- Script para añadir usuario -->
        <script src="../../js/jQuery/registroAjax/añadirUsuario.js"></script>
    <!-- Script para editar usuario -->
        <script src="../../js/jQuery/editarAjax/editarUsuario.js"></script>
    <!-- Script para eliminar usuario -->
        <script src="../../js/jQuery/eliminarAjax/eliminarUsuario.js"></script>
    <!-- Iniciar DataTable -->
        <script src="../../js/jQuery/dataTables/dataTableUsuarios.js"></script>
    <!-- Filtros de busqueda -->
        <script src="../../js/jQuery/dataTables/filtroBusquedaDataTable/busquedaDataTableUsuarios.js"></script>
<!-- Fin Scripts Necesarios para funcionamiento -->                        