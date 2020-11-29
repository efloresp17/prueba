<?php
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Reservation_Status.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/DAO.php';

/**
 *Represents the DAO of the reservation status entity
 */
class Reservation_StatusDAO implements DAO{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

	/**
	 * Reference to a Reservation StatusDAO object
	 * @var reservation_StatusDAO
	 */
    private static $reservation_StatusDAO;

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
    }

    /**
	 * Method to query a reservation status by his code
	 *
	 * @param int $cod_estado_reserva
	 * @return reservation_status
	 */
    public function consult($cod_estado_reserva){
        
        $sql = "SELECT * FROM ESTADO_RESERVA WHERE cod_estado_reserva = ".$cod_estado_reserva;
        
        if(!$resultado = pg_Exec($this->conexion,$sql));
        $row = pg_fetch_array($resultado);

        $reservation_status = new Reservation_Status();
        $reservation_status->setCod_estado_reserva($row[0]);
        $reservation_status->setNom_estado_reserva($row[1]);

        return $reservation_status;
    }

    /**
	 * Method to create a new Reservation Status
	 *
	 * @param reservation_status $est
	 * @return void
	 */
    public function create ($reservation_status){

        $sql = "INSERT INTO ESTADO_RESERVA VALUES (".$reservation_status->getCod_estado_reserva().",
                                            '".$reservation_status->getNom_estado_reserva()."'
                                            );";

        pg_Exec($this->conexion,$sql);
    }

    /**
	 * Method that modifies a reservation status entered by parameter
	 *
	 * @param reservation_status $est
	 * @return void
	 */
    public function modify ($reservation_status){
        
        $sql = "UPDATE ESTADO_RESERVA SET cod_estado_reserva = ".$reservation_status->getCod_estado_reserva().",                                 
                                   nom_estado_reserva = '".$reservation_status->getNom_estado_reserva()."'                                 
                                   where cod_estado_reserva = ".$reservation_status->getCod_estado_reserva().";";
        pg_Exec($this->conexion,$sql);
    }

    /**
	 * Method to get all reservation status
	 *
	 * @return Reservation_Status
	 */
    public function getList(){
        
        $sql = "SELECT * FROM ESTADO_RESERVA";
        $reservation_statu = array();
        if(!$resultado = pg_Exec($this->conexion, $sql));

        while($row = pg_fetch_array($resultado))
        {   
            $reservation_status = New Reservation_Status();
            $reservation_status->setCod_estado_reserva($row[0]);
            $reservation_status->setNom_estado_reserva($row[1]);
            $reservation_statu[] = $reservation_status;
        }
        return $reservation_statu;
    }

    /**
	* Method to delete a reservation status
	* @param $cod_estado_reservation
	* @return Reservation_Status
	*/
    public function delete($cod_estado_reserva){
        $sql = "DELETE FROM ESTADO_RESERVA WHERE cod_estado_reserva=".$cod_estado_reserva;
        pg_Exec($this->conexion, $sql);
    }

    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return reservation_StatusDAO
     */
    public static function getReservation_StatusDAO($conexion) {
        if(self::$reservation_StatusDAO == null) {
            self::$reservation_StatusDAO = new Reservation_StatusDAO($conexion);
        }

        return self::$reservation_StatusDAO;
    }

}

?>