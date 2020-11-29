<?php


require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/Document.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoDocument.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/Document_Type.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoDocument_Type.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/Presentation.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoPresentation.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoDocument::setConexionBD($conexion);
ManejoBook::setConexionBD($conexion);


//$user = new User();
//$user = ManejoUser::consultName($loadedBy);

$cod_doc = $_GET['cod_doc'];



ManejoPresentation::delete($cod_doc);
ManejoDocument::delete($cod_doc);


echo '<script>
alert("The document has delete")
window.location="User.php?menu=myProfileIndex";
</script>';
