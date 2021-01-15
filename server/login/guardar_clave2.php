<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Content-Type: text/html; charset=utf-8");
$method = $_SERVER['REQUEST_METHOD'];	
	require 'funcs/conexion.php';
	include 'funcs/funcs.php';
	$JSONData = file_get_contents("php://input");
	$dataObject = json_decode($JSONData); 
		$user = utf8_decode($_POST['usuario']);
        $password = utf8_decode($_POST['password']);   
        $password2 = utf8_decode($_POST['password2']);  
		$user_id= $_POST['idUsuario'];

		global $mysqli;
	if (!empty($password) AND (!empty($password2))){
      	if(validaPassword($password, $password2))
    	{
    	    $pass_hash = hashPassword($password);
    		$stmt = $mysqli->prepare("UPDATE usuarios SET password = ?, password_request=0 WHERE id = ? AND correo = ?");
    		$stmt->bind_param('sis', $pass_hash, $user_id, $user);
    
    		if($stmt->execute()){
    				echo json_encode(array('error'=>false, 'msj' => 'Contraseña cambiada de forma exitosa'));
    			} else {
    				echo json_encode(array('error'=>true, 'msj' => 'Error al cambiar la contraseña'));
    		}
    	}
    		else{
    		    	echo json_encode(array('error'=>true, 'msj' => 'Las contraseñas no coinciden'));
    		}  
    		}
    else{
        echo json_encode(array('error'=>true, 'msj' => 'No puede enviar contraseñas vacías'));
    }

?>