<?php
session_start();
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$typeUser = $_POST['typeUser'];
$status_profile = $_POST['status_profile'];
$address = $_POST['address'];
$phone = $_POST['phone'];


require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/negocio/User.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/negocio/ManejoUser.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/negocio/User_Type.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/negocio/ManejoUser_Type.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/negocio/Status_User.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/negocio/ManejoStatus_User.php';


$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoUser::setConexionBD($conexion);
ManejoUser_Type::setConexionBD($conexion);
ManejoStatus_User::setConexionBD($conexion);

$codigoUsuario = $_GET['cod_usuario'];
$codigoUsuarioActual = ManejoUser::consultUser($codigoUsuario);

//$codigoUsuarioActual->setCod_usuario($codigoUsuarioActual->getCod_usuario());
$codigoUsuarioActual->setNombre($fullname);
$codigoUsuarioActual->setCorreo($email);
$codigoUsuarioActual->setCod_t_usuario($typeUser);
$codigoUsuarioActual->setEstado($status_profile);
$codigoUsuarioActual->setDireccion($address);
$codigoUsuarioActual->setTelefono($phone);

ManejoUser::modifyUser($codigoUsuarioActual);

echo '<script>
alert("Your data has modified")
window.location="../User.php?menu=index";
</script>';
