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
                                                <br>            
                                                <img src="" style="display: none;" id="ImagenenModal" class="imagenNoticia" alt="">
                                                <button type="button" class="form-control btn btn-warning btn-lg" id="VerImagen">Imagen</button>
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
                    <!-- Modal "ver imagen" -->
                        <div class="modal fade" id="modalVerImagen">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header bg-secondary">
                                        <h4 class="modal-title">Alcance del medio</h4>
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
    <!-- Iniciar DataTable -->
        <script src="../../js/jQuery/dataTables/usuario/dataTableNoticias.js"></script>
    <!-- Filtros de busqueda -->
        <script src="../../js/jQuery/dataTables/filtroBusquedaDataTable/busquedaDataTableNoticias.js"></script>
    <!-- Descargar archivos adjuntos -->
        <script src="../../js/descarga/descargaArchivoNoticia.js"></script>
    <!-- Ver imagen de noticia -->
        <script src="../../js/jQuery/verImagen/verImagenNoticia.js"></script>
<!-- Fin Scripts Necesarios para funcionamiento --> 