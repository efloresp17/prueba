<?php
    /**
     * Import classes
     */	
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/ReservationDAO.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/Util/Conexion.php';
	

	class ManejoReservation{
		
        /**
         * Atribute for the connection to  the database
         */
        private static $conexionBD;		

		function __construct(){
			
		}

        public static function consultReservationDate($codReservation){

            $ReservationDAO = ReservationDAO::getReservationDAO(self::$conexionBD);
            $Reservation = $ReservationDAO->consult_date($codReservation);
            return $Reservation;
        }

        public static function consultReservationStatus($codReservation){

            $ReservationDAO = ReservationDAO::getReservationDAO(self::$conexionBD);
            $Reservation = $ReservationDAO->consult_status($codReservation);
            return $Reservation;
        }


        public static function consultReservationDocumentDate($cod_documento,$cod_usuario){

            $ReservationDAO = ReservationDAO::getReservationDAO(self::$conexionBD);
            $Reservation = $ReservationDAO->consultReservationDocumentDate($cod_documento,$cod_usuario);
            return $Reservation;
        }

        public static function consultReservationDocumentStatus($cod_documento,$cod_usuario){

            $ReservationDAO = ReservationDAO::getReservationDAO(self::$conexionBD);
            $Reservation = $ReservationDAO->consultReservationDocumentStatus($cod_documento,$cod_usuario);
            return $Reservation;
        }


        /**
         * List of Reservations By User
         * @return Reservations[] List of all the reservations in the Data Base
         */

        public static function getReservationDocumentByUserDate($cod_usuario){

            $ReservationDAO = ReservationDAO::getReservationDAO(self::$conexionBD);
            $Reservation = $ReservationDAO->getListReservationByUserDate($cod_usuario);
            return $Reservation;
        }

        /**
         * List of Reservations By User
         * @return Reservations[] List of all the reservations in the Data Base
         */

        public static function getReservationDocumentByUserStatus($cod_usuario){

            $ReservationDAO = ReservationDAO::getReservationDAO(self::$conexionBD);
            $Reservation = $ReservationDAO->getListReservationByUserStatus($cod_usuario);
            return $Reservation;
        }

        /**
         * Create an Reservation
         * @param Reservation Reservation to create
         * @return void
         */
        public static function createReservation($reservation){
            $reservationDAO=ReservationDAO::getReservationDAO(self::$conexionBD);
            $reservationDAO->create($reservation);
        }

        /**
         * Modify an reservation
         * @param Reservation reservation to modify
         * @return void
         */
        public static function modifyReservationDate($reservation){
            $reservationDAO=ReservationDAO::getReservationDAO(self::$conexionBD);
            $reservationDAO->modifyDate($reservation);
        }

        /**
         * Modify an reservation
         * @param Reservation reservation to modify
         * @return void
         */
        public static function modifyReservationStatus($reservation){
            $reservationDAO=ReservationDAO::getReservationDAO(self::$conexionBD);
            $reservationDAO->modifyStatus($reservation);
        }

        /**
         * List of Reservations
         * @return Reservations[] List of all the reservations in the Data Base
         */
        public  static function getListDate(){
            $reservationDAO=ReservationDAO::getReservationDAO(self::$conexionBD);
            $reservation=$reservationDAO->getListDate();
            return $reservation;
        }

        /**
         * List of Reservations
         * @return Reservations[] List of all the reservations in the Data Base
         */
        public  static function getListStatus(){
            $reservationDAO=ReservationDAO::getReservationDAO(self::$conexionBD);
            $reservation=$reservationDAO->getListStatus();
            return $reservation;
        }

        /**
         * List of Reservations
         * @return Reservations[] List of all the reservations in the Data Base
         */
        public  static function getListStatusAct($cod_usuario){
            $reservationDAO=ReservationDAO::getReservationDAO(self::$conexionBD);
            $reservation=$reservationDAO->getListReservationByUserStatusAct($cod_usuario);
            return $reservation;
        }

	    /**
	    * Change the conexion
	    */
	    public static function setConexionBD($conexionBD){
	                self::$conexionBD = $conexionBD;
	            }
	}
?>