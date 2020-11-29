<?php
    /**
     * Amount of classes
     */	
	require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/persistencia/Util/Conexion.php';
	require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/persistencia/Reservation_StatusDAO.php';


    class ManejoReservation_Status{
        
        /**
         * Attribute for connection to the database
         */
        private static $conexion;

        /**
         * @var ManejoReservation_Status
         */
        
		function __construct($conexion){
            
        }
        
        /**
	     * Consult a reservation status by his code
	     *
	    * @param int $cod_estado_estado
	    * @return Reservation_Status
	     */
        public static function consult($cod_estado_reserva){

            $reservation_StatuseDAO= Reservation_StatusDAO::getReservation_StatusDAO(self::$conexion);
            $reservation_status=$reservation_StatuseDAO->consult($cod_estado_reserva);
            return $reservation_status;
        }


        /**
         * Create a new Reservation_Status
         * @param Reservation_Status
         * @return void
         */
        public static function create($est){            
            $reservation_StatuseDAO= Reservation_StatusDAO::getReservation_StatusDAO(self::$conexion);
            $reservation_StatuseDAO->create($est);
        }

        /**
         * Modify a Reservation_Status
         * @param Reservation_Status
         * @return void
         */
        public static function modify($est){
            $reservation_StatuseDAO= Reservation_StatusDAO::getReservation_StatusDAO(self::$conexion);
            $reservation_StatuseDAO->modify($est);
        }

        
        /**
         * List all Reservation_Status
         * @return Reservation_Status[] 
         */
        public static function getList(){
            
            $reservation_StatuseDAO= Reservation_StatusDAO::getReservation_StatusDAO(self::$conexion);
            $reservation_status=$reservation_StatuseDAO->getList();
            return $reservation_status;
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