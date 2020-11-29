<?php
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Category.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/negocio/User.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Document.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoDocument.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Book.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoBook.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Presentation.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoPresentation.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Article.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoArticle.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Editorial.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoEditorial.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/State.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoState.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoCategory.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Document_Category.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoDocument_Category.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoDocument_Type.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Author.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoAuthor.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoAuthor_Document.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoUser.php';

 $obj = new Conexion();
 $conexion = $obj->conectarDB();

 ManejoDocument::setConexionBD($conexion);
 ManejoDocument_Type::setConexionBD($conexion);
 ManejoBook::setConexionBD($conexion);
 ManejoPresentation::setConexionBD($conexion);
 ManejoArticle::setConexionBD($conexion);
 ManejoUser::setConexionBD($conexion);
 ManejoEditorial::setConexionBD($conexion);
 ManejoState::setConexionBD($conexion);
 ManejoAuthor_Document::setConexionBD($conexion);
 ManejoDocument_Category::setConexionBD($conexion);
 ManejoCategory::setConexionBD($conexion);
 ManejoAuthor::setConexionBD($conexion);

session_start();

$titulo = $_POST['title'];
$tipo = $_POST['tipo'];


$categoria = $_POST['categoria'];
$autor = $_POST['autor'];
$archivo = $_POST['archivo'];
$codigoUsuario = $_SESSION['codUser'];
$usuarioActual = ManejoUser::consultUser($codigoUsuario);


$nuevoDocumento = new Document();
$nuevoDocumento->setSubido_por($usuarioActual->getCod_usuario());

$nuevoDocumento->setCod_t_documento($tipo);

$nuevoDocumento->setCod_editorial(0);

$nuevoDocumento->setCod_estado(3);
$nuevoDocumento->setCantidad(1);
$nuevoDocumento->setNum_vistas(0);
$nuevoDocumento->setTitulo($titulo);
$nuevoDocumento->setPdf($archivo);
$nuevoDocumento->setCod_estado_documento(3);
$nuevoDocumento->setCod_estado_reserva(2);
$nuevoDocumento->setCantidad_vistas(0);
$nuevoDocumento->setCod_usuario_accion($usuarioActual->getCod_usuario());
ManejoDocument::create($nuevoDocumento);
$docActual = ManejoDocument::consultDocumentByName($nuevoDocumento->getTitulo());
if($docActual){
	
	if ($docActual->getCod_t_documento()==1) {
		$book = new Book();
		$book->setCod_documento($docActual->getCod_documento());
		$book->setFecha_publicacion($_POST['publicationDate']);
		$book->setIsbn($_POST['isbn']);
		$book->setTotal_paginas($_POST['pages']);
		ManejoBook::createBook($book);
	}
	if ($docActual->getCod_t_documento()==2) {
		$article = new Article();
		$article->setCod_documento($docActual->getCod_documento());
		$article->setFecha_publicacion($_POST['publicationDate']);
		$article->setSsn($_POST['ssn']);
		ManejoArticle::createArticle($article);
		
	}
	if ($docActual->getCod_t_documento()==3) {
		$presentation = new Presentation();
		$presentation->setCod_documento($docActual->getCod_documento());
		$presentation->setFecha_publicacion($_POST['publicationDate']);
		$presentation->setIsbn($_POST['isbn']);
		$presentation->setNombre_Congreso($_POST['congressName']);
		ManejoPresentation::create($presentation);
	}

	foreach ($_SESSION['listCat'] as $c) {
		if ($c->getCod_categoria()==0) {
			$category = new Category();
			$category->setNom_categoria($c->getNom_categoria());
			ManejoCategory::createCategory($category);
			$categoryA = ManejoCategory::consultCategoryName($category->getNom_categoria());
			if ($categoryA) {
				$documento_categoria = new Document_Category();
				$documento_categoria->setCod_documento($docActual->getCod_documento());
				$documento_categoria->setCod_categoria($categoryA->getCod_categoria());
				ManejoDocument_Category::create($documento_categoria);
			}
		}else{
			$documento_categoria = new Document_Category();
			$documento_categoria->setCod_documento($docActual->getCod_documento());
			$documento_categoria->setCod_categoria($c->getCod_categoria());
			ManejoDocument_Category::create($documento_categoria);
		}
		
	}

	foreach ($_SESSION['list'] as $a) {
		if ($a->getCod_autor()==0) {
			$autor = new Author();
			$autor->setNom_autor($a->getNom_autor());
			ManejoAuthor::create($autor);
			$autorA = ManejoAuthor::consultByName($autor->getNom_autor());
			if ($autorA) {
				$autor_documento = new Author_Document();
				$autor_documento->setCod_documento($docActual->getCod_documento());
				$autor_documento->setCod_autor($autorA->getCod_autor());
				ManejoAuthor_Document::create($autor_documento);
			}		
		}else{
			$autor_documento = new Author_Document();
			$autor_documento->setCod_documento($docActual->getCod_documento());
			$autor_documento->setCod_autor($a->getCod_autor());
			ManejoAuthor_Document::create($autor_documento);
		}
		
	}

 	if ($_SESSION['editorialAct']->getCod_editorial()==0){
 		$editorialNueva = new Editorial();
 		$editorialNueva->setNom_editorial($_SESSION['editorialAct']->getNom_editorial());

 		ManejoEditorial::create($editorialNueva);
 		$editorial = ManejoEditorial::consultNombre($editorialNueva->getNom_editorial());
 		if ($editorial){
 			
 		 	$docActual->setCod_editorial($editorial->getCod_editorial());
 		 	ManejoDocument::modify($docActual);
 		 }
 	}else{
 		$docActual->setCod_editorial($_SESSION['editorialAct']->getCod_editorial());
 		ManejoDocument::modify($docActual);
 	}
 	echo '<script>
		alert("The document has created")
		window.location="../User.php?menu=MyProfile";
		</script>';

}

?>