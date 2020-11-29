<?php
    /**
     * Amount of classes
     */	
	require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/persistencia/Util/Conexion.php';
	require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/persistencia/StateDAO.php';


    class ManejoState{
        
        /**
         * Attribute for connection to the database
         */
        private static $conexion;

        /**
         * @var ManejoState
         */
        
		function __construct($conexion){
            
        }
        
        /**
	     * Consult a State by his code type
	     *
	    * @param int $cod_estado
	    * @return State
	     */
        public static function consult($cod_estado){

            $stateDAO= StateDAO::getStateDAO(self::$conexion);
            $state=$stateDAO->consult($cod_estado);
            return $state;
        }


        /**
         * Create a new State
         * @param State
         * @return void
         */
        public static function create($est){
            $stateDAO=StateDAO::getStateDAO(self::$conexion);
            $stateDAO->create($est);
        }

        /**
         * Modify a State
         * @param State
         * @return void
         */
        public static function modify($est){
            $stateDAO=StateDAO::getStateDAO(self::$conexion);
            $stateDAO->modify($est);
        }

        
        /**
         * List all State
         * @return State[] 
         */
        public static function getList(){
            
            $stateDAO=StateDAO::getStateDAO(self::$conexion);
            $ests=$stateDAO->getList();
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