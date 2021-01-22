<?php
  header("Content-type:text/html;charset=\"utf-8\"");
  require('conexion.php');
  sleep(1);
  $mysqli = conectarDB();

  $idValor =  utf8_decode($_POST['idVal']);
  // $usuario = $_POST['correo_usuario'];


  // $sql = "SELECT ingresos.id_cat,ingresos.nombre_proyecto, ingresos.usu_ingreso, usuarios.nombre1, usuarios.apellido1  FROM ingresos
  //         INNER JOIN usuarios
  //         ON usuarios.correo = ingresos.correo";
  $sql = "SELECT id_registro, nombre_proyecto, usu_ingreso FROM ingresos WHERE id_registro='$idValor'";
  $result = mysqli_query($mysqli, $sql);
  // $result = $mysqli->query($sql);
  if (mysqli_num_rows($result)>0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
      $nombre =  $row["nombre_proyecto"];
      $usuario=  $row["usu_ingreso"];
}
}

$sql2 = "SELECT nombre, apellido1 FROM usuarios WHERE correo='$usuario' LIMIT 1";
$result = mysqli_query($mysqli, $sql2);
// $result = $mysqli->query($sql);
if (mysqli_num_rows($result)>0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    // $nombre =  $row["nombre_proyecto"];
    $usuarioResp=  $row["nombre"]." ".$row["apellido1"];
}
}

$evento = array('evento' => 'eliminación');
$registro = json_encode(array($evento));

  mysqli_query($mysqli,"DELETE FROM ingresos WHERE id_registro = '$idValor' ") or die ("Problemas al actualizar elementos a la BD".mysqli_error($mysqli));
   //cerrar conexion
     mysqli_close($mysqli);
		$errors = array();

?>
