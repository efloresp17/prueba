<?php
session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/negocio/Document.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/negocio/ManejoDocument.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/negocio/ManejoReservation.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/negocio/User.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/negocio/ManejoUser.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Persistencia/Util/Conexion.php';

//$codDoc = $_GET["codDoc"];
$codRes = $_GET["cod_res"];
$action = $_GET["status"];
$codigoUsuario = $_SESSION["codUser"];
$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoDocument::setConexionBD($conexion);
ManejoReservation::setConexionBD($conexion);
ManejoUser::setConexionBD($conexion);

$codDoc = ManejoReservation::consultReservationStatus($codRes);
$doc = ManejoDocument::consult($codDoc->getCod_documento());
$fechaActual = date('Y-m-d');

if ($action == "devolution") {
    $doc->setCantidad($doc->getCantidad() + 1);

    if ($doc->getCantidad() != 0) {
        $doc->setCod_estado_reserva(2);
    }
    
    $res = ManejoReservation::consultReservationDate($codRes);
    $res->setCod_reserva($res->getCod_reserva());
    $res->setCod_usuario($res->getCod_usuario());
    $res->setCod_documento($res->getCod_documento());
    $res->setFecha_inicial($res->getFecha_inicial());
    $res->setFecha_limite_entrega($res->getFecha_limite_entrega());
    $res->setFecha_Entrega($fechaActual);
    ManejoReservation::modifyReservationDate($res);

    $res2 = ManejoReservation::consultReservationStatus($codRes);
    $res2->setCod_reserva($res->getCod_reserva());
    $res2->setCod_usuario($res->getCod_usuario());
    $res2->setCod_documento($res->getCod_documento());
    $res2->setEstado('Desactivated');
    ManejoReservation::modifyReservationStatus($res2);
    
    ManejoDocument::modify($doc);
}

echo '<script>
        alert("The document has been reserved")
        window.location="../User.php?menu=myProfileReserved";
        </script>';