<?php
	
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Editorial.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoEditorial.php';
session_start();
$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoEditorial::setConexionBD($conexion);

$temp = $_POST['temp'];
$nom = $_POST['nom'];
$editorial = new editorial();
$editorial->setCod_editorial(0);
$editorial->setNom_editorial($nom);
$_SESSION['editorialAct'] = $editorial;
			echo '<label>'.$editorial->getNom_editorial().' <span class="btn btn-sm btn-danger btn_borrar_Edi" id="'.$editorial->getCod_editorial().'" name="btn_borrarAut" id="btn_borrarEdi">remove</span></label>
			<input type="hidden" name="editorial'.$editorial->getCod_editorial().'" id="editorial'.$editorial->getCod_editorial().'" value="'.$editorial->getNom_editorial().'">';
			
		
?>