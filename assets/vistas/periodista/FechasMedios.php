<div class="container-fluid">
    <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Fechas y Medios</h1>
                    </div>                
                </div>
            </div>
        </div>
    <!-- Fin content-header -->

    <!-- Contenido principal -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Tarjeta colapsable de filtrar búsqueda -->                
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Filtro de Fecha X Medio</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Filtros de búsqueda -->
                                            <div class="col-lg-6 col-md-12">
                                                <label for="inicioBusqueda" class="form-label">Desde</label>
                                                <input type="date" class="form-control" id="inicioBusqueda">
                                            </div> 
                                            <div class="col-lg-6 col-md-12">
                                                <label for="finBusqueda" class="form-label">Hasta</label>
                                                <input type="date" class="form-control" id="finBusqueda">
                                            </div>                  
                                        <!-- Grafico de dona Impacto -->
                                            <div class="col-md-12 col-lg-6 my-4">
                                              <div class="card card-success">
                                                <div class="card-header">
                                                  <h3 class="card-title">Impacto</h3>            
                                                  <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                                      <i class="fas fa-expand"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                      <i class="fas fa-minus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                      <i class="fas fa-times"></i>
                                                    </button>
                                                  </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="chart">
                                                        <canvas id="ImpactoPositivoNegativoDonutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                        <!-- Grafico de pastel de medios -->
                                            <div class="col-md-12 col-lg-6 my-4">
                                              <div class="card card-success">
                                                <div class="card-header">
                                                  <h3 class="card-title">Medios</h3>            
                                                  <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                                      <i class="fas fa-expand"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                      <i class="fas fa-minus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                      <i class="fas fa-times"></i>
                                                    </button>
                                                  </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="chart">
                                                        <canvas id="ImpactoPositivoNegativoPieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                        <!-- Grafico de pastel de tipos medios -->
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
    <!-- Script Recursos necesarios para los chart -->
        <script src="../../plugins/charts/Chart.min.js"></script>
    <!-- Script renderizado de Charts -->
        <script src="../../plugins/charts/renderChartsFechaMedios.js"></script>
<!-- Fin Scripts Necesarios para funcionamiento -->                        