<?php

// verifica si la peticiòn es de tipo AJAX
  if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])== 'xmlhttprequest'    ) {
    require('conexion.php');
    require('login/funcs/funcs.php');
    $mysqli = conectarDB();
    sleep(1);
    //creaciòn de la sesiòn:
    session_start();

    // Especifica que tipo de carcateres va a escapar
    $mysqli->set_charset('utf8');

    //real escape es para filtrar los carcateres que van a etrar a la consulta SQL para evita SQL inyection

    $usuario = $mysqli->real_escape_string( $_POST['txtEmail']);
    $pas = $mysqli->real_escape_string( $_POST['txtPassword']);
    if ($nueva_consulta = $mysqli->prepare("SELECT usuarios.nombre, usuarios.apellido1, usuarios.apellido2, usuarios.correo, usuarios.id_area, usuarios.id_tipo, usuarios.password, tipo_usuario.tipo, areas.nombre_area
        FROM usuarios
        INNER JOIN tipo_usuario
        ON usuarios.id_tipo = tipo_usuario.id
        INNER JOIN areas
        ON usuarios.id_area = areas.id
        WHERE usuarios.correo = ?")) {
        $nueva_consulta->bind_param('s', $usuario);
        $nueva_consulta->execute();
        $resultado = $nueva_consulta->get_result();
        if ($resultado->num_rows == 1) {
            $datos = $resultado->fetch_assoc();
             $encriptado_db = $datos['password'];
            if ((password_verify($pas, $encriptado_db) AND (isActivo($usuario))))
            {

              $_SESSION['usuario'] = $datos;
                echo json_encode(array('error'=>false,'nombre'=>$datos['nombre'], 'apellido1'=>$datos['apellido1'], 'apellido2'=>$datos['apellido2'], 'correo'=>$datos['correo'], 'tipo'=>$datos['tipo'], 'area'=>$datos['nombre_area']));}

               else {
                    echo json_encode(array('error'=>true));
                    }
        }
        else {
              echo json_encode(array('error'=>true));
        }
        $nueva_consulta->close();
      }
  }
$mysqli->close();
?>
