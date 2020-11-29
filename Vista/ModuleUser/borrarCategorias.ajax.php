<?php
	
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Category.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoCategory.php';
session_start();
$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoCategory::setConexionBD($conexion);

$cod = $_POST['cod'];
$temp = $_POST['temp'];
$nom = isset($_POST['nom'])?$_POST['nom']:'';
$consecutivo = count($_SESSION['listCat']);	

		if ($nom != ''){
			$category = new Category();
			$category->setNom_categoria($nom);
			$clave = array_search($category, $_SESSION['listCat']);
		}else{
			$category = ManejoCategory::consultCategory($cod);
			$clave = array_search($category, $_SESSION['listCat']);
		}

		
		if ($clave  >= 0) {
		    unset($_SESSION['listCat'][$clave]);
		    foreach ($_SESSION['listCat'] as $c) {
				if ($c->getCod_categoria()==0) {
				$consecutivo++;
				echo '<label id="labelCat'.$consecutivo.'" >'.$c->getNom_categoria().' <span class="btn btn-sm btn-danger btn_borrar_Cat" id="'.$consecutivo.'" name="btn_borrarCat" id="btn_borrarCat">remove</span></label>
				<input type="hidden" name="categoryN'.$consecutivo.'" id="categoryN'.$consecutivo.'" value="'.$c->getNom_categoria().'">';	
				}else{
			echo '<label>'.$c->getNom_categoria().' <span class="btn btn-sm btn-danger btn_borrar_Cat" id="'.$c->getCod_categoria().'" name="btn_borrarCat" id="btn_borrarCat">remove</span></label>
				<input type="hidden" name="category'.$c->getCod_categoria().'" id="category'.$c->getCod_categoria().'" value="'.$c->getCod_categoria().'">';	

				}
			}
		}
?>