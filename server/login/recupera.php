<?php
	require 'funcs/conexion.php';
	include 'funcs/funcs.php';

	session_start();

	if(isset($_SESSION["id_usuario"])){
		header("Location: ../../index.html");
	}

	$errors = array();

	if(!empty($_POST))
	{
		$email = $mysqli->real_escape_string($_POST['email']);

		if(!isEmail($email))
		{
			$errors[] = "Debe ingresar un correo electronico valido";
		}

		if(emailExiste($email))
		{
			$user_id = getValor('id', 'correo', $email);
			$nombre = getValor('nombre', 'correo', $email);

			$token = generaTokenPass($user_id);

			$url = 'http://'.$_SERVER["SERVER_NAME"].'/SIPROG/server/login/cambia_pass.php?user_id='.$user_id.'&token='.$token;

			$asunto = 'Recuperar Password - Sistema de Usuarios';
			$cuerpo = "Hola $nombre: <br /><br />Se ha solicitado un reinicio de contrase&ntilde;a. <br/><br/>Para restaurar la contrase&ntilde;a, visita la siguiente direcci&oacute;n: <a href='$url'>$url</a>";

			if(enviarEmail($email, $nombre, $asunto, $cuerpo)){
				echo "<style>body {background-color: #cccccc;}</style>";
				echo "<div style='heigth:100%; width: 100%; background-color: #e9ecef;'><img style='max-width: 100%;width: 141px; padding-top: 30px; padding-bottom: 30px;padding-left: 10px' src='../../assets/ico/logo.png' alt='Logo sistema' class='img-fluid'></div>";
				echo "<br><br><p style='padding-left:20px'>$nombre, hemos enviado un correo electronico a la direccion $email para restablecer tu password </p>";
				echo "<a style='padding-left:20px' href='../../index.html' >Iniciar Sesion</a>";
				exit;
			}
			} else {
			$errors[] = "La direccion de correo electronico no existe";
		}
	}
?>


<html>
	<head>
		<title>Recuperar Password</title>
		<link rel="stylesheet" href="../../css/master.css">
		<link rel="stylesheet" href="../../vendor/bootstrap-4.1/css/bootstrap.min.css" >
		<!-- <link rel="stylesheet" href="css/bootstrap-theme.min.css" > -->
		<script src="../../vendor/bootstrap-4.1/js/bootstrap.min.js" ></script>
		<style>
				body {
                   /* background-image: url("img/paris3.jpg"); */
                   background-repeat: no-repeat;
                   background-color: #cccccc;
                   background-size: contain;
                }
								#loginbox{
									background-color: #2d2d2c;
									border-radius: 12px;
									padding: 35px;
									padding-bottom: 12px;
									margin-top: 89px;
								}
								body{
									background-color: #86cddc;
								}
								.jumbotron{
									    padding: 2rem 2rem;
								}
        </style>
	</head>

	<body>
		<div class="row">
				<div class="col-sm-12">
							<img src="../../assets\img\banner.png" alt="">
						<!-- <img src="../../assets/ico/logo.png" alt="Logo sistema" class="img-fluid"> -->
				</div>

</div>
		<div class="">
			<div class="row">
				<div class="col-md-3">

				</div>
				<div class="col-md-6">
				<div id="loginbox" class="mainbox col-md-12">
					<div class="panel panel-primary class" >
						<div class="panel-heading">
							<div style="color:#bababa;" class="panel-title"><h4>Recuperar Password</h4></div>
							<div style="float:right; font-size: 80%; position: relative; top:-10px"><a style="color: #eee;" href="../../modules/login/login.html">Iniciar Sesi&oacute;n</a></div>
						</div>

						<div style="padding-top:30px" class="panel-body" >

							<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

							<form id="loginform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">

								<div style="margin-bottom: 25px" class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input id="email" type="email" class="form-control" name="email" placeholder="email" required>
								</div>

								<div style="margin-top:10px" class="form-group">
									<div class="col-sm-12 controls">
										<button id="btn-login" type="submit" class="btn btn-info">Enviar</a>
									</div>
									<div id="mensaje">

									</div>
								</div>

								<div class="form-group">
									<div class="col-md-12 control">
										<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
											<!-- No tiene una cuenta! <a href="../sign_up/index.html">Registrate aquí</a> -->
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
				<div class="col-md-3">

				</div>
			</div>

		</div>
	</body>
</html>
