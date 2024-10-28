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
                    <!-- Boton añadir Contacto -->
                        <div class="col-12 d-flex justify-content-center aling-items-center">
                            <button type="button" class="btn btn-app bg-success" id="abrirModalAñadirContacto">
                                <i class="fas fa-users"></i> Añadir contacto
                            </button>                        
                        </div>
                    <!-- Modal "añadir contacto" -->
                        <div class="modal fade" id="modalAñadirContacto">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h4 class="modal-title">Añadir contacto</h4>
                                        <button type="button" style="color: white;" class="close" id="cerrarModalAñadirContacto" onclick="limpiarInputsAñadirContacto()">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body bg-secondary ">
                                        <form id="formularioAñadirContacto">
                                            <div class="card-body row">
                                                <div class="col-sm-12 col-lg-3 col-md-4 form-group">
                                                    <label for="AñadirNombreContacto">Nombre</label>
                                                    <input type="text" name="NameAñadirNombreContacto" class="form-control" id="AñadirNombreContacto" placeholder="Ingrese el nombre del contacto">
                                                </div>
                                                <div class="col-sm-12 col-lg-3 col-md-4 form-group">
                                                    <label for="AñadirTelefonoContacto">Telefono</label>
                                                    <input type="number" name="NameAñadirTelefonoContacto" class="form-control" id="AñadirTelefonoContacto" placeholder="Ingrese el telefono del contacto">
                                                </div>
                                                <div class="col-sm-12 col-lg-3 col-md-4 form-group">
                                                    <label for="AñadirCorreoContacto">Correo</label>
                                                    <input type="email" name="NameAñadirCorreoContacto" class="form-control" id="AñadirCorreoContacto" placeholder="Ingrese el correo del contacto">
                                                </div>                                      
                                            </div>
                                            <div class="card-footer">
                                              <button type="submit" class="btn btn-primary mx-5 my-5" id="botonAñadirContacto">Guardar</button>
                                              <button type="button" class="btn btn-danger" id="botonLimpiarInputsAñadirContacto" onclick="limpiarInputsAñadirContacto()">Limpiar registro</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- Modal "editar contacto" -->
                        <div class="modal fade" id="modalEditarContacto">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h4 class="modal-title">Editar contacto</h4>
                                        <button type="button" style="color: white;" class="close" id="cerrarModalEditarContacto">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body bg-secondary ">
                                        <form id="formularioEditarContacto">
                                            <input type="text" id="CodContactoEditarContacto" style="display: none;">
                                            <div class="card-body row">
                                                <div class="col-sm-12 col-lg-3 col-md-4 form-group">
                                                    <label for="EditarNombreContacto">Nombre</label>
                                                    <input type="text" name="NameEditarNombreContacto" class="form-control" id="EditarNombreContacto" placeholder="Ingrese el nombre del contacto">
                                                </div>
                                                <div class="col-sm-12 col-lg-3 col-md-4 form-group">
                                                    <label for="EditarTelefonoContacto">Telefono</label>
                                                    <input type="number" name="NameEditarTelefonoContacto" class="form-control" id="EditarTelefonoContacto" placeholder="Ingrese el telefono del contacto">
                                                </div>
                                                <div class="col-sm-12 col-lg-3 col-md-4 form-group">
                                                    <label for="EditarCorreoContacto">Correo</label>
                                                    <input type="email" name="NameEditarCorreoContacto" class="form-control" id="EditarCorreoContacto" placeholder="Ingrese el correo del contacto">
                                                </div>                                      
                                            </div>
                                            <div class="card-footer">
                                              <button type="submit" class="btn btn-primary mx-5 my-5" id="botonEditarContacto">Guardar</button>
                                              <button type="button" class="btn btn-danger" id="botonLimpiarInputsEditarContacto" onclick="limpiarInputsEditarContacto()">Limpiar registro</button>
                                            </div>
                                        </form>
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
        <script src="../../js/jQuery/abrirCerrarModales/abrirCerrarModalesContactosMedios.js"></script>
    <!-- Script para la validación de inputs de formularios -->
        <script src="../../js/validations/validacionContactosMedios.js"></script>
    <!-- Script para limpiar campos de todos los Formularios de registro -->
        <script src="../../js/limpiarInputs/limpiarInputs.js"></script>
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
        <script src="../../js/jQuery/dataTables/dataTableAgendaMedios.js"></script>
<!-- Fin Scripts Necesarios para funcionamiento -->                          