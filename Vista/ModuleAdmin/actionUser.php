<?php
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/negocio/User.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/negocio/ManejoUser.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/Util/Conexion.php';

$codUser = $_GET["codeUser"];
$action = $_GET["action"];
$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoUser::setConexionBD($conexion);
$user = ManejoUser::consultUser($codUser);

if($action=="desactivated"){
    $user->setEstado("4");
    ManejoUser::modifyUser($user);
}elseif($action=="activated" or $action=="authorized"){
    $user->setEstado("3");
    ManejoUser::modifyUser($user);
}elseif($action=="rejected"){
    $user->setEstado("2");
    ManejoUser::modifyUser($user);
}elseif($action=="delete"){
    ManejoUser::deleteUser($user->getCod_usuario());
}

if($user->getCod_t_usuario()==1){
    echo '<script>
    window.location="../Admin.php?menu=clients";
    </script>';
}elseif($user->getCod_t_usuario()==2 or $user->getCod_t_usuario()==3){
    echo '<script>
    window.location="../Admin.php?menu=administrators";
    </script>';
}elseif($user->getCod_t_usuario()==4){
    echo '<script>
    window.location="../Admin.php?menu=readers";
    </script>';
}elseif($user->getCod_t_usuario()==5){
    echo '<script>
    window.location="../Admin.php?menu=authors";
    </script>';
}elseif($user->getCod_t_usuario()==6){
    echo '<script>
    window.location="../Admin.php?menu=editorials";
    </script>';
}

?>