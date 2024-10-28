<?php
require_once "../conexcionDataBase.php";

$inicio = $_GET['inicio'];
$fin = $_GET['fin'];

// Consulta SQL base para el gráfico de donut chart
$sqlDonut = "SELECT Impacto, COUNT(*) AS total FROM noticia";

// Consulta SQL base para el gráfico de pie chart
$sqlPie = "SELECT Medio, COUNT(*) AS total FROM noticia";

// Verificar si los valores de inicio y fin no están vacíos
if (!empty($inicio) && !empty($fin)) {
    // Agregar la cláusula WHERE para filtrar por fechas
    $sqlDonut .= " WHERE FechaNoticia >= :inicio AND FechaNoticia <= :fin";
    $sqlPie .= " WHERE FechaNoticia >= :inicio AND FechaNoticia <= :fin";
}

$sqlDonut .= " GROUP BY Impacto";
$sqlPie .= " GROUP BY Medio";

// Preparar las consultas SQL
$stmtDonut = conection::conectar()->prepare($sqlDonut);
$stmtPie = conection::conectar()->prepare($sqlPie);

// Vincular los parámetros de fecha si se proporcionaron valores válidos
if (!empty($inicio) && !empty($fin)) {
    $stmtDonut->bindParam(':inicio', $inicio);
    $stmtDonut->bindParam(':fin', $fin);
    $stmtPie->bindParam(':inicio', $inicio);
    $stmtPie->bindParam(':fin', $fin);
}

// Ejecutar las consultas SQL
$stmtDonut->execute();
$stmtPie->execute();

// Arreglo para almacenar los datos del gráfico de donut chart
$dataDonut = array(
    'labels' => array(),
    'values' => array()
);

// Recorrer los resultados de la consulta para el gráfico de donut chart
while ($row = $stmtDonut->fetch(PDO::FETCH_ASSOC)) {
    $dataDonut['labels'][] = $row['Impacto'];
    $dataDonut['values'][] = (int)$row['total'];
}

// Arreglo para almacenar los datos del gráfico de pie chart
$dataPie = array(
    'labels' => array(),
    'values' => array(),
    'backgroundColors' => array()
);

// Recorrer los resultados de la consulta para el gráfico de pie chart
while ($row = $stmtPie->fetch(PDO::FETCH_ASSOC)) {
    $dataPie['labels'][] = $row['Medio'];
    $dataPie['values'][] = (int)$row['total'];

    // Generar un color de fondo aleatorio para cada medio
    $dataPie['backgroundColors'][] = '#' . substr(md5(mt_rand()), 0, 6);
}

// Cerrar las conexiones a la base de datos
$stmtDonut->closeCursor();
$stmtPie->closeCursor();

// Arreglo final con los datos de ambos gráficos
$chartData = array(
    'donutChart' => $dataDonut,
    'pieChart' => $dataPie
);

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($chartData);
?>
