<?php

/**
 * Amount of classes
 */
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/persistencia/Document_CategoryDAO.php';


class ManejoDocument_Category
{

    /**
     * Attribute for connection to the database
     */
    private static $conexion;

    /**
     * @var ManejoDocument_Category
     */

    function __construct($conexion)
    {
    }

    /**
     * Consult a Document_Category by his code type
     *
     * @param int $cod_categoria
     * @return Document_Category
     */
    public static function consult($cod_categoria)
    {

        $document_categoryDAO = Document_CategoryDAO::getDocument_CategoryDAO(self::$conexion);
        $document_category = $document_categoryDAO->consult($cod_categoria);
        return $document_category;
    }


    public static function conteoXcategoria($codCategory){

        $document_categoryDAO = Document_CategoryDAO::getDocument_CategoryDAO(self::$conexion);
        $document_category = $document_categoryDAO->contarPorCategoria($codCategory);
        return $document_category;
    }
    /**
     * Create a new Document_Category
     * @param Document_Category
     * @return void
     */
    public static function create($categoria_documento)
    {
        $document_categoryDAO = Document_CategoryDAO::getDocument_CategoryDAO(self::$conexion);
        $document_categoryDAO->create($categoria_documento);
    }

    /**
     * Modify a Document_Category
     * @param Document_Category
     * @return void
     */
    public static function modify($categoria_documento)
    {
        $document_categoryDAO = Document_CategoryDAO::getDocument_CategoryDAO(self::$conexion);
        $document_categoryDAO->modify($categoria_documento);
    }


    /**
     * List all Document_Category
     * @return Document_Category[] 
     */
    public static function getList()
    {

        $document_categoryDAO = Document_CategoryDAO::getDocument_CategoryDAO(self::$conexion);
        $categoria_documento = $document_categoryDAO->getList();
        return $categoria_documento;
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
