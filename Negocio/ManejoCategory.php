<?php
    /**
     * Import classes
     */	
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/CategoryDAO.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/Util/Conexion.php';
	

	class ManejoCategory{
		
        /**
         * Atribute for the connection to  the database
         */
        private static $conexionBD;		

		function __construct(){
			
		}

        public static function consultCategory($codCategory){

            $categoryDAO = CategoryDAO::getCategoryDAO(self::$conexionBD);
            $category = $categoryDAO->consult($codCategory);
            return $category;
        }

        public static function consultCategoryName($nom){
            $categoryDAO = CategoryDAO::getCategoryDAO(self::$conexionBD);
            $category = $categoryDAO->consultName($nom);
            return $category;
        }

        /**
         * Create a category
         * @param Category Category to create
         * @return void
         */
        public static function createCategory($category){
            $categoryDAO=CategoryDAO::getCategoryDAO(self::$conexionBD);
            $categoryDAO->create($category);
        }

        /**
         * Modify a category
         * @param Category Category to modify
         * @return void
         */
        public static function modifyCategory($category){
            $categoryDAO=CategoryDAO::getCategoryDAO(self::$conexionBD);
            $categoryDAO->modify($category);
        }

        /**
         * List of Categories
         * @return Article[] List of all the categories in the Data Base
         */
        public  static function obtenerLista(){
            $categoryDAO=CategoryDAO::getCategoryDAO(self::$conexionBD);
            $category=$categoryDAO->getList();
            return $category;
        }

        /**
         * List of Categories
         * @return Article[] List of all the categories in the Data Base
         */
        public  static function buscarCategoria($nom){
            $categoryDAO=CategoryDAO::getCategoryDAO(self::$conexionBD);
            $categories=$categoryDAO->buscarCategoria($nom);
            return $categories;
        }


	    /**
	    * Change the conexion
	    */
	    public static function setConexionBD($conexionBD){
	                self::$conexionBD = $conexionBD;
	            }
	}
?>