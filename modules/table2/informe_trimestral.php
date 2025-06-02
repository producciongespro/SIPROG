<?php
// archivo: servicio.php
header('Content-Type: application/json');
// ConexiÃ³n
require '../../server/conexion.php';
$conn = conectarDB();
mysqli_set_charset($conn, 'utf8mb4');

if ($conn->connect_error) {
    die("Error de conexi¨®n: " . $conn->connect_error);
}

$sql = "
SELECT 
    YEAR(fecha_pub) AS anio,
    trimestre,
    id_cat,
    id_estado,
    id_tipo,
    COALESCE(audios, 0) AS audios,
    COALESCE(videos, 0) AS videos,
    COALESCE(documentos, 0) AS documentos,
    COALESCE(imagenes, 0) AS imagenes
FROM ingresos
WHERE YEAR(fecha_pub) >= 2017
";

$result = $conn->query($sql);
$data = [];

while ($row = $result->fetch_assoc()) {
    $anio = $row['anio'];
    $trimestre = $row['trimestre'];
    if (!isset($data[$anio][$trimestre])) {
        $data[$anio][$trimestre] = [
            'trimestre' => $trimestre,
            'prod_interna' => 0,
            'actu' => 0,
            'contratacion' => 0,
            'gestionados' => 0,
            'total_audios' => 0,
            'total_imagenes' => 0,
            'total_documentos' => 0,
            'total_videos' => 0,
            'no_pedagog' => 0
        ];
    }
    if ($row['id_cat'] == 2 && $row['id_estado'] == 4) {
        $data[$anio][$trimestre]['prod_interna']++;
    }
    if ($row['id_estado'] == 8) {
        $data[$anio][$trimestre]['actu']++;
    }
    if ($row['id_cat'] == 3) {
        $data[$anio][$trimestre]['contratacion']++;
    }
    if ($row['id_cat'] == 1) {
        $data[$anio][$trimestre]['gestionados']++;
    }
    if ($row['id_tipo'] == 6) {
        $data[$anio][$trimestre]['no_pedagog']++;
    }
    $data[$anio][$trimestre]['total_audios'] += $row['audios'];
    $data[$anio][$trimestre]['total_imagenes'] += $row['imagenes'];
    $data[$anio][$trimestre]['total_documentos'] += $row['documentos'];
    $data[$anio][$trimestre]['total_videos'] += $row['videos'];
}

// Reordenar y agregar totales por aÃ±o
foreach ($data as $anio => $trimestres) {
    $totales = [
        'trimestre' => 'TOTALES',
        'prod_interna' => 0,
        'actu' => 0,
        'contratacion' => 0,
        'gestionados' => 0,
        'total_audios' => 0,
        'total_imagenes' => 0,
        'total_documentos' => 0,
        'total_videos' => 0,
        'no_pedagog' => 0
    ];
    foreach ($trimestres as $t => $vals) {
        foreach ($totales as $key => $val) {
            if ($key != 'trimestre') {
                $totales[$key] += $vals[$key];
            }
        }
    }
    ksort($data[$anio]);
    $data[$anio]['Z_TOTALES'] = $totales; // Para que salga al final
}

echo json_encode($data);
$conn->close();
?>
