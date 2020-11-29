<?php
    /**
     * Amount of classes
     */	
	require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/persistencia/Util/Conexion.php';
	require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/persistencia/User_TypeDAO.php';


    class ManejoUser_Type{
        
        /**
         * Attribute for connection to the database
         */
        private static $conexion;

        /**
         * @var ManejoUser_Type
         */
        
		function __construct($conexion){
            
        }
        
        /**
	     * Consult a User_Type by his code type
	     *
	    * @param int $cod_t_usuario
	    * @return User_Type
	     */
        public static function consult($cod_t_usuario){

            $user_TypeDAO= User_TypeDAO::getUser_TypeDAO(self::$conexion);
            $user_type=$user_TypeDAO->consult($cod_t_usuario);
            return $user_type;
        }


        /**
         * Create a new User_Type
         * @param User_Type
         * @return void
         */
        public static function create($t_usuario){
            $user_TypeDAO= User_TypeDAO::getUser_TypeDAO(self::$conexion);
            $user_TypeDAO->create($t_usuario);
        }

        /**
         * Modify a User_Type
         * @param User_Type
         * @return void
         */
        public static function modify($t_usuario){
            $user_TypeDAO=User_TypeDAO::getUser_TypeDAO(self::$conexion);
            $user_TypeDAO->modify($t_usuario);
        }

        
        /**
         * List all User_Type
         * @return User_Type[] 
         */
        public static function getList(){
            
            $user_TypeDAO= User_TypeDAO::getUser_TypeDAO(self::$conexion);
            $user_type=$user_TypeDAO->getList();
            return $user_type;
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