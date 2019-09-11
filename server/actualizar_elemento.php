<?php
  header("Content-type:text/html;charset=\"utf-8\"");
		require('conexion.php');
		require('obtener_elemento.php');
		$mysqli = conectarDB();
		sleep(1);

    $id_ingreso = $_POST['id_ingreso']; //id del ingreso que hay que actualizar
		$campos = array($id_ingreso);
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
    $evento = utf8_decode("Actualización");
    $temp = substr($fecha_pub, 5,2);
		// $campos[] = array();
		array_push($campos, (int)$id_estado,$nombre,$id_cat,$id_tipo,$fecha_pub,"",$url,$equipo,$audios,$videos,$documentos,$imagenes,	$usuario,"",utf8_encode($solicitante),$id_instancia,$observaciones);
  if  (empty($observaciones)) {
      $observaciones = "";
  }
  if  (empty($url)) {
    $url = "#";
  }


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

    if  (empty($fecha_pub)) {
      $fecha_pub = "0000-00-00";
      $trimestre = "N/A";
    }
		if (mysqli_connect_errno()) {
				echo "Error de conexion \n";
				//print ("mal");
				exit();
			}
	else{
		$camposBD = revisar($id_ingreso);
		// obtenerValor();
		// echo "Preparando para almacenar \n";
		mysqli_query($mysqli,"UPDATE ingresos SET `id_estado`='$id_estado ',`nombre_proyecto`='$nombre',`id_cat`='$id_cat',`id_tipo`='$id_tipo',`fecha_pub`='$fecha_pub',`trimestre`='$trimestre',`url`='$url',`equipo`='$equipo',`audios`='$audios',`videos`='$videos',`documentos`='$documentos',`imagenes`='$imagenes',`usu_ingreso`='$usuario',`solicitante`='$solicitante',`id_instancia`='$id_instancia',`observaciones`='$observaciones' WHERE `id_registro` = $id_ingreso") or die ("Problemas al añadir elementos a la BD".mysqli_error($mysqli));
		$elementosTabla= array("id_registro","id_estado","nombre_proyecto","id_cat","id_tipo","fecha_pub","trimestre","url","equipo","audios","videos","documentos","imagenes","usu_ingreso","fecha_ing","solicitante","id_instancia","observaciones");
		$cambios = array();
		$actual = array();
		$totalCambios = array();
			$indice = 0;
				foreach ($campos as $campo)
						{
							// print_r("<br>".$indice. ": " . $campo);
							if (isset($campo) ) {
							if ($campo != ($camposBD[0][$elementosTabla[$indice]]) AND ($indice != 14)AND ($indice != 0) AND ($indice != 6) )  {
								array_push($cambios,array($elementosTabla[$indice] => ($camposBD[0][$elementosTabla[$indice]])));
								array_push($actual,array($elementosTabla[$indice] => $campo));
							}
							$indice++;

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

    // mysqli_query($mysqli,"INSERT INTO bitacora (usuario,evento,id_registro, nombre) VALUES ('$usuarioResp','$evento',$id_ingreso, '$nombre')") or die ("Problemas al añadir elementos a la BD".mysqli_error($mysqli));
		array_push($totalCambios,($actual),($cambios));
		print_r ($totalCambios);
		$totalCambios = json_encode($totalCambios);
		mysqli_query($mysqli,"INSERT INTO bitacoranew (usuario,evento,id_registro, nombre) VALUES ('$usuarioResp','$totalCambios',$id_ingreso, '$nombre')") or die ("Problemas al añadir elementos a la BD".mysqli_error($mysqli));
    mysqli_close($mysqli);
	}

?>
