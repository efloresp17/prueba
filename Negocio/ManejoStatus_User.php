<?php
    /**
     * Amount of classes
     */	
	require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/persistencia/Util/Conexion.php';
	require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/persistencia/Status_UserDAO.php';


    class ManejoStatus_User{
        
        /**
         * Attribute for connection to the database
         */
        private static $conexion;

        /**
         * @var ManejoStatus_User
         */
        
		function __construct($conexion){
            
        }
        
        /**
	     * Consult a State by his code type
	     *
	    * @param int $cod_estado
	    * @return Status_User
	     */
        public static function consult($cod_estado){

            $status_UserDAO= Status_UserDAO::getStatus_UserDAO(self::$conexion);
            $status_User=$status_UserDAO->consult($cod_estado);
            return $status_User;
        }


        /**
         * Create a new State
         * @param Status_User
         * @return void
         */
        public static function create($est){
            $status_UserDAO=status_UserDAO::getStatus_UserDAO(self::$conexion);
            $status_UserDAO->create($est);
        }

        /**
         * Modify a State
         * @param Status_User
         * @return void
         */
        public static function modify($est){
            $status_UserDAO=status_UserDAO::getStatus_UserDAO(self::$conexion);
            $status_UserDAO->modify($est);
        }

        
        /**
         * List all State
         * @return Status_User[] 
         */
        public static function getList(){
            
            $status_UserDAO=Status_UserDAO::getStatus_UserDAO(self::$conexion);
            $ests=$status_UserDAO->getList();
            return $ests;
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