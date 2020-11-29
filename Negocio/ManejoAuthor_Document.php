<?php

/**
 * Amount of classes
 */
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/persistencia/Author_DocumentDAO.php';


class ManejoAuthor_Document
{

    /**
     * Attribute for connection to the database
     */
    private static $conexion;

    /**
     * @var ManejoAuthor_DocumentDAO
     */

    function __construct($conexion)
    {
    }

    /**
     * Consult a Author_Document by his code type
     *
     * @param int $cod_document
     * @return Author_Document
     */
    public static function consult($cod_document)
    {

        $author_DocumentDAO = Author_DocumentDAO::getAuthor_DocumentDAO(self::$conexion);
        $author_document = $author_DocumentDAO->consult($cod_document);
        return $author_document;
    }


    /**
     * Create a new Author_Document
     * @param Author_Document
     * @return void
     */
    public static function create($Author_Document)
    {
        $author_DocumentDAO = Author_DocumentDAO::getAuthor_DocumentDAO(self::$conexion);
        $author_DocumentDAO->create($Author_Document);
    }

    /**
     * Modify a Author_Document
     * @param Author_Document
     * @return void
     */
    public static function modify($Author_Document)
    {
        $author_DocumentDAO = Author_DocumentDAO::getAuthor_DocumentDAO(self::$conexion);
        $author_DocumentDAO->modify($Author_Document);
    }


    /**
     * List all Author_Document
     * @return Author_Document[] 
     */
    public static function getList()
    {

        $author_DocumentDAO = Author_DocumentDAO::getAuthor_DocumentDAO(self::$conexion);
        $author_document = $author_DocumentDAO->getList();
        return $author_document;
    }

    /**
     * Reference to the connection with the database
     * @var Object
     */
    public static function setConexionBD($conexion)
    {
        self::$conexion = $conexion;
    }
}
