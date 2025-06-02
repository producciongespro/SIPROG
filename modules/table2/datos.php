<?php
// Conexión
require '../../server/conexion.php';
$conn = conectarDB();
mysqli_set_charset($conn, 'utf8mb4');

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// ==== Consulta para obtener los datos por año y trimestre ====
$sql = "
SELECT
    YEAR(fecha_pub) AS anio,
    trimestre,
    SUM(CASE WHEN id_cat = 2 AND id_estado = 4 THEN 1 ELSE 0 END) AS prod_interna,
    SUM(CASE WHEN id_cat = 2 THEN 1 ELSE 0 END) AS gestionados,
    SUM(CASE WHEN id_cat = 3 THEN 1 ELSE 0 END) AS contratacion,
    SUM(CASE WHEN id_estado = 8 THEN 1 ELSE 0 END) AS actu,
    SUM(audios) AS audios,
    SUM(imagenes) AS imagenes,
    SUM(documentos) AS documentos,
    SUM(videos) AS videos,
    SUM(CASE WHEN id_tipo = 6 THEN 1 ELSE 0 END) AS no_pedagogicos
FROM ingresos
WHERE YEAR(fecha_pub) BETWEEN 2017 AND YEAR(CURDATE())
GROUP BY anio, trimestre
ORDER BY anio, 
    FIELD(trimestre, 'I', 'II', 'III', 'IV') -- Asegura el orden correcto de trimestres
";

$result = $conn->query($sql);

$datos = [];

while ($row = $result->fetch_assoc()) {
    $anio = $row['anio'];
    $trim = $row['trimestre']; // Se conserva como string: I, II, III, IV

    $datos[$anio][$trim] = [
        'prod_interna'     => (int)$row['prod_interna'],
        'actu'             => (int)$row['actu'],
        'contratacion'     => (int)$row['contratacion'],
        'gestionados'      => (int)$row['gestionados'],
        'audios'           => (int)$row['audios'],
        'imagenes'         => (int)$row['imagenes'],
        'documentos'       => (int)$row['documentos'],
        'videos'           => (int)$row['videos'],
        'no_pedagogicos'   => (int)$row['no_pedagogicos'],
    ];
}

// Devolver los datos como JSON
echo json_encode($datos);
?>

