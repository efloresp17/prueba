<?php


require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/Document.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoDocument.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/Document_Type.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoDocument_Type.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/Article.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoArticle.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/Book.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoBook.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/Presentation.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoPresentation.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/User.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoUser.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoDocument::setConexionBD($conexion);
ManejoArticle::setConexionBD($conexion);
ManejoBook::setConexionBD($conexion);
ManejoPresentation::setConexionBD($conexion);
ManejoDocument_Type::setConexionBD($conexion);
ManejoUser::setConexionBD($conexion);

$emailActual = "jaimejaviergil@hotmail.com";
$codigoUsuarioActual = ManejoUser::consultEmail($emailActual);
$listDoc = ManejoDocument::consultDocumentsByUser($codigoUsuarioActual->getCod_usuario());

$cod_doc = $_GET['cod_doc'];
$cod_t_doc = $_GET['cod_t_doc'];

foreach ($listDoc as $doc) {


    if ($cod_t_doc == 1 && $cod_doc == $doc->getCod_documento()) {
        ManejoBook::deleteBook($cod_doc);
        ManejoDocument::delete($cod_doc);
    } else if ($cod_t_doc == 2 && $cod_doc == $doc->getCod_documento()) {

        ManejoArticle::deleteArticle($cod_doc);
        ManejoDocument::delete($cod_doc);
    } else if ($cod_t_doc == 3 && $cod_doc == $doc->getCod_documento()) {
        ManejoPresentation::delete($cod_doc);
        ManejoDocument::delete($cod_doc);
    }
}




echo '<script>
alert("The document has delete")
window.location="User.php?menu=MyProfile";
</script>';
