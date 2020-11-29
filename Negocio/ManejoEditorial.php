<?php

/**
 * Amount of classes
 */
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/persistencia/EditorialDAO.php';


class ManejoEditorial
{

    /**
     * Attribute for connection to the database
     */
    private static $conexion;

    /**
     * @var ManejoEditorial
     */

    function __construct($conexion)
    {
    }

    /**
     * Consult a Editorial by his code type
     *
     * @param int $cod_editorial
     * @return Editorial
     */
    public static function consult($cod_editorial)
    {

        $editorialDAO = EditorialDAO::getEditorialDAO(self::$conexion);
        $editorial = $editorialDAO->consult($cod_editorial);
        return $editorial;
    }

    public static function consultNombre($cod_editorial)
    {

        $editorialDAO = EditorialDAO::getEditorialDAO(self::$conexion);
        $editorial = $editorialDAO->consultNombre($cod_editorial);
        return $editorial;
    }

    /**
     * Create a new Editorial
     * @param Editorial
     * @return void
     */
    public static function create($editorial)
    {
        $editorialDAO = EditorialDAO::getEditorialDAO(self::$conexion);
        $editorialDAO->create($editorial);
    }

    /**
     * Modify a Editorial
     * @param Editorial
     * @return void
     */
    public static function modify($editorial)
    {
        $editorialDAO = EditorialDAO::getEditorialDAO(self::$conexion);
        $editorialDAO->modify($editorial);
    }


    /**
     * List all Editorial
     * @return Editorial[] 
     */
    public static function getList()
    {

        $editorialDAO = EditorialDAO::getEditorialDAO(self::$conexion);
        $editoriales = $editorialDAO->getList();
        return $editoriales;
    }

    /**
     * List all Editorial
     * @return Editorial[] 
     */
    public static function buscarEditorial($nom)
    {

        $editorialDAO = EditorialDAO::getEditorialDAO(self::$conexion);
        $editoriales = $editorialDAO->buscarEditorial($nom);
        return $editoriales;
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
