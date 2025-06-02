<?php
// archivo: servicio.php
header('Content-Type: application/json');
// Conexión
require '../../server/conexion.php';
$conn = conectarDB();
mysqli_set_charset($conn, 'utf8mb4');

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "
SELECT 
  YEAR(fecha_pub) AS anio,
  CASE 
    WHEN id_estado = 8 THEN 'Actualizaciones'
    WHEN id_estado = 4 AND id_cat = 1 THEN 'Gestionados'
    WHEN id_estado = 4 AND id_cat = 2 THEN 'Producción interna'
    WHEN id_estado = 4 AND id_cat = 3 THEN 'Contratación'
    ELSE NULL
  END AS categoria,
  COUNT(*) AS total
FROM ingresos
WHERE 
  (id_estado = 4 AND id_cat IN (1, 2, 3))
  OR id_estado = 8
GROUP BY anio, categoria
ORDER BY anio ASC
";

$resultado = $conn->query($sql);
$datos = [];

while ($fila = $resultado->fetch_assoc()) {
    $anio = $fila['anio'];
    $categoria = $fila['categoria'];
    $total = (int)$fila['total'];

    if (!isset($datos[$anio])) {
        $datos[$anio] = [
            'Gestionados' => 0,
            'Producción interna' => 0,
            'Contratación' => 0,
            'Actualizaciones' => 0
        ];
    }

    $datos[$anio][$categoria] = $total;
}

echo json_encode($datos);
?>