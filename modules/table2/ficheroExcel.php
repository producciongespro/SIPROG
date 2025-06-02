<?php
if (isset($_POST['datos_a_enviar'])) {
    header("Content-Type: application/vnd.ms-excel; charset=utf-8");
    header("Content-Disposition: attachment; filename=reporte_trimestral.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    echo '<html>';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '</head>';
    echo '<body>';
    echo $_POST['datos_a_enviar'];
    echo '</body>';
    echo '</html>';
}
?>
