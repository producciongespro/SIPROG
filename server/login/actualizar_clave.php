<?php
	
	require 'funcs/conexion.php';
	require 'funcs/funcs.php';
	$user_id = $mysqli->real_escape_string($_POST['id']);
	$user = $mysqli->real_escape_string($_POST['usuario']);
	$password = $mysqli->real_escape_string($_POST['clave']);

		$pass_hash = hashPassword($password);
		
		if(cambiaPassword2($pass_hash, $user_id, $user))
		{
			echo "Contraseña modificada exitosamente";
			} else {
			echo "Error al modificar contraseña";
			
		}

	
?>