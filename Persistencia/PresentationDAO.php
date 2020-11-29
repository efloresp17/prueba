<?php
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Presentation.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/DAO.php';

/**
 *Represents the DAO of the presentation entity
 */
class PresentationDAO implements DAO{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

	/**
	 * Reference to a presentationDAO object
	 * @var presentationDAO
	 */
    private static $presentationDAO;

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
	 * Method to query a presentation by his title
	 *
	 * @param String $titulo
	 * @return Presentation
	 */
    

    /**
	 * Method to query a presentation by his code type
	 *
	 * @param int $cod_ponencia
	 * @return Presentation
	 */
    public function consult($cod_documento){
        
        $sql = "SELECT * FROM PONENCIA WHERE cod_documento = ".$cod_documento;
        
        if(!$resultado = pg_Exec($this->conexion,$sql));
        $row = pg_fetch_array($resultado);

        $presentation = new Presentation();

        $presentation->setCod_documento($row[0]);
        $presentation->setFecha_publicacion($row[1]);
        $presentation->setIsbn($row[2]);
        $presentation->setNombre_Congreso($row[3]);

        return $presentation;
    }

    /**
	 * Method to create a new Presentation
	 *
	 * @param Presentation
	 * @return void
	 */
    public function create ($presentation){

        $sql = "INSERT INTO PONENCIA(cod_documento,fecha_publicacion,isbn,nombre_congreso) VALUES (".$presentation->getCod_documento().",
                                            '".$presentation->getFecha_publicacion()."',
                                            '".$presentation->getIsbn()."',
                                            '".$presentation->getNombre_Congreso()."'
                                            );";
    
        pg_Exec($this->conexion,$sql);
    }

    /**
	 * Method that modifies a presentation entered by parameter
	 *
	 * @param Presentation 
	 * @return void
	 */
    public function modify ($presentation){
        
        $sql = "UPDATE PONENCIA SET cod_documento = ".$presentation->getCod_documento().",
                                    fecha_publicacion = '".$presentation->getFecha_publicacion()."',
                                    isbn = '".$presentation->getIsbn()."',
                                    nombre_congreso= '".$presentation->getNombre_Congreso()."'                                  
                                    where cod_documento = ".$presentation->getCod_documento().";";
        pg_Exec($this->conexion,$sql);
    }

    /**
	 * Method to get all presentation
	 *
	 * @param Object $conexion
	 * @return Presentation[]
	 */
    public function getList(){
        
        $sql = "SELECT * FROM PONENCIA";
        $presentations = array();
        if(!$resultado = pg_Exec($this->conexion, $sql));
   

        while($row = pg_fetch_array($resultado))
        {   
            $presentation = new Presentation();

        $presentation->setCod_documento($row[0]);
        $presentation->setFecha_publicacion($row[1]);
        $presentation->setIsbn($row[2]);
        $presentation->setNombre_Congreso($row[3]);
    
            $presentations[] = $presentation;
        }
        return $presentations;
    }

    /**
	* Method to delete a presentation
	* @param $cod_documento
	* @return Presentation
	*/
    public function delete($cod_documento){
        $sql = "DELETE FROM PONENCIA WHERE cod_documento=".$cod_documento;
        pg_Exec($this->conexion, $sql);
    }

    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return Presentation
     */
    public static function getPresentationDAO($conexion) {
        if(self::$presentationDAO == null) {
            self::$presentationDAO = new PresentationDAO($conexion);
        }

        return self::$presentationDAO;
    }


}
?>