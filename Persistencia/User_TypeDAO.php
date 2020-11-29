<?php
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/User_Type.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/DAO.php';


/**
 *Represents the DAO of the book entity
 */
class User_TypeDAO implements DAO{

        /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

	/**
	 * Reference to a user_TypeDAO object
	 * @var user_TypeDAO
	 */
    private static $user_TypeDAO;
    
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
	 * Method to query a User_Type by his code type
	 *
	 * @param int $cod_t_usuario
	 * @return User_Type
	 */
    public function consult($cod_t_usuario){
        
        $sql = "SELECT * FROM T_USUARIO WHERE cod_t_usuario = ".$cod_t_usuario;
        
        if(!$resultado = pg_Exec($this->conexion,$sql));
        $row = pg_fetch_array($resultado);

        $t_usuario = new User_Type();
        $t_usuario->setCod_t_usuario($row[0]);
        $t_usuario->setNom_t_usuario($row[1]);

        return $t_usuario;
    }

    /**
	 * Method to create a new user type
	 *
	 * @param User_Type $t_usuario
	 * @return void
	 */
    public function create ($t_usuario){

        $sql = "INSERT INTO T_USUARIO VALUES (".$t_usuario->getCod_t_usuario().",
                                            '".$t_usuario->getNom_t_usuario()."'
                                            );";

        pg_Exec($this->conexion,$sql);
    }

    
    /**
	 * Method that modifies a user_type entered by parameter
	 *
	 * @param User_Type $t_usuario
	 * @return void
	 */
    public function modify ($t_usuario){
        
        $sql = "UPDATE T_USUARIO SET cod_t_usuario = ".$t_usuario->getCod_t_usuario().",                                 
                                   nom_t_usuario = '".$t_usuario->getNom_t_usuario()."'                                 
                                   where cod_t_usuario = ".$t_usuario->getCod_t_usuario().";";
        pg_Exec($this->conexion,$sql);
    }

     /**
	 * Method to get all users type
	 *
	 * @return User_Type
	 */
    public function getList(){
        
        $sql = "SELECT * FROM T_USUARIO";
        $t_usuarios = array();
        if(!$resultado = pg_Exec($this->conexion, $sql));

       
        while($row = pg_fetch_array($resultado))
        {   
            $t_usuario = New User_Type();
            $t_usuario->setCod_t_usuario($row[0]);
            $t_usuario->setNom_t_usuario($row[1]);
            $t_usuarios[] = $t_usuario;
        }
        return $t_usuarios;
    }


    /**
	* Method to delete a user type
	* @param $cod_t_usuario
	* @return User_Type
	*/
    public function delete($cod_t_usuario){
        $sql = "DELETE FROM T_USUARIO WHERE cod_t_usuario=".$cod_t_usuario;
        pg_Exec($this->conexion, $sql);
    }

    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return User_TypeDAO
     */
    public static function getUser_TypeDAO($conexion) {
        if(self::$user_TypeDAO == null) {
            self::$user_TypeDAO = new User_TypeDAO($conexion);
        }

        return self::$user_TypeDAO;
    }


}
?>