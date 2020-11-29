<?php
$codUser = $_POST["codUser"];
$userType = $_POST['userType'];
$mail = $_POST['mail'];
$password = $_POST['password'];
$name = $_POST['name'];
$status = $_POST['status'];
$phone = $_POST['phone'];
$address = $_POST['address'];

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/negocio/User.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/negocio/ManejoUser.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Persistencia/Util/Conexion.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoUser::setConexionBD($conexion);
$validateUser = ManejoUser::consultEmail($mail);

if ($mail != null and $password != null and $name != null and $phone != null and $address != null) {

    
        $user = new User();

        $user->setCod_usuario($codUser);
        $user->setCod_t_usuario($userType);
        $user->setCorreo($mail);
        $user->setPassword($password);
        $user->setNombre($name);
        $user->setEstado($status);
        $user->setTelefono($phone);
        $user->setDireccion($address);

        ManejoUser::modifyUser($user);
        if ($userType == 1) {
            echo '1';
        } elseif ($userType == 2 or $userType == 3) {
            echo '23';
        } elseif ($userType == 4) {
            echo '4';
        } elseif ($userType == 5) {
            echo '5';
        } elseif ($userType == 6) {
            echo '6';
        }
     
} else {
    echo '<p>Complete the requested fields</p>';
}
?>
