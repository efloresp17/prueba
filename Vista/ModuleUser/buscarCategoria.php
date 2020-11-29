<?php
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Category.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoCategory.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoCategory::setConexionBD($conexion);

$nom = $_GET['categoria'];

		if (strlen($nom) > 2) {
			$categorias = ManejoCategory::buscarCategoria($nom);
			if ($categorias) {
			
				echo '<option value="0">Select the Categories</option>';
				foreach ($categorias as $c) {
				echo '<option value="'.$c->getCod_categoria().'">'.$c->getNom_categoria().'</option>';
				}
		}else{
			echo '';
		}
	}

?>