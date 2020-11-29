<?php
session_start();

require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/negocio/User.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/negocio/ManejoUser.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoUser::setConexionBD($conexion);

$email = isset($_POST['emailL']) ? $_POST['emailL'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

$usuario = ManejoUser::consultEmail($email);

if ($usuario != false) {
	$estado = $usuario->getEstado();

	if ($estado !='INACTIVO'){
		if ($password == $usuario->getPassword()) {
			$_SESSION['usuario'] = $usuario;
			$tipo = $usuario->getCod_t_usuario();
			if($estado == 'EN ESPERA' ) {
				$_SESSION['email'] = $email;
				echo '<script type="text/javascript">'
				."$('#modalCambio').modal('show');"
				.'</script>';
			}else{
				if ($tipo == 1 or $tipo == 5 or $tipo == 6) {
					$_SESSION['codUser'] = $usuario->getCod_usuario();
					echo 'loginUser';
				}
				if ($tipo == 2 or $tipo == 3 or $tipo == 4) {
					$_SESSION['codUser'] = $usuario->getCod_usuario();
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