$(function() {
  var donutChartCanvas = document.getElementById('ImpactoPositivoNegativoDonutChart').getContext('2d');
  var pieChartCanvas = document.getElementById('ImpactoPositivoNegativoPieChart').getContext('2d');

  var donutChart;
  var pieChart;

  // Función para generar colores de fondo aleatorios
  function generarColoresFondo(numColores) {
    var colores = [];
    for (var i = 0; i < numColores; i++) {
      var color = '#' + Math.floor(Math.random() * 16777215).toString(16);
      colores.push(color);
    }
    return colores;
  }

  // Función para actualizar los gráficos cuando cambien las fechas
  function actualizarGraficos() {
    // Obtener los valores de los campos de fecha
    var inicio = $('#inicioBusqueda').val();
    var fin = $('#finBusqueda').val();

    // Realizar solicitud AJAX al archivo PHP para obtener los datos
    $.ajax({
      url: '../../model/datosChart/ImpactoPositivoNegativoFechasMedios.php',
      type: 'GET',
      dataType: 'json',
      data: { inicio: inicio, fin: fin }, // Pasar los valores de fecha al archivo PHP
      success: function(data) {
        console.log(data);
        // Los datos se obtuvieron correctamente
          console.log(data);
        // Definir los colores para el gráfico de donut chart
        var positiveColor = '#00a65a'; // Verde
        var negativeColor = '#f56954'; // Rojo
        var neutralColor = '#808080'; // Gris

        // Arreglo de colores basado en los valores del gráfico de donut chart
        var backgroundColorsDonut = data.donutChart.labels.map(function(label) {
          if (label.toLowerCase() === 'positivo') {
            return positiveColor;
          } else if (label.toLowerCase() === 'negativo') {
            return negativeColor;
          } else if (label.toLowerCase() === 'neutro') {
            return neutralColor;
          }
        });

        // Generar colores de fondo aleatorios para el gráfico de pie chart
        var numColoresPie = data.pieChart.labels.length;
        var backgroundColorsPie = generarColoresFondo(numColoresPie);

        var chartDataDonut = {
          labels: data.donutChart.labels,
          datasets: [
            {
              data: data.donutChart.values,
              backgroundColor: backgroundColorsDonut,
            }
          ]
        };

        var chartDataPie = {
          labels: data.pieChart.labels,
          datasets: [
            {
              data: data.pieChart.values,
              backgroundColor: backgroundColorsPie,
            }
          ]
        };

        

        var chartOptions = {
          maintainAspectRatio: false,
          responsive: true,
        };

        // Destruir los gráficos existentes
        if (donutChart) {
          donutChart.destroy();
        }
        if (pieChart) {
          pieChart.destroy();
        }

        // Crear los nuevos gráficos de donut chart y pie chart con los nuevos datos
        donutChart = new Chart(donutChartCanvas, {
          type: 'doughnut',
          data: chartDataDonut,
          options: chartOptions
        });

        pieChart = new Chart(pieChartCanvas, {
          type: 'pie',
          data: chartDataPie,
          options: chartOptions
        });
      },
      error: function(xhr, status, error) {
        // Ocurrió un error al obtener los datos del archivo PHP
        console.error(error);
      }
    });
  }

  // Asignar el evento de cambio de valor a los campos de fecha
  $('#inicioBusqueda, #finBusqueda').change(function() {
    // Actualizar los gráficos
    actualizarGraficos();
  });

  // Inicializar los gráficos
  actualizarGraficos();
});
