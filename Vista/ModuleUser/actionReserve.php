<?php
session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/negocio/Document.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/negocio/ManejoDocument.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/negocio/ManejoReservation.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/negocio/User.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/negocio/ManejoUser.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Persistencia/Util/Conexion.php';

$codDoc = $_GET["codDoc"];
$action = $_GET["action"];
$codigoUsuario = $_SESSION["codUser"];
$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoDocument::setConexionBD($conexion);
ManejoReservation::setConexionBD($conexion);
ManejoUser::setConexionBD($conexion);
$doc = ManejoDocument::consult($codDoc);
$fechaActual = date('Y-m-d');

if ($action == "reserved") {
    $doc->setCantidad($doc->getCantidad() - 1);

    if ($doc->getCantidad() == 0) {
        $doc->setCod_estado_reserva(1);
    }

    $res = new Reservation();
   // $res->setCod_reserva(3);
    $verficar = ManejoReservation::consultReservationDocumentStatus($codDoc,$codigoUsuario);
   if ($verficar->getEstado() == "Desactivated" && $verficar->getCod_documento()==$codDoc && $verficar->getCod_usuario()==$codigoUsuario) {
      // $verficar->setCod_reserva($res->getCod_reserva());
      // $verficar->setCod_usuario($res->getCod_usuario());
      // $verficar->setCod_documento($res->getCod_documento());
       $verficar->setEstado('Activated');
       ManejoReservation::modifyReservationStatus($verficar);

   }else{
    $res->setCod_usuario($codigoUsuario);
    $res->setCod_documento($codDoc);
    $res->setEstado('Activated');
    $res->setFecha_Inicial($fechaActual);
    $res->setFecha_Limite_Entrega('2022-12-4');
    $res->setFecha_Entrega('2022-12-4');
    ManejoReservation::createReservation($res);

   }
    

    
    ManejoDocument::modify($doc);
}

echo '<script>
        alert("The document has been reserved")
        window.location="../User.php?menu=info:' . $codDoc . '";
        </script>';
