<?php
	
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Editorial.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoEditorial.php';
session_start();
$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoEditorial::setConexionBD($conexion);

$cod = $_POST['cod'];

		
		$_SESSION['editorialAct'] = null ;
		
		    echo '';
		
?>