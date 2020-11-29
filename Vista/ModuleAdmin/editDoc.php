<?php
session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/negocio/Document.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/negocio/ManejoDocument.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/Util/Conexion.php';

$codBook = $_POST["codBook"];
$docType = $_POST['docType'];
$updatedBy = $_POST['updatedBy'];
$codEditorial = $_POST['codEditorial'];
$title = $_POST['title'];
$quantity = $_POST['quantity'];
$creationDate = $_POST['creationDate'];
$status = $_POST['status'];
$rutaPDF = $_POST['rutaPDF'];

$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoDocument::setConexionBD($conexion);

$document = ManejoDocument::consult($codBook);

$document->setCod_t_documento($docType);
$document->setCod_editorial($codEditorial);
$document->setTitulo($title);
$document->setCantidad($quantity);
$document->setFecha_creacion($creationDate);
$document->setCod_estado($status);
$document->setPdf($rutaPDF);
$document->setCod_usuario_accion($_SESSION['codUser']);

ManejoDocument::modify($document);
if($docType==1){
    echo '<script>
    window.location="../Admin.php?menu=books";
    </script>';
}elseif($docType==2){
    echo '<script>
    window.location="../Admin.php?menu=articles";
    </script>';
}elseif($docType==3){
    echo '<script>
    window.location="../Admin.php?menu=presentation";
    </script>';
}


?>