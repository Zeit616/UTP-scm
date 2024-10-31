$(document).ready(function () {

    function fetchChartData() {
        var barChartCanvas = $('#ImpactoAnualPositivoNegativoBarChart').get(0).getContext('2d');
  
        // Obtener fechas de inicio y fin desde los inputs
        var inicio = $('#inicioBusqueda').val();
        var fin = $('#finBusqueda').val();
  
        // Realizar solicitud AJAX al archivo PHP con las fechas como parámetros
        $.ajax({
            url: '../../model/datosChart/impactoAnualPositivoNegativo.php',
            type: 'GET',
            dataType: 'json',
            data: {
                inicioBusqueda: inicio,
                finBusqueda: fin
            },
            success: function (data) {
                console.log(data);
                // Los datos se han recuperado exitosamente
                var barChartData = {
                    labels: data.labels,
                    datasets: [
                        {
                            label: 'Positivo',
                            backgroundColor: 'rgba(58, 255, 0, 0.8)',
                            borderColor: 'rgba(58, 255, 0, 0.8)',
                            data: data.positivo
                        },
                        {
                            label: 'Negativo',
                            backgroundColor: 'rgba(255, 0, 0, 0.8)',
                            borderColor: 'rgba(255, 0, 0, 0.8)',
                            data: data.negativo
                        },
                        {
                            label: 'Neutro',
                            backgroundColor: 'rgba(128, 128, 128, 0.8)',
                            borderColor: 'rgba(128, 128, 128, 0.8)',
                            data: data.neutro
                        },
                    ]
                };
      
                var barChartOptions = {
                    responsive: true,
                    maintainAspectRatio: false,
                    datasetFill: false,
                    scales: {
                        x: {
                            stacked: true,
                            ticks: {
                                autoSkip: true,
                                maxTicksLimit: 12
                            }
                        }
                    }
                };
      
                new Chart(barChartCanvas, {
                    type: 'bar',
                    data: barChartData,
                    options: barChartOptions
                });
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }
  
    // Llama a fetchChartData() cuando se cargue la página
    fetchChartData();
  
    // Agrega un evento change a los inputs para que llamen a fetchChartData() cuando cambien
    $('#inicioBusqueda, #finBusqueda').change(function () {
        fetchChartData();
    });
  
    // Actualiza cada 10 segundos (10000 milisegundos)
    setInterval(fetchChartData, 10000); 
  });
  