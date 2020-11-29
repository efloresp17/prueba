<?php
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Author.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoAuthor.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoAuthor::setConexionBD($conexion);

$nom = $_GET['autor'];

		if (strlen($nom) > 2) {
			$autores = ManejoAuthor::buscarAutor($nom);
			if ($autores) {
			
				echo '<option value="0">Select the Autor</option>';
				foreach ($autores as $a) {
				echo '<option value="'.$a->getCod_autor().'">'.$a->getNom_autor().'</option>';
				}
		}else{
			echo '';
		}
	}

?>