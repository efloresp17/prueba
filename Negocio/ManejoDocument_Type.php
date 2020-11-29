<?php
    /**
     * Amount of classes
     */	
	require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/persistencia/Util/Conexion.php';
	require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/persistencia/Document_TypeDAO.php';


    class ManejoDocument_Type{
        
        /**
         * Attribute for connection to the database
         */
        private static $conexion;

        /**
         * @var ManejoDocument_Type
         */
        
		function __construct($conexion){
            
        }
        
        /**
	     * Consult a Document_Type by his code type
	     *
	    * @param int $cod_t_documento
	    * @return Document_Type
	     */
        public static function consult($cod_t_documento){

            $document_TypeDAO= Document_TypeDAO::getDocument_TypeDAO(self::$conexion);
            $document_type=$document_TypeDAO->consult($cod_t_documento);
            return $document_type;
        }


        /**
         * Create a new Document_Type
         * @param Document_Type
         * @return void
         */
        public static function create($t_documento){
            $document_TypeDAO=Document_TypeDAO::getDocument_TypeDAO(self::$conexion);
            $document_TypeDAO->create($t_documento);
        }

        /**
         * Modify a Document_Type
         * @param Document_Type
         * @return void
         */
        public static function modify($t_documento){
            $document_TypeDAO=Document_TypeDAO::getDocument_TypeDAO(self::$conexion);
            $document_TypeDAO->modify($t_documento);
        }

        
        /**
         * List all Document_Type
         * @return Document_Type[] 
         */
        public static function getList(){
            
            $document_TypeDAO=Document_TypeDAO::getDocument_TypeDAO(self::$conexion);
            $t_documentos=$document_TypeDAO->getList();
            return $t_documentos;
        }
        
         /**
         * Reference to the connection with the database
         * @var Object
         */
        public static function setConexionBD($conexion){
            self::$conexion = $conexion;
        }

    }
?>