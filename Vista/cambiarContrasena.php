<?php
session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/negocio/User.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/negocio/ManejoUser.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoUser::setConexionBD($conexion);

$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

$usuario = ManejoUser::consultEmail($email);

if ($usuario != false) {
	$estado = $usuario->getEstado();

	if ($estado !='INACTIVO'){
		if ($password == $usuario->getPassword()) {
			$_SESSION['usuario'] = $usuario;
			$tipo = $usuario->getCod_t_usuario();
			if($estado == 'EN ESPERA' ) {
				echo '<script type="text/javascript">'
				."$('#modalCambio').modal('show');".'</script>';
			}else{
				if ($tipo == 1) {
					echo 'loginUser';
				}
				if ($tipo == 2) {
					echo 'loginAdmin';
				}
			}
		}else{
			echo '<p> Incorrect password.</p>';
		}
	}else{
		echo '<p> User not found.</p> 2';
	}
}else{
	echo '<p> User not found.</p> 1';
}

?>