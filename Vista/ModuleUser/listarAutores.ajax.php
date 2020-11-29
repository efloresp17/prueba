<?php
	
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Author.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoAuthor.php';
session_start();
$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoAuthor::setConexionBD($conexion);

$cod = $_POST['cod'];
$temp = $_POST['temp'];
		
		$autor = ManejoAuthor::consult($cod);
		
		if((array_search($autor, $_SESSION['list']))==false){
			array_push($_SESSION['list'],$autor);
			foreach ($_SESSION['list'] as $a) {
			$consecutivo = count($_SESSION['list']);
			if ($a->getCod_autor()==0) {
				$consecutivo++;
				echo '<label id="labelAut'.$consecutivo.'">'.$a->getNom_autor().' <span class="btn btn-sm btn-danger btn_borrar_Aut" id="'.$consecutivo.'" name="btn_borrarAut">remove</span></label>
				<input type="hidden" name="autorN'.$consecutivo.'" id="autorN'.$consecutivo.'" value="'.$a->getNom_autor().'">';

				}else{
				echo '<label >'.$a->getNom_autor().' <span class="btn btn-sm btn-danger btn_borrar_Aut" id="'.$a->getCod_autor().'" name="btn_borrarAut">remove</span></label>
				<input type="hidden" name="autor'.$a->getCod_autor().'" id="autor'.$a->getCod_autor().'" value="'.$a->getCod_autor().'">';
				}
			
		}


}

?>