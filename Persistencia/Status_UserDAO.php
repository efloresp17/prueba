<?php
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Status_User.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/DAO.php';

/**
 *Represents the DAO of the state entity
 */
class Status_UserDAO implements DAO{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

	/**
	 * Reference to a stateDAO object
	 * @var status_UserDAO
	 */
    private static $status_UserDAO;

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
	 * Method to query a State by his code type
	 *
	 * @param int $cod_estado
	 * @return Status_User
	 */
    public function consult($cod_estado){
        
        $sql = "SELECT * FROM ESTADO_USUARIO WHERE cod_estado = ".$cod_estado;
        
        if(!$resultado = pg_Exec($this->conexion,$sql));
        $row = pg_fetch_array($resultado);

        $est = new Status_User();
        $est->setCod_estado($row[0]);
        $est->setNom_estado($row[1]);

        return $est;
    }

    /**
	 * Method to create a new state
	 *
	 * @param Status_User $est
	 * @return void
	 */
    public function create ($est){

        $sql = "INSERT INTO ESTADO_USUARIO VALUES (".$est->getCod_estado().",
                                            '".$est->getNom_estado()."'
                                            );";

        pg_Exec($this->conexion,$sql);
    }

    /**
	 * Method that modifies a state entered by parameter
	 *
	 * @param Status_User $est
	 * @return void
	 */
    public function modify ($est){
        
        $sql = "UPDATE ESTADO_USUARIO SET cod_estado = ".$est->getCod_estado().",                                 
                                   nom_estado = '".$est->getNom_estado()."'                                 
                                   where cod_estado = ".$est->getCod_estado().";";
        pg_Exec($this->conexion,$sql);
    }

    /**
	 * Method to get all states
	 *
	 * @return Status_User
	 */
    public function getList(){
        
        $sql = "SELECT * FROM ESTADO_USUARIO";
        $ests = array();
        if(!$resultado = pg_Exec($this->conexion, $sql));

        while($row = pg_fetch_array($resultado))
        {   
            $est = New Status_User();
            $est->setCod_estado($row[0]);
            $est->setNom_estado($row[1]);
            $ests[] = $est;
        }
        return $ests;
    }

    /**
	* Method to delete a state
	* @param $cod_estado
	* @return Status_User
	*/
    public function delete($cod_estado){
        $sql = "DELETE FROM ESTADO_USUARIO WHERE cod_estado=".$cod_estado;
        pg_Exec($this->conexion, $sql);
    }

    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return Status_UserDAO
     */
    public static function getStatus_UserDAO($conexion) {
        if(self::$status_UserDAO == null) {
            self::$status_UserDAO = new Status_UserDAO($conexion);
        }

        return self::$status_UserDAO;
    }

}

?>