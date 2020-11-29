<?php

/**
 * Amount of classes
 */
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/persistencia/DocumentDAO.php';


class ManejoDocument
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
     * Consult a Document by his code type
     *
     * @param int $cod_documento
     * @return Document
     */
    public static function consult($cod_documento)
    {

        $documentDAO = DocumentDAO::getDocumentDAO(self::$conexion);
        $document = $documentDAO->consult($cod_documento);
        return $document;
    }
 
     public static function consultDocumentByName($nom)
    {

        $documentDAO = DocumentDAO::getDocumentDAO(self::$conexion);
        $document = $documentDAO->consultDocumentByName($nom);
        return $document;
    }
    

    public static function contarDocumentoXtipo($cod_t_documento)
    {

        $documentDAO = DocumentDAO::getDocumentDAO(self::$conexion);
        $document = $documentDAO->contarDocumentoXtipo($cod_t_documento);
        return $document;
    }
    /**
     * Consult a Document by his user
     *
     * @param int $cod_documento
     * @return Document[]
     */

    public static function consultDocumentsByUser($cod_documento)
    {

        $documentDAO = DocumentDAO::getDocumentDAO(self::$conexion);
        $document = $documentDAO->consultDocumentsByUser($cod_documento);
        return $document;
    }


    /**
     * Create a new Document
     * @param Document
     * @return void
     */
    public static function create($document)
    {
        $documentDAO = DocumentDAO::getDocumentDAO(self::$conexion);
        $documentDAO->create($document);
    }

    /**
     * Modify a Document
     * @param Document
     * @return void
     */
    public static function modify($document)
    {
        $documentDAO = DocumentDAO::getDocumentDAO(self::$conexion);
        $documentDAO->modify($document);
    }

    public static function delete($document)
    {
        $documentDAO = DocumentDAO::getDocumentDAO(self::$conexion);
        $documentDAO->delete($document);
    }


    /**
     * List all Document
     * @return Document[] 
     */
    public static function getList()
    {

        $documentDAO = DocumentDAO::getDocumentDAO(self::$conexion);
        $docuemnts = $documentDAO->getList();
        return $docuemnts;
    }

    public static function getBookList()
    {

        $documentDAO = DocumentDAO::getDocumentDAO(self::$conexion);
        $docuemnts = $documentDAO->getListBook();
        return $docuemnts;
    }

    public static function getArticleList()
    {

        $documentDAO = DocumentDAO::getDocumentDAO(self::$conexion);
        $docuemnts = $documentDAO->getListArticle();
        return $docuemnts;
    }

    public static function getPresentationList()
    {

        $documentDAO = DocumentDAO::getDocumentDAO(self::$conexion);
        $docuemnts = $documentDAO->getListPresentation();
        return $docuemnts;
    }

    public static function getDocumentsByType() {
        $documentDAO = DocumentDAO::getDocumentDAO(self::$conexion);
        $documents = $documentDAO->getQuantityDocumentsByType();
        return $documents;
    }

    public static function documentStatus_r(){
        $documentDAO = DocumentDAO::getDocumentDAO(self::$conexion);
        $documents = $documentDAO->documentByReserveStatus();
        return $documents;
    }

    public static function documentStatus(){
        $documentDAO = DocumentDAO::getDocumentDAO(self::$conexion);
        $documents = $documentDAO->documentByStatus();
        return $documents;
    }

    public static function documentsMoreQuantity(){

        $documentDAO = DocumentDAO::getDocumentDAO(self::$conexion);
        $documents = $documentDAO->getDocumentsMoreQuantity();
        return $documents;
    }

    public static function documentsLessQuantity(){

        $documentDAO = DocumentDAO::getDocumentDAO(self::$conexion);
        $documents = $documentDAO->getDocumentsLessQuantity();
        return $documents;
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
