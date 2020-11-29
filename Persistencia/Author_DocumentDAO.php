<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/Author_Document.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Persistencia/DAO.php';

/**
 *Represents the DAO of the document_category entity
 */
class Author_DocumentDAO implements DAO
{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

    /**
     * Reference to a document_categoryDAO object
     * @var Author_DocumentDAO
     */
    private static $author_DocumentDAO;

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
     * @param int $cod_documento
     * @return Author_Document
     */
    public function consult($cod_documento){

        $sql = "SELECT * FROM AUTOR_DOCUMENTO WHERE cod_documento = ".$cod_documento;
        
        $authors_documents = array();
        if (!$resultado = pg_Exec($this->conexion, $sql));      

        while ($row = pg_fetch_array($resultado)) {
            $author_document = new Author_Document();
            $author_document->getCod_autor($row[0]);
            $author_document->getCod_documento($row[1]);
            $authors_documents[] = $author_document;
        }
        return $authors_documents;
    
    }



    /**
     * Method to create a new author_document
     *
     * @param Author_document $author_document
     * @return void
     */
    public function create($author_document)
    {

        $sql = "INSERT INTO AUTOR_DOCUMENTO VALUES (".$author_document->getCod_documento().",".$author_document->getCod_autor().");";

        pg_Exec($this->conexion, $sql);
    }

    /**
     * Method that modifies a document_category entered by parameter
     *
     * @param Author_Document $author_document
     * @return void
     */
    public function modify($author_document)
    {

        $sql = "UPDATE AUTOR_DOCUMENTO SET cod_documento = " . $author_document->getCod_documento() . ",                                 
                                  cod_autor = " . $author_document->getCod_autor() . ",
                                   where cod_categoria = " . $author_document->getCod_categoria() . ";";
        pg_Exec($this->conexion, $sql);
    }

    /**
     * Method to get all document_category
     *
     * @return Author_Document
     */
    public function getList()
    {

        $sql = "SELECT * FROM AUTOR_DOCUMENTO";
        $authors_document = array();
        if (!$resultado = pg_Exec($this->conexion, $sql));

        

        while ($row = pg_fetch_array($resultado)) {
            $author_document = new Author_Document();
            $author_document->getCod_autor($row[0]);
            $author_document->getCod_categoria($row[1]);
            $authors_documents[] = $author_document;
        }
        return $authors_documents;
    }

    /**
     * Method to delete a Document_Category
     * @param $cod_categoria
     * @return Author_Document
     */
    public function delete($cod_categoria)
    {
        $sql = "DELETE FROM AUTOR_DOCUMENTO WHERE cod_categoria=" . $cod_categoria;
        pg_Exec($this->conexion, $sql);
    }

    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return Author_DocumentDAO
     */
    public static function getAuthor_DocumentDAO($conexion)
    {
        if (self::$author_DocumentDAO == null) {
            self::$author_DocumentDAO = new Author_DocumentDAO($conexion);
        }

        return self::$author_DocumentDAO;
    }
}
