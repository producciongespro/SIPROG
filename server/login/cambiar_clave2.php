<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Content-Type: text/html; charset=utf-8");
$method = $_SERVER['REQUEST_METHOD'];	
	require 'funcs/conexion.php';
	require 'funcs/funcs.php';
	
	// $JSONData = file_get_contents("php://input");
	// $dataObject = json_decode($JSONData); 
	// if(empty($_POST['idUsuario'])){
	// 	echo json_encode(array('error'=>true, 'msj' => 'Id de usuario inexistente'));
	// }
	
	// if(empty($_POST['usuario'])){
	//     echo json_encode(array('error'=>true, 'msj' => 'Debe ingresar su nombre de usuario'));
	// 	//header('Location: index.php');
	// }
	
	$user_id = utf8_decode($_POST['idUsuario']);
    $user = utf8_decode($_POST['usuario']); 
	// echo json_encode(array('usuario'=>$user, 'id' => $user_id));
	if(!verificaUsuario($user_id, $user))
	{
		//echo 'No se pudo verificar los Datos';
		echo json_encode(array('error'=>true, 'msj' => 'No se pueden verificar los datos'));
		exit;
	}
	else{
	    echo json_encode(array('error'=>false, 'msj' => 'Puede cambiar contrase単a..', 'url'=>'http://localhost/SIPROG/server/login/guardar_clave.php'));
	}
	
		
?>