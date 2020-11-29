<?php
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Editorial.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/DAO.php';

/**
 *Represents the DAO of the editorial entity
 */
class EditorialDAO implements DAO{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

	/**
	 * Reference to a editorialDAO object
	 * @var EditorialDAO
	 */
    private static $EditorialDAO;

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
	 * Method to query a Editorial by his code type
	 *
	 * @param int $cod_t_documento
	 * @return Editorial
	 */
    public function consult($cod_editorial){
        
        $sql = "SELECT * FROM EDITORIAL WHERE cod_editorial = ".$cod_editorial;
        
        if(!$resultado = pg_Exec($this->conexion,$sql));
        $row = pg_fetch_array($resultado);

        $editorial = new Editorial();
        $editorial->setCod_editorial($row[0]);
        $editorial->setNom_editorial($row[1]);
        $editorial->setCorreo($row[2]);
        $editorial->setDireccion($row[3]);
        $editorial->setTelefono($row[4]);
        

        return $editorial;
    }

    public function consultNombre($nom){
        
        $sql = "SELECT * FROM EDITORIAL WHERE nom_editorial = '".$nom."';";
        
        if(!$resultado = pg_Exec($this->conexion,$sql));
        $row = pg_fetch_array($resultado);

        $editorial = new Editorial();
        $editorial->setCod_editorial($row[0]);
        $editorial->setNom_editorial($row[1]);
        $editorial->setCorreo($row[2]);
        $editorial->setDireccion($row[3]);
        $editorial->setTelefono($row[4]);     

        return $editorial;
    }

    /**
	 * Method to create a new editorial
	 *
	 * @param Editorial $editorial
	 * @return void
	 */
    public function create ($editorial){

        $sql = "INSERT INTO EDITORIAL(nom_editorial,correo,direccion,telefono) VALUES 
                ('".$editorial->getNom_editorial()."','"
                .$editorial->getCorreo()."','"
                .$editorial->getDireccion()."','"
                .$editorial->getTelefono()."');";
                
        pg_Exec($this->conexion,$sql);
    }

    /**
	 * Method that modifies a editorial entered by parameter
	 *
	 * @param Editorial $editorial
	 * @return void
	 */
    public function modify ($editorial){
        
        $sql = "UPDATE EDITORIAL SET cod_editorial = ".$editorial->getCod_editorial().",                                 
                                   nom_editorial = '".$editorial->getNom_editorial()."',
                                   correo = '".$editorial->getCorreo()."',
                                   direccion = '".$editorial->getDireccion()."',
                                   telefono = '".$editorial->getTelefono()."'
                                   where cod_editorial = ".$editorial->getCod_editorial().";";
        pg_Exec($this->conexion,$sql);
    }

    /**
	 * Method to get all editorial
	 *
	 * @return Editorial
	 */
    public function getList(){
        
        $sql = "SELECT * FROM EDITORIAL ";
        $editorales = array();
        if(!$resultado = pg_Exec($this->conexion, $sql));
        
        
        while($row = pg_fetch_array($resultado))
        {   
            $editorial = New Editorial();
            $editorial->setCod_editorial($row[0]);
            $editorial->setNom_editorial($row[1]);
            $editorial->setCorreo($row[2]);
            $editorial->setDireccion($row[3]);
            $editorial->setTelefono($row[4]);
            
            $editorales[] = $editorial;
        }
        return $editorales;
    }


    /**
     * Method to get all editorial
     *
     * @return Editorial
     */
    public function buscarEditorial($nom){
        
        $sql = "SELECT * FROM EDITORIAL WHERE nom_editorial iLIKE '%".$nom."%'";
        $editorales = array();
        if(!$resultado = pg_Exec($this->conexion, $sql));
        
        
        while($row = pg_fetch_array($resultado))
        {   
            $editorial = New Editorial();
            $editorial->setCod_editorial($row[0]);
            $editorial->setNom_editorial($row[1]);
            $editorial->setCorreo($row[2]);
            $editorial->setDireccion($row[3]);
            $editorial->setTelefono($row[4]);
            
            $editorales[] = $editorial;
        }
        return $editorales;
    }


    /**
	 * Method to delete a editorial
	* @param $cod_editorial
	 * @return Editorial
	 */
    public function delete($cod_editorial){
        $sql = "DELETE FROM EDITORIAL WHERE cod_editorial=".$cod_editorial;
        pg_Exec($this->conexion, $sql);
    }

    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return EditorialDAO
     */
    public static function getEditorialDAO($conexion) {
        if(self::$EditorialDAO == null) {
            self::$EditorialDAO = new EditorialDAO($conexion);
        }

        return self::$EditorialDAO;
    }

}
