<?php

require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Reservation.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/DAO.php';

/**
 *Represents the DAO of the reservation entity
 */
class ReservationDAO implements DAO{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

	/**
	 * Reference to a reservationDAO object
	 * @var reservationDAO
	 */
    private static $reservationDAO;

    //------------------------------------------
	// Builder
    //------------------------------------------
    
    /**
	 * Builder of the class
	 *
	 * @param Object $conexion
	 */
    private function __construct($conexion){
		$this->conexion=$conexion;
		//mysqli_set_charset($this->conexion, "utf8");
    }
    
	/**
	 * Method to query a reservation by his code type
	 *
	 * @param int $codReservation
	 * @return Reservation
	 */

    

    public function consult_date($codReservation){
        
        $sql = "SELECT * FROM RESERVA_FECHA WHERE cod_reserva = ".$codReservation;
        
        if(!$resultado = pg_query($this->conexion,$sql))die();
        $row = pg_fetch_array($resultado);

        $reservation = new Reservation();
        $reservation->setCod_reserva($row[0]);
        $reservation->setCod_usuario($row[1]);
        $reservation->setCod_documento($row[2]);
        $reservation->setFecha_Inicial($row[3]);
        $reservation->setFecha_Limite_Entrega($row[4]);
        $reservation->setFecha_Entrega($row[5]);

        return $reservation;
    }

    public function consult_status($codReservation){
        
        $sql = "SELECT * FROM RESERVA_ESTADO WHERE cod_reserva = ".$codReservation;
        
        if(!$resultado = pg_query($this->conexion,$sql))die();
        $row = pg_fetch_array($resultado);

        $reservation = new Reservation();
        $reservation->setCod_reserva($row[0]);
        $reservation->setCod_usuario($row[1]);
        $reservation->setCod_documento($row[2]);
        $reservation->setEstado($row[3]);

        return $reservation;
    }


    public function consultReservationDocumentDate($cod_documento, $cod_usuario){
        
        $sql = "SELECT * FROM RESERVA_FECHA WHERE cod_documento = ".$cod_documento." and cod_usuario =".$cod_usuario.";" ;
        
        if(!$resultado = pg_query($this->conexion,$sql))die();
        $row = pg_fetch_array($resultado);

        $reservation = new Reservation();
        $reservation->setCod_reserva($row[0]);
        $reservation->setCod_usuario($row[1]);
        $reservation->setCod_documento($row[2]);
        $reservation->setFecha_Inicial($row[3]);
        $reservation->setFecha_Limite_Entrega($row[4]);
        $reservation->setFecha_Entrega($row[5]);
        return $reservation;
    }


    public function consultReservationDocumentStatus($cod_documento, $cod_usuario){
        
        $sql = "SELECT * FROM RESERVA_ESTADO WHERE cod_documento = ".$cod_documento." and cod_usuario =".$cod_usuario.";" ;
        
        if(!$resultado = pg_query($this->conexion,$sql))die();
        $row = pg_fetch_array($resultado);

        $reservation = new Reservation();
        $reservation->setCod_reserva($row[0]);
        $reservation->setCod_usuario($row[1]);
        $reservation->setCod_documento($row[2]);
        $reservation->setEstado($row[3]);

        return $reservation;
    }


	/**
	 * Method to create a new reservation
	 *
	 * @param Reservation $reservation
	 * @return void
	 */
    public function create ($reservation){

        $sql1 = "insert into RESERVA_FECHA ( cod_usuario,cod_documento,fecha_inicial,fecha_limite_entrega,fecha_entrega) 
        values (
                ".$reservation->getCod_usuario().",
                ".$reservation->getCod_documento().",
                '".$reservation->getFecha_Inicial()."',
                '".$reservation->getFecha_Limite_Entrega()."',
                '".$reservation->getFecha_Entrega()."'
                );";
                pg_Exec($this->conexion,$sql1);

        $sql2 = "insert into RESERVA_ESTADO (cod_usuario,cod_documento, estado) 
        values (
        ".$reservation->getCod_usuario().",
        ".$reservation->getCod_documento().",
        '".$reservation->getEstado()."'
        );";
        pg_Exec($this->conexion,$sql2);
    }

	/**
	 * Method that modifies a reservation entered by parameter
	 *
	 * @param Reservation $reservation
	 * @return void
	 */
    public function modifyDate ($reservation){
        
        $sql = "UPDATE RESERVA_FECHA SET cod_reserva =".$reservation->getCod_reserva().",
                                    cod_usuario = ".$reservation->getCod_usuario().",                           
                                    cod_documento = ".$reservation->getCod_documento().",                           
                                   fecha_inicial=  '".$reservation->getFecha_Inicial()."',
                                   fecha_limite_entrega = '".$reservation->getFecha_Limite_Entrega()."',
                                   fecha_entrega= '".$reservation->getFecha_Entrega()."'
                                   where cod_reserva = ".$reservation->getCod_reserva().";";
        //echo $sql1;                                   
        pg_Exec($this->conexion,$sql);
    }
    
    public function modifyStatus ($reservation){
        $sql = "UPDATE RESERVA_ESTADO SET cod_reserva =".$reservation->getCod_reserva().",
                                    cod_usuario = ".$reservation->getCod_usuario().",                           
                                    cod_documento = ".$reservation->getCod_documento().",                           
                                   estado= '".$reservation->getEstado()."'
                                   where cod_reserva = ".$reservation->getCod_reserva().";";
        //echo $sql2;
        pg_Exec($this->conexion,$sql);
    }

	/**
	 * Method to get an ReservationDAO object
	 *
	 * @param Object $conexion
	 * @return ReservationDAO
	 */
    public function getListDate(){
        
        $sql = "SELECT * FROM RESERVA_FECHA";

        if(!$resultado = pg_query($this->conexion, $sql));

        $reservation = array();

        while($row = pg_fetch_array($resultado))
        {   
            $reservation = $this->consult_fecha($row[0]);
            $reservations[] = $reservation;
        }
        return $reservations;
    }

    public function getListStatus(){
        
        $sql = "SELECT * FROM RESERVA_ESTADO";

        if(!$resultado = pg_query($this->conexion, $sql));

        $reservation = array();

        while($row = pg_fetch_array($resultado))
        {   
            $reservation = $this->consult_estado($row[0]);
            $reservations[] = $reservation;
        }
        return $reservations;
    }


    /**
	 * Method to get an ReservationDAO object
	 *
	 * @param Object $conexion
	 * @return ReservationDAO
	 */
    public function getListReservationByUserDate($cod_usuario){
        
        $sql = "SELECT * FROM RESERVA_FECHA WHERE cod_usuario=".$cod_usuario."";

        if(!$resultado = pg_query($this->conexion, $sql));

        $reservations = array();

        while($row = pg_fetch_array($resultado))
        {   
            $reservation= new Reservation();
            $reservation->setCod_reserva($row[0]);
            $reservation->setCod_usuario($row[1]);
            $reservation->setCod_documento($row[2]);
            $reservation->setFecha_Inicial($row[3]);
            $reservation->setFecha_Limite_Entrega($row[4]);
            $reservation->setFecha_Entrega($row[5]);
            $reservations[]=$reservation;
        }
        return $reservations;
    }

    /**
	 * Method to get an ReservationDAO object
	 *
	 * @param Object $conexion
	 * @return ReservationDAO
	 */
    public function getListReservationByUserStatus($cod_usuario){
        
        $sql = "SELECT * FROM RESERVA_ESTADO WHERE cod_usuario=".$cod_usuario."";

        if(!$resultado = pg_query($this->conexion, $sql));

        $reservations = array();

        while($row = pg_fetch_array($resultado))
        {   
            $reservation= new Reservation();
            $reservation->setCod_reserva($row[0]);
            $reservation->setCod_usuario($row[1]);
            $reservation->setCod_documento($row[2]);
            $reservation->setEstado($row[3]);
            $reservations[]=$reservation;
        }
        return $reservations;
    }


    public function getListReservationByUserStatusAct($cod_usuario){
        
        $sql = "SELECT * FROM RESERVA_ESTADO WHERE cod_usuario=".$cod_usuario." AND estado='Activated';";

        if(!$resultado = pg_query($this->conexion, $sql));

        $reservations = array();

        while($row = pg_fetch_array($resultado))
        {   
            $reservation= new Reservation();
            $reservation->setCod_reserva($row[0]);
            $reservation->setCod_usuario($row[1]);
            $reservation->setCod_documento($row[2]);
            $reservation->setEstado($row[3]);
            $reservations[]=$reservation;
        }
        return $reservations;
    }

    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return ReservationDAO
     */
    public static function getReservationDAO($conexion) {
        if(self::$reservationDAO == null) {
            self::$reservationDAO = new ReservationDAO($conexion);
        }

        return self::$reservationDAO;
    }

    public function delete($codReservation){
        //Se necesita por el IMPLEMENTS DAO!!!
    }

    public function consult($codReservation){
        //Se necesita por el IMPLEMENTS DAO!!!
    }

    public function getList(){
        //Se necesita por el IMPLEMENTS DAO!!!
    }
    public function modify($codReservation){
        //Se necesita por el IMPLEMENTS DAO!!!
    }
}
