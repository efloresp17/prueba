<?php
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Document_Type.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/DAO.php';

/**
 *Represents the DAO of the book entity
 */
class Document_TypeDAO implements DAO{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

	/**
	 * Reference to a document_TypeDAO object
	 * @var document_TypeDAO
	 */
    private static $document_TypeDAO;

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
	 * Method to query a Document_Type by his code type
	 *
	 * @param int $cod_t_documento
	 * @return Document_Type
	 */
    public function consult($cod_t_documento){
        
        $sql = "SELECT * FROM T_DOCUMENTO WHERE cod_t_documento = ".$cod_t_documento;
        
        if(!$resultado = pg_Exec($this->conexion,$sql));
        $row = pg_fetch_array($resultado);

        $t_documento = new Document_Type();
        $t_documento->setCod_t_documento($row[0]);
        $t_documento->setNom_t_documento($row[1]);

        return $t_documento;
    }

    /**
	 * Method to create a new document type
	 *
	 * @param Document_Type $t_documento
	 * @return void
	 */
    public function create ($t_documento){

        $sql = "INSERT INTO T_DOCUMENTO VALUES (".$t_documento->getCod_t_documento().",
                                            '".$t_documento->getNom_t_documento()."'
                                            );";

        pg_Exec($this->conexion,$sql);
    }

    /**
	 * Method that modifies a document_type entered by parameter
	 *
	 * @param Document_Type $t_documento
	 * @return void
	 */
    public function modify ($t_documento){
        
        $sql = "UPDATE T_DOCUMENTO SET cod_t_documento = ".$t_documento->getCod_t_documento().",                                 
                                   nom_t_documento = '".$t_documento->getNom_t_documento()."'                                 
                                   where cod_t_documento = ".$t_documento->getCod_t_documento().";";
        pg_Exec($this->conexion,$sql);
    }

    /**
	 * Method to get all documents type
	 *
	 * @return Document_Type
	 */
    public function getList(){
        
        $sql = "SELECT * FROM T_DOCUMENTO";
        $t_documentos = array();
        if(!$resultado = pg_Exec($this->conexion, $sql));

       
        while($row = pg_fetch_array($resultado))
        {   
            $t_documento = New Document_Type();
            $t_documento->setCod_t_documento($row[0]);
            $t_documento->setNom_t_documento($row[1]);
            $t_documentos[] = $t_documento;
        }
        return $t_documentos;
    }

    /**
	* Method to delete a documents type
	* @param $cod_t_documento
	* @return Document_Type
	*/
    public function delete($cod_t_documento){
        $sql = "DELETE FROM T_DOCUMENTO WHERE cod_t_documento=".$cod_t_documento;
        pg_Exec($this->conexion, $sql);
    }

    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return Document_TypeDAO
     */
    public static function getDocument_TypeDAO($conexion) {
        if(self::$document_TypeDAO == null) {
            self::$document_TypeDAO = new Document_TypeDAO($conexion);
        }

        return self::$document_TypeDAO;
    }

}



?>