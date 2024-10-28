<div class="container-fluid">
    <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Monitoreo</h1>
                    </div>                
                </div>
            </div>
        </div>
    <!-- Fin content-header -->

    <!-- Contenido principal -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Boton añadir noticia -->
                        <div class="col-12 d-flex justify-content-center aling-items-center">
                            <button type="button" class="btn btn-app bg-success" id="abrirModalAñadirNoticia">
                                <i class="fas fa-users"></i> Añadir noticia
                            </button>                        
                        </div>
                    <!-- Modal "añadir noticia" -->
                    <div class="modal fade" id="modalAñadirNoticia">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h4 class="modal-title">Añadir noticia</h4>
                                        <button type="button" style="color: white;" class="close" id="cerrarModalAñadirNoticia" onclick="limpiarInputsAñadirNoticia()">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body bg-secondary ">
                                        <form id="formularioAñadirNoticia" enctype="multipart/form-data">
                                            <div class="card-body row">
                                                <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                    <label for="AñadirFechaNoticia">Fecha de la noticia</label>
                                                    <input type="date" name="NameAñadirFechaNoticia" class="form-control" id="AñadirFechaNoticia" placeholder="Ingrese la fecha de la noticia">
                                                </div>
                                                <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                    <label for="AñadirMedioNoticia" class="form-label">Medio</label>
                                                    <select class="custom-select" id="AñadirMedioNoticia" name="NameAñadirMedioNoticia">

                                                    </select>  
                                                </div>
                                                <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                    <label for="AñadirTitular">Titular</label>
                                                    <input type="text" name="NameAñadirTitular" class="form-control" id="AñadirTitular" placeholder="Ingrese el titular">
                                                </div>
                                                <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                    <label for="AñadirImagen">Alcance del medio</label>
                                                    <input type="file" name="NameImagen" class="form-control" id="AñadirImagen">
                                                </div>
                                                <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                    <label for="AñadirEspacio">Espacio</label>
                                                    <textarea class="text-area form-control" name="NameAñadirEspacio" id="AñadirEspacio" cols="10" rows="10"></textarea>
                                                </div>
                                                <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                    <label for="AñadirPeriodista">Periodista</label>
                                                    <input type="text" name="NameAñadirPeriodista" class="form-control" id="AñadirPeriodista" placeholder="Ingrese el nombre del periodista">
                                                </div>
                                                <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                    <label for="AñadirImpacto" class="form-label">Impacto</label>
                                                    <select class="custom-select" id="AñadirImpacto" name="NameAñadirImpacto">
                                                        <option value="" disabled selected hidden>Seleccione el impacto de la noticia</option>
                                                        <option value="Positivo">Positivo</option>
                                                        <option value="Neutro">Neutro</option>
                                                        <option value="Negativo">Negativo</option>                                                        
                                                    </select>  
                                                </div>
                                                <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                    <label for="AñadirComentario">Comentarios del articulo</label>
                                                    <textarea class="text-area form-control" name="NameAñadirComentario" id="AñadirComentario" cols="10" rows="10"></textarea>
                                                </div>
                                                <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                    <label for="AñadirRecomendaciones">Recomendaciones del articulo</label>
                                                    <textarea class="text-area form-control" name="NameAñadirRecomendaciones" id="AñadirRecomendaciones" cols="10" rows="10"></textarea>
                                                </div>
                                                <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                    <label for="AñadirFuente">Fuente de la noticia</label>
                                                    <input type="text" name="NameAñadirFuente" class="form-control" id="AñadirFuente" placeholder="Ingrese la fuente de la noticia (url)">
                                                </div>
                                                <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                    <label for="AñadirArchivoAdjunto">Archivo adjunto</label>
                                                    <input type="file" name="NameArchivoAdjunto" class="form-control" id="AñadirArchivoAdjunto">
                                                </div>
                                                <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                    <label for="AñadirEnlaceAdicional">Fuentes adicionales</label>
                                                    <input type="text" name="NameAñadirEnlaceAdicional" class="form-control" id="AñadirEnlaceAdicional" placeholder="Ingrese un enlace adicional si el archivo es mayor a 10 mb (url)">
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                              <button type="submit" class="btn btn-primary mx-5 my-5" id="botonAñadirNoticia">Guardar</button>
                                              <button type="button" class="btn btn-danger" id="botonLimpiarInputsAñadirNoticia" onclick="limpiarInputsAñadirNoticia()">Limpiar registro</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    <!-- Modal "editar noticia" -->
                    <div class="modal fade" id="modalEditarNoticia">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h4 class="modal-title">Editar noticia</h4>
                                        <button type="button" style="color: white;" class="close" id="cerrarModalEditarNoticia" onclick="limpiarInputsEditarNoticia()">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body bg-secondary ">
                                        <form id="formularioEditarNoticia" enctype="multipart/form-data">
                                            <div class="card-body row">
                                                <input type="text" id="CodNoticiaEditar" style="display: none;">
                                                <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                    <label for="EditarFechaNoticia">Fecha de la noticia</label>
                                                    <input type="date" name="NameEditarFechaNoticia" class="form-control" id="EditarFechaNoticia" placeholder="Ingrese la fecha de la noticia">
                                                </div>
                                                <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                    <label for="EditarMedioNoticia" class="form-label">Medio</label>
                                                    <select class="custom-select" id="EditarMedioNoticia" name="NameEditarMedioNoticia">
                                                    </select>  
                                                </div>
                                                <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                    <label for="EditarTitular">Titular</label>
                                                    <input type="text" name="NameEditarTitular" class="form-control" id="EditarTitular" placeholder="Ingrese el titular">
                                                </div>
                                                <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                    <label for="EditarImagen">Alcance del medio</label>
                                                    <input type="file" name="NameEditarImagen" class="form-control" id="EditarImagen">
                                                </div>
                                                <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                    <label for="EditarEspacio">Espacio</label>
                                                    <textarea class="text-area form-control" name="NameEditarEspacio" id="EditarEspacio" cols="10" rows="10"></textarea>
                                                </div>
                                                <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                    <label for="EditarPeriodista">Periodista</label>
                                                    <input type="text" name="NameEditarPeriodista" class="form-control" id="EditarPeriodista" placeholder="Ingrese el nombre del periodista">
                                                </div>
                                                <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                    <label for="EditarImpacto" class="form-label">Impacto</label>
                                                    <select class="custom-select" id="EditarImpacto" name="NameEditarImpacto">
                                                        <option value="" disabled selected hidden>Seleccione el impacto de la noticia</option>
                                                        <option value="Positivo">Positivo</option>
                                                        <option value="Neutro">Neutro</option>
                                                        <option value="Negativo">Negativo</option>                                                        
                                                    </select>  
                                                </div>
                                                <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                    <label for="EditarComentario">Comentarios del articulo</label>
                                                    <textarea class="text-area form-control" name="NameEditarComentario" id="EditarComentario" cols="10" rows="10"></textarea>
                                                </div>
                                                <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                    <label for="EditarRecomendaciones">Recomendaciones del articulo</label>
                                                    <textarea class="text-area form-control" name="NameEditarRecomendaciones" id="EditarRecomendaciones" cols="10" rows="10"></textarea>
                                                </div>
                                                <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                    <label for="EditarFuente">Fuente de la noticia</label>
                                                    <input type="text" name="NameEditarFuente" class="form-control" id="EditarFuente" placeholder="Ingrese la fuente de la noticia">
                                                </div>
                                                <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                    <label for="EditarArchivoAdjunto">Archivo adjunto</label>
                                                    <input type="file" name="NameArchivoAdjunto" class="form-control" id="EditarArchivoAdjunto">
                                                </div>
                                                <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                    <label for="EditarEnlaceAdicional">Fuentes adicionales</label>
                                                    <input type="text" name="NameEditarEnlaceAdicional" class="form-control" id="EditarEnlaceAdicional" placeholder="Ingrese un enlace adicional si el archivo es mayor a 10 mb">
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                              <button type="submit" class="btn btn-primary mx-5 my-5" id="botonEditarNoticia">Guardar</button>
                                              <button type="button" class="btn btn-danger" id="botonLimpiarInputsEditarNoticia" onclick="limpiarInputsEditarNoticia()">Limpiar registro</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- Modal "ver noticia" -->
                     <div class="modal fade" id="modalVerNoticia">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h4 class="modal-title" id="tituloDelModal"></h4>
                                        <button type="button" style="color: white;" class="close" id="cerrarModalVerNoticia">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body bg-secondary ">                                    
                                        <div class="card-body row">
                                            <input type="text" id="CodNoticiaPoint" disabled style="display: none;">
                                            <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                <label for="VerFechaNoticia" class="form-label">Fecha de la noticia</label>
                                                <input type="date" class="form-control" id="VerFechaNoticia" disabled>
                                            </div>
                                            <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                <label for="VerTipoMedioNoticia" class="form-label">Medio</label>
                                                <input type="text" class="form-control" id="VerTipoMedioNoticia" disabled>
                                            </div>
                                            <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                <label for="VerTitularNoticia">Titular</label>
                                                <input type="text" class="form-control" id="VerTitularNoticia" disabled>
                                            </div>
                                            <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                <label for="VerImagen">Imagen</label>                     
                                                <img src="" style="display: none;" id="ImagenenModal" class="imagenNoticia" alt="">                           
                                                <button type="button" class="form-control btn btn-warning btn-lg" id="VerImagen">Ver imagen</button>
                                            </div>
                                            <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                <label for="VerEspacioNoticia">Espacio</label>
                                                <textarea class="text-area form-control" id="VerEspacioNoticia" cols="10" rows="10" disabled></textarea>
                                            </div>
                                            <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                <label for="VerPeriodistaNoticia">Periodista</label>
                                                <input type="text" class="form-control" id="VerPeriodistaNoticia" disabled>
                                            </div>
                                            <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                <label for="VerImpactoNoticia" class="form-label">Impacto</label>
                                                <input type="text" class="form-control" id="VerImpactoNoticia" disabled>                                                
                                            </div>
                                            <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                <label for="VerComentarioNoticia">Comentarios del articulo</label>
                                                <textarea class="text-area form-control" id="VerComentarioNoticia" cols="10" rows="10" disabled></textarea>
                                            </div>
                                            <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                <label for="VerRecomendacionesNoticia">Recomendaciones del articulo</label>
                                                <textarea class="text-area form-control" id="VerRecomendacionesNoticia" cols="10" rows="10" disabled></textarea>
                                            </div>
                                            <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                <label for="VerFuenteNoticia">Fuente de la noticia</label>
                                                <input type="text" class="form-control" id="VerFuenteNoticia" disabled>
                                            </div>
                                            <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                <label for="DescargarArchivoAdjunto">Archivo adjunto</label>
                                                <input type="text" id="idCodigoDescargar" style="display: none;" disabled>
                                                <button type="submit" class="form-control btn btn-success btn-lg" id="DescargarArchivoAdjunto">Archivo adjunto</button>
                                            </div>
                                            <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                                <label for="VerFuentesAdicionalesNoticia">Fuentes adicionales</label>
                                                <input type="text" class="form-control" id="VerFuentesAdicionalesNoticia" disabled>
                                            </div>
                                        </div>                                            
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
                                        <div class="coll-lg-4 col-md-6 col-sm-12 form-group">
                                            <label for="BuscarMedioNoticia" class="form-label">Medio</label>
                                            <select class="custom-select" id="BuscarMedioNoticia" name="NameBuscarMedioNoticia" data-index="2">
                                            </select>  
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <label for="BuscarTitular" class="form-label">Titular</label>
                                            <input type="text" class="form-control" id="BuscarTitular" data-index = "3">
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <label for="BuscarImpacto" class="form-label">Impacto</label>
                                            <select class="custom-select" id="BuscarImpacto" data-index = "4">
                                                <option value="" selected>Seleccione impacto del usuario</option>
                                                <option value="Positivo">Positivo</option>
                                                <option value="Neutro">Neutro</option>
                                                <option value="Negativo">Negativo</option>
                                            </select>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- Modal "ver imagen" -->
                        <div class="modal fade" id="modalVerImagen">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header bg-secondary">
                                        <h4 class="modal-title">Imagen</h4>
                                        <button type="button" style="color: white;" class="close" id="cerrarModalVerImagen">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body bg-secondary d-flex justify-content-center">
                                        <img src="" style="display: none;" class="imagenNoticia" id="Imagen" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- Tarjeta colapsable con DataTable de Medios -->                
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Noticias</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">                                        
                                            <table id="tablaNoticias" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Cod Noticia</th>
                                                        <th>Fecha</th>
                                                        <th>Medio</th>
                                                        <th>Titular</th>
                                                        <th>Espacio</th>
                                                        <th>Periodista</th>
                                                        <th>Impacto</th>
                                                        <th>Comentarios</th>
                                                        <th>Recomendaciones</th>
                                                        <th>Fuente</th>
                                                        <th>Archivo adjunto</th>
                                                        <th>Enlace adicional</th>
                                                        <th>Opciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Cod Noticia</th>
                                                        <th>Fecha</th>
                                                        <th>Medio</th>
                                                        <th>Titular</th>
                                                        <th>Espacio</th>
                                                        <th>Periodista</th>
                                                        <th>Impacto</th>
                                                        <th>Comentarios</th>
                                                        <th>Recomendaciones</th>
                                                        <th>Fuente</th>
                                                        <th>Archivo adjunto</th>
                                                        <th>Enlace adicional</th>
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
    <!-- Script renderizar select -->    
        <script src="../../js/jQuery/selectAjax/selectAjaxNoticia.js"></script>
    <!-- Script abrir/cerrar modales -->    
        <script src="../../js/jQuery/abrirCerrarModales/abrirCerrarModalesNoticias.js"></script>
    <!-- Script para la validación de inputs de formularios -->
        <script src="../../js/validations/validacionNoticia.js"></script>
    <!-- Script para limpiar campos de todos los Formularios de registro -->
        <script src="../../js/limpiarInputs/limpiarInputs.js"></script>
    <!-- Script para añadir usuario -->
        <script src="../../js/jQuery/registroAjax/añadirNoticia.js"></script>
    <!-- Script para editar usuario -->
        <script src="../../js/jQuery/editarAjax/editarNoticia.js"></script>
    <!-- Script para eliminar usuario -->
        <script src="../../js/jQuery/eliminarAjax/eliminarNoticia.js"></script>
    <!-- Iniciar DataTable -->
        <script src="../../js/jQuery/dataTables/dataTableNoticias.js"></script>
    <!-- Filtros de busqueda -->
        <script src="../../js/jQuery/dataTables/filtroBusquedaDataTable/busquedaDataTableNoticias.js"></script>
    <!-- Descargar archivos adjuntos -->
        <script src="../../js/descarga/descargaArchivoNoticia.js"></script>
    <!-- Ver imagen de noticia -->
        <script src="../../js/jQuery/verImagen/verImagenNoticia.js"></script>
<!-- Fin Scripts Necesarios para funcionamiento --> 