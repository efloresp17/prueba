<?php

/**
 * Amount of classes
 */
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/persistencia/AuthorDAO.php';


class ManejoAuthor
{

    /**
     * Attribute for connection to the database
     */
    private static $conexion;

    /**
     * @var ManejoAuthor
     */

    function __construct($conexion)
    {
    }

    /**
     * Consult a Author by his code type
     *
     * @param int $cod_autor
     * @return Author
     */
    public static function consult($cod_autor)
    {

        $authorDAO = AuthorDAO::getAuthorDAO(self::$conexion);
        $author = $authorDAO->consult($cod_autor);
        return $author;
    }

    public static function consultByName($nom)
    {

        $authorDAO = AuthorDAO::getAuthorDAO(self::$conexion);
        $author = $authorDAO->consultByName($nom);
        return $author;
    }


    /**
     * Create a new Author
     * @param Author
     * @return void
     */
    public static function create($author)
    {
        $authorDAO = AuthorDAO::getAuthorDAO(self::$conexion);
        $authorDAO->create($author);
    }

    /**
     * Modify a Author
     * @param Author
     * @return void
     */
    public static function modify($author)
    {
        $authorDAO = AuthorDAO::getAuthorDAO(self::$conexion);
        $authorDAO->modify($author);
    }

    public static function buscarAutor($nom){

        $authorDAO = AuthorDAO::getAuthorDAO(self::$conexion);
        $authores = $authorDAO->buscarAutor($nom);
        return $authores;
    }
    
    /**
     * List all Author
     * @return Author[] 
     */
    public static function getList()
    {

        $authorDAO = AuthorDAO::getAuthorDAO(self::$conexion);
        $autores = $authorDAO->getList();
        return $autores;
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
