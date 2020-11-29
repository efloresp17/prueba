<?php

/**
 * Amount of classes
 */
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/persistencia/PresentationDAO.php';


class ManejoPresentation
{

    /**
     * Attribute for connection to the database
     */
    private static $conexion;

    /**
     * @var ManejoPresentation
     */

    function __construct($conexion)
    {
    }

    /**
     * Consult a Presentation by his title
     * @param String $titulo
     * @return Presentation
     */
    public static function consultTitle($titulo)
    {

        $presentationDAO = PresentationDAO::getPresentationDAO(self::$conexion);
        $presentation = $presentationDAO->consult($titulo);
        return $presentation;
    }

    /**
     * Consult a Document_Type by his code type
     *
     * @param int $cod_ponencia
     * @return Presentation
     */
    public static function consult($cod_ponencia)
    {

        $presentationDAO = PresentationDAO::getPresentationDAO(self::$conexion);
        $presentation = $presentationDAO->consult($cod_ponencia);
        return $presentation;
    }


    /**
     * Create a new Presentation
     * @param Presentation
     * @return void
     */
    public static function create($presentation)
    {
        $presentationDAO = PresentationDAO::getPresentationDAO(self::$conexion);
        $presentationDAO->create($presentation);
    }

    /**
     * Modify a Presentation
     * @param Presentation
     * @return void
     */
    public static function modify($presentation)
    {
        $presentationDAO = PresentationDAO::getPresentationDAO(self::$conexion);
        $presentationDAO->modify($presentation);
    }

    /**
     * Delete a Presentation
     * @param Presentation
     * @return void
     */
    public static function delete($presentation)
    {
        $presentationDAO = PresentationDAO::getPresentationDAO(self::$conexion);
        $presentationDAO->delete($presentation);
    }


    /**
     * List all Presentation
     * @return Presentation[] 
     */
    public static function getList()
    {

        $presentationDAO = PresentationDAO::getPresentationDAO(self::$conexion);
        $presentation = $presentationDAO->getList();
        return $presentation;
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
