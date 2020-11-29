<?php
session_start();
$title= $_POST['title'];
$quanity = $_POST['quantity'];
$loadedBy = $_POST['loadedBy'];
$typeOfDocument = $_POST['typeOfDocument'];
$publisher = $_POST['publisher'];
$state = $_POST['state'];
$date = $_POST['date'];
$ssn = $_POST['ssn'];
$code = $_GET['cod_doc'];
$reservation = $_POST['reservation'];

require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Document.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoDocument.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Document_Type.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoDocument_Type.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Book.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoBook.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Presentation.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoPresentation.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Article.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoArticle.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoUser.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/User.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Editorial.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoEditorial.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/State.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoState.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/Reservation_Status.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoReservation_Status.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoDocument::setConexionBD($conexion);
ManejoBook::setConexionBD($conexion);
ManejoArticle::setConexionBD($conexion);
ManejoUser::setConexionBD($conexion);
ManejoPresentation::setConexionBD($conexion);


$codigoUsuario = $_SESSION['codUser'];
$codigoUsuarioActual = ManejoUser::consultUser($codigoUsuario);


$document = ManejoDocument::consult($codigoUsuarioActual->getCod_usuario());
$document->setCod_documento($code);
$document->setTitulo($title);
$document->setCantidad($quanity);
$document->setSubido_por($codigoUsuarioActual->getCod_usuario());
$document->setFecha_creacion($date);
$document->setCod_editorial($publisher);
$document->setCod_estado($state);
$document->setCod_t_documento($typeOfDocument);
$document->setCod_estado_reserva($reservation);

$article = ManejoArticle::consultArticle($codigoUsuarioActual->getCod_usuario());
$article->setCod_documento($code);
$article->setFecha_publicacion($date);
$article->setSsn($ssn);

ManejoDocument::modify($document);
ManejoArticle::modifyArticle($article);

echo '<script>
alert("The document has modified")
window.location="../User.php?menu=MyProfile";
</script>';

?>