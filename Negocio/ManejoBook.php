<?php
    /**
     * Amount of classes
     */	
	require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/persistencia/Util/Conexion.php';
	require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/persistencia/BookDAO.php';

	class ManejoBook{

        /**
         * Attribute for connection to the database
         */
        private static $conexion;
        
        /**
         * @var ManejoBook
         */
        
        //private static $manejoBook;

		function __construct($conexion){
            
		}

        public static function consultBook($codigo){

            $bookDAO= BookDAO::getBookDAO(self::$conexion);
            $book=$bookDAO->consult($codigo);
            return $book;
        }

        /**
         * Create a new Book
         * @param Book Book to enter
         * @return void
         */
        public static function createBook($book){
            $bookDAO=BookDAO::getBookDAO(self::$conexion);
            $bookDAO->create($book);
        }

        /**
         * Modify a book
         * @param Book Book to modify
         * @return void
         */
        public static function modifyBook($book){
            $bookDAO=BookDAO::getBookDAO(self::$conexion);
            $bookDAO->modify($book);
        }

        public static function deleteBook($book){
            $bookDAO=BookDAO::getBookDAO(self::$conexion);
            $bookDAO->delete($book);
        }

        /**
         * List all books
         * @return Book[] List all books of the data base.
         */
        public static function getList(){
            
            $bookDAO=BookDAO::getBookDAO(self::$conexion);
            $books=$bookDAO->getList();
            return $books;
        }

        public static function getBookList(){
            
            $bookDAO=BookDAO::getBookDAO(self::$conexion);
            $books=$bookDAO->getListBook();
            return $books;
        }

        public static function setConexionBD($conexion){
            self::$conexion = $conexion;
        }

	}
?>