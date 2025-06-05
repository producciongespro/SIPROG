<?php
require 'credenciales_backup.php';

$fecha = date('Y-m-d_H-i-s');
$archivo = "respaldo_{$DB_NAME}_{$fecha}.sql";

// Construir comando mysqldump
$cmd = sprintf(
    'mysqldump --user=%s --password=%s --host=%s %s',
    escapeshellarg($DB_USER),
    escapeshellarg($DB_PASS),
    escapeshellarg($DB_HOST),
    escapeshellarg($DB_NAME)
);

// Encabezados y ejecución
header('Content-Type: application/octet-stream');
header("Content-Disposition: attachment; filename=\"$archivo\"");
passthru($cmd);
exit;
