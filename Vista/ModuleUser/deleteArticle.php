<?php


require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/Document.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoDocument.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/Document_Type.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoDocument_Type.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/Article.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoArticle.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoDocument::setConexionBD($conexion);
ManejoArticle::setConexionBD($conexion);


//$user = new User();
//$user = ManejoUser::consultName($loadedBy);

$cod_doc = $_GET['cod_doc'];



ManejoArticle::deleteArticle($cod_doc);
ManejoDocument::delete($cod_doc);


echo '<script>
alert("The document has delete")
window.location="User.php?menu=myProfileIndex";
</script>';
