<?php

require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Category.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/DAO.php';

/**
 *Represents the DAO of the category entity
 */
class CategoryDAO implements DAO{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

	/**
	 * Reference to a categoryDAO object
	 * @var categoryDAO
	 */
    private static $categoryDAO;

    //------------------------------------------
	// Builder
    //------------------------------------------
    
    /**
	 * Builder of the class
	 *
	 * @param Object $conexion
	 */
    private function __construct($conexion){
        #mysqli_set_charset($this->conexion, "utf8");
        $this->conexion=$conexion;
    }
    
	/**
	 * Method to query a category by his code type
	 *
	 * @param int $codCategory
	 * @return Category
	 */
    public function consult($codCategory){
        
        $sql = "SELECT * FROM CATEGORIA WHERE cod_categoria = ".$codCategory;
        
        if(!$resultado = pg_query($this->conexion,$sql))die();
        $row = pg_fetch_array($resultado);

        $category = new Category();
        $category->setCod_categoria($row[0]);
        $category->setNom_categoria($row[1]);

        return $category;
    }

    public function consultName($nom){
        
        $sql = "SELECT * FROM CATEGORIA WHERE nom_categoria = '".$nom."'";
        
        if(!$resultado = pg_query($this->conexion,$sql))die();
        $row = pg_fetch_array($resultado);

        $category = new Category();
        $category->setCod_categoria($row[0]);
        $category->setNom_categoria($row[1]);

        return $category;
    }


	/**
	 * Method to create a new category
	 *
	 * @param Category $category
	 * @return void
	 */
    public function create ($category){

        $sql = "insert into CATEGORIA(nom_categoria) values ('".$category->getNom_categoria()."');";

        pg_query($this->conexion,$sql) or die(pg_last_error($this->conexion));
    }

	/**
	 * Method that modifies a category entered by parameter
	 *
	 * @param Category $category
	 * @return void
	 */
    public function modify ($category){
        
        $sql = "UPDATE CATEGORIA SET cod_categoria = ".$category->getCod_categoria().",
                                   nom_categoria = '".$category->getNom_categoria()."'
                                   where cod_categoria = ".$category->getCod_categoria().");";
        pg_query($this->conexion,$sql)or die(pg_last_error($this->conexion));
    }

	/**
	 * Method to get an CategoryDAO object
	 *
	 * @param Object $conexion
	 * @return CategoryDAO
	 */
    public function getList(){
        
        $sql = "SELECT * FROM CATEGORIA";

        if(!$resultado = pg_query($this->conexion, $sql)) die();

        $category = array();

        while($row = pg_fetch_array($resultado))
        {   
            $category = $this->consult($row[0]);
            $categories[] = $category;
        }
        return $categories;
    }

    public function buscarCategoria($nombre){
        
        $sql = "SELECT * FROM CATEGORIA WHERE nom_categoria iLIKE '%".$nombre."%'";

        if(!$resultado = pg_query($this->conexion, $sql)) die();

        $categories = array();

        while($row = pg_fetch_array($resultado))
        {   
            $category = new Category();
            $category->setCod_categoria($row[0]);
            $category->setNom_categoria($row[1]);
            $categories[] = $category;
        }
        return $categories;
    }

    
    public function delete($codCategory){
        
    }

    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return CategoryDAO
     */
    public static function getCategoryDAO($conexion) {
        if(self::$categoryDAO == null) {
            self::$categoryDAO = new CategoryDAO($conexion);
        }

        return self::$categoryDAO;
    }
}
?>