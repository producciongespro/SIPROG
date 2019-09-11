<?php

	require 'funcs/conexion.php';
	require 'funcs/funcs.php';

	$user_id = $mysqli->real_escape_string($_POST['user_id']);
	$token = $mysqli->real_escape_string($_POST['token']);
	$password = $mysqli->real_escape_string($_POST['password']);
	$con_password = $mysqli->real_escape_string($_POST['con_password']);

	if(validaPassword($password, $con_password))
	{

		$pass_hash = hashPassword($password);

		if(cambiaPassword($pass_hash, $user_id, $token))
		{
			echo "<style>body {background-color: #cccccc;}</style>";
			echo "<div style='heigth:100%; width: 100%; background-color: #e9ecef;'><img style='max-width: 100%;width: 141px; padding-top: 30px; padding-bottom: 30px;padding-left: 10px' src='../../assets/img/logo.png' alt='Logo sistema' class='img-fluid'></div>";
			echo "<center><br><br><h1 style='padding-left:20px;   margin-left: auto; margin-right: auto;'>Contrase&ntilde;a Modificada </h1> <a href='../../index.html' ><h2>Iniciar Sesion</h2></a></center>";
			} else {
				echo "<style>body {background-color: #cccccc;}</style>";
				echo "<div style='heigth:100%; width: 100%; background-color: #e9ecef;'><img style='max-width: 100%;width: 141px; padding-top: 30px; padding-bottom: 30px;padding-left: 10px' src='../../assets/img/logo.png' alt='Logo sistema' class='img-fluid'></div>";
			echo "<center><br><br><h1 style='padding-left:20px;   margin-left: auto; margin-right: auto;'>Error al modificar contraseña </h1></center>";

		}
	} else {
		echo "<style>body {background-color: #cccccc;}</style>";
		echo "<div style='heigth:100%; width: 100%; background-color: #e9ecef;'><img style='max-width: 100%;width: 141px; padding-top: 30px; padding-bottom: 30px;padding-left: 10px' src='../../assets/img/logo.png' alt='Logo sistema' class='img-fluid'></div>";
		echo "<center><br><br><h1 style='padding-left:20px;   margin-left: auto; margin-right: auto;'>Las contraseñas no coinciden</h1></center>";

	}

?>
