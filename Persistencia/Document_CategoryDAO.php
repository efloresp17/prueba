<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/Document_Category.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Persistencia/DAO.php';

/**
 *Represents the DAO of the document_category entity
 */
class Document_CategoryDAO implements DAO
{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

    /**
     * Reference to a document_categoryDAO object
     * @var Document_CategoryDAO
     */
    private static $Document_CategoryDAO;

    //------------------------------------------
    // Builder
    //------------------------------------------

    /**
     * Builder of the class
     *
     * @param Object $conexion
     */
    private function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    /**
     * Method to query a Document_Category by his code type
     *
     * @param int $cod_categoria
     * @return Document_Category
     */
    public function consult($cod_categoria)
    {

        $sql = "SELECT * FROM CATEGORIA_DOCUMENTO WHERE cod_categoria = " . $cod_categoria;

        if (!$resultado = pg_Exec($this->conexion, $sql));
        $row = pg_fetch_array($resultado);

        $categoria_documento = new Document_Category();
        $categoria_documento->setCod_documento($row[0]);
        $categoria_documento->setCod_categoria($row[1]);;


        return $categoria_documento;
    }

    public function contarPorCategoria($codCategory){
        
        $sql = "SELECT count(*) FROM CATEGORIA_DOCUMENTO WHERE cod_categoria = ".$codCategory;
        
        if(!$resultado = pg_query($this->conexion,$sql))die();
        $row = pg_fetch_array($resultado);

        
        $conteo = $row[0];
        

        return $conteo;
    }
    /**
     * Method to create a new Document_Category
     *
     * @param Document_Category $categoria_documento
     * @return void
     */
    public function create($categoria_documento)
    {

        $sql = "INSERT INTO CATEGORIA_DOCUMENTO (cod_documento, cod_categoria) VALUES ("    .$categoria_documento->getCod_documento().",
                ".$categoria_documento->getCod_categoria()."
                                            );";
        
        pg_Exec($this->conexion, $sql);
    }

    /**
     * Method that modifies a document_category entered by parameter
     *
     * @param Document_Category $categoria_documento
     * @return void
     */
    public function modify($categoria_documento)
    {

        $sql = "UPDATE CATEGORIA_DOCUMENTO SET cod_documento = " . $categoria_documento->getCod_documento() . ",                                 
                                  cod_categoria = " . $categoria_documento->getCod_categoria() . ",
                                   where cod_categoria = " . $categoria_documento->getCod_categoria() . ";";
        pg_Exec($this->conexion, $sql);
    }

    /**
     * Method to get all document_category
     *
     * @return Document_Category
     */
    public function getList()
    {

        $sql = "SELECT * FROM CATEGORIA_DOCUMENTO";
        $categorias_doc = array();
        if (!$resultado = pg_Exec($this->conexion, $sql));

        $categoria_documento = new Document_Category();

        while ($row = pg_fetch_array($resultado)) {
            $categoria_documento->setCod_documento($row[0]);
            $categoria_documento->setCod_categoria($row[1]);
            $categorias_doc[] = $categoria_documento;
        }
        return $categorias_doc;
    }

    /**
     * Method to delete a Document_Category
     * @param $cod_categoria
     * @return Document_Category
     */
    public function delete($cod_categoria)
    {
        $sql = "DELETE FROM CATEGORIA_DOCUMENTO WHERE cod_categoria=" . $cod_categoria;
        pg_Exec($this->conexion, $sql);
    }

    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return Document_CategoryDAO
     */
    public static function getDocument_CategoryDAO($conexion)
    {
        if (self::$Document_CategoryDAO == null) {
            self::$Document_CategoryDAO = new Document_CategoryDAO($conexion);
        }

        return self::$Document_CategoryDAO;
    }
}
