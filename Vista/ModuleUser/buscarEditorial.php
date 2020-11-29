<?php
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Editorial.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoEditorial.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoEditorial::setConexionBD($conexion);

$nom = $_GET['editorial'];

		if (strlen($nom) > 2) {
			$editoriales = ManejoEditorial::buscarEditorial($nom);
			if ($editoriales) {
			
				echo '<option value="0">Select the Editorial</option>';
				foreach ($editoriales as $e) {
				echo '<option value="'.$e->getCod_editorial().'">'.$e->getNom_editorial().'</option>';
				}
		}else{
			echo '';
		}
	}

?>