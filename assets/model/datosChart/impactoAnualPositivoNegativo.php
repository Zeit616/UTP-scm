<?php
require_once "../conexcionDataBase.php";

// Obtener fechas desde los parámetros GET
$inicioBusqueda = isset($_GET['inicioBusqueda']) ? $_GET['inicioBusqueda'] : null;
$finBusqueda = isset($_GET['finBusqueda']) ? $_GET['finBusqueda'] : null;

// Establecer consulta SQL base
if ($inicioBusqueda && $finBusqueda) {
    // Si se proporcionan fechas, filtrar por rango de fechas
    $stmt = conection::conectar()->prepare("SELECT FechaNoticia, Impacto FROM noticia WHERE FechaNoticia BETWEEN :inicio AND :fin");
    $stmt->bindParam(':inicio', $inicioBusqueda);
    $stmt->bindParam(':fin', $finBusqueda);
} else {
    // Si no se proporcionan fechas, obtener datos para todo el año actual
    $currentYear = date('Y');
    $stmt = conection::conectar()->prepare("SELECT FechaNoticia, Impacto FROM noticia WHERE YEAR(FechaNoticia) = :currentYear");
    $stmt->bindParam(':currentYear', $currentYear);
}

$stmt->execute();

$monthlyData = array(); // Arreglo para almacenar los datos agrupados por mes

// Verificar si hay resultados y extraer los datos
if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $fecha = new DateTime($row["FechaNoticia"]);
        $mes = $fecha->format('n'); // Obtener el número del mes sin ceros iniciales

        // Verificar el valor de "impacto" y aumentar la cuenta correspondiente para el mes actual
        if ($row["Impacto"] == "Positivo") {
            if (!isset($monthlyData[$mes])) {
                $monthlyData[$mes] = array(
                    'positivo' => 1,
                    'negativo' => 0,
                    'neutro' => 0
                );
            } else {
                $monthlyData[$mes]['positivo']++;
            }
        } elseif ($row["Impacto"] == "Negativo") {
            if (!isset($monthlyData[$mes])) {
                $monthlyData[$mes] = array(
                    'positivo' => 0,
                    'negativo' => 1,
                    'neutro' => 0
                );
            } else {
                $monthlyData[$mes]['negativo']++;
            }
        } elseif ($row["Impacto"] == "Neutro") {
            if (!isset($monthlyData[$mes])) {
                $monthlyData[$mes] = array(
                    'positivo' => 0,
                    'negativo' => 0,
                    'neutro' => 1
                );
            } else {
                $monthlyData[$mes]['neutro']++;
            }
        }
    }
}

// Nombres de los meses en español
$meses = array(
    'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
    'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
);

// Preparar los datos para el gráfico de barras en Chart.js
$labels = array();
$positivo = array();
$negativo = array();
$neutro = array();

// Ordenar los meses en orden ascendente
ksort($monthlyData);

foreach ($monthlyData as $mes => $data) {
    $nombreMes = $meses[$mes - 1]; // Obtener el nombre del mes en español
    $labels[] = $nombreMes;
    $positivo[] = $data['positivo'];
    $negativo[] = $data['negativo'];
    $neutro[] = $data['neutro'];
}

$data = array(
    'labels' => $labels,
    'positivo' => $positivo,
    'negativo' => $negativo,
    'neutro' => $neutro
);

// Convertir el arreglo a formato JSON y enviarlo como respuesta
header('Content-Type: application/json');
echo json_encode($data);
?>
