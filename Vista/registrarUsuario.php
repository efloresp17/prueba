<?php
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/negocio/User.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/negocio/ManejoUser.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoUser::setConexionBD($conexion);

$firstName = isset($_POST['firstName']) ? $_POST['firstName'] : null;
$lastName = isset($_POST['lastName']) ? $_POST['lastName'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = $psswd = substr(md5(microtime()), 1, 8);

if($firstName != null or $lastName != null or $email != null){
	if ($email){
		$temp = ManejoUser::consultEmail($email);	
		if($temp == false){
			$usuario = new User();
			$usuario->setCod_t_usuario(1);
			$usuario->setCorreo($email);
			$usuario->setNombre($firstName.' '.$lastName);
			$usuario->setPassword($password);
			$usuario->setEstado('EN ESPERA');
			ManejoUser::createUser($usuario);
			echo "1";
			}else{
				echo '<p> Email already registered.</p>';
		}
	}else{
		echo '<p> Email is not valid.</p>';
	}
}else{
	echo '<p> Complete the fields on the form.</p>';
}

?>