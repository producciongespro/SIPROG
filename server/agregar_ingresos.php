<?php
  header("Content-type:text/html;charset=\"utf-8\"");
  require 'conexion.php';

  $id_estado = $_POST['id_estado'];
  $nombre = utf8_decode($_POST['nombre']);
  $id_cat = $_POST['id_cat'];
  $id_tipo = $_POST['id_tipo'];
  $fecha_pub = utf8_decode($_POST['fecha_pub']);
  $url = utf8_decode($_POST['url']);
  $equipo = utf8_decode($_POST['equipo']);
  $solicitante = utf8_decode($_POST['solicitante']);
  $id_instancia = $_POST['id_instancia'];
  $audios = $_POST['audios'];
  $videos = $_POST['videos'];
  $documentos = $_POST['documentos'];
  $imagenes = $_POST['imagenes'];
  $usuario = $_POST['correo_usuario'];
  $observaciones = utf8_decode($_POST['observaciones']);

  if  (empty($observaciones)) {
    $observaciones = "";
}
if  (empty($url)) {
  $url = "#";
}


sleep(1);

  $temp = substr($fecha_pub, 5,2);

  switch ($temp) {
    case $temp >= 1 && $temp <= 3:
      $trimestre= "I";
      break;
      case $temp >= 4 && $temp <= 6:
        $trimestre= "II";
        break;
        case $temp >= 7 && $temp <= 9:
          $trimestre= "III";
          break;
          case $temp >= 10 && $temp <= 12:
            $trimestre= "IV";
            break;
  }


    $mysqli = conectarDB();
    if  (empty($fecha_pub)) {
        $trimestre = "N/A";
      mysqli_query($mysqli,"INSERT INTO ingresos (id_estado,nombre_proyecto,id_cat,id_tipo,trimestre,url,equipo,audios,videos,documentos,imagenes,usu_ingreso,solicitante,id_instancia,observaciones ) VALUES
                                              ('$id_estado','$nombre','$id_cat','$id_tipo','$trimestre','$url','$equipo','$audios','$videos', '$documentos', '$imagenes', '$usuario','$solicitante','$id_instancia' ,'$observaciones')") or die ("Problemas al a���adir elementos a la BD".mysqli_error($mysqli));
    }
    else {
      mysqli_query($mysqli,"INSERT INTO ingresos (id_estado,nombre_proyecto,id_cat,id_tipo,fecha_pub,trimestre,url,equipo,audios,videos,documentos,imagenes,usu_ingreso,solicitante,id_instancia,observaciones ) VALUES
                                              ('$id_estado','$nombre','$id_cat','$id_tipo','$fecha_pub','$trimestre','$url','$equipo','$audios','$videos', '$documentos', '$imagenes', '$usuario','$solicitante','$id_instancia' ,'$observaciones')") or die ("Problemas al a���adir elementos a la BD".mysqli_error($mysqli));
    }

        $rs = mysqli_query($mysqli,"SELECT id_registro, usu_ingreso from ingresos ORDER BY id_registro DESC LIMIT 1");
        if ($row = mysqli_fetch_row($rs)) {
        $id_ultimo = trim($row[0]);
        $usuario = trim($row[1]);
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
        $evento = array('evento' => 'ingreso');
        $registro = json_encode(array($evento));
        mysqli_query($mysqli,"INSERT INTO bitacoranew (usuario,evento,id_registro, nombre) VALUES ('$usuarioResp','$registro','$id_ultimo','$nombre')") or die ("Problemas al a���adir elementos a la BD".mysqli_error($mysqli));
      $errors = array();

mysqli_close($mysqli);
?>
