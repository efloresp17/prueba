<?php

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/Document.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Persistencia/DAO.php';

/**
 *Represents the DAO of the book entity
 */
class DocumentDAO implements DAO
{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

    /**
     * Reference to a DocumentDAO object
     * @var DocumentDAO
     */
    private static $documentDAO;

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
        #mysqli_set_charset($this->conexion, "utf8");
        $this->conexion = $conexion;
    }

    /**
     * Method to query a document
     *
     * @param int $cod_user
     * @return document
     */
    public function consultDocumentsByUser($cod_user)
    {

        $sql = "SELECT * FROM DOCUMENTO WHERE subido_por = " . $cod_user;

        $documents = array();
        if (!$resultado = pg_Exec($this->conexion, $sql));


        while ($row = pg_fetch_array($resultado)) {

            $document = new Document();
            $document->setCod_documento($row[0]);
            $document->setSubido_por($row[1]);
            $document->setCod_t_documento($row[2]);
            $document->setCod_editorial($row[3]);
            $document->setCod_estado($row[4]);
            $document->setCantidad($row[5]);
            $document->setTitulo($row[6]);
            $document->setFecha_creacion($row[7]);
            $document->setPdf($row[8]);
            $document->setCod_estado_reserva($row[9]);
            $document->setCantidad_vistas($row[10]);
            $document->setCod_usuario_accion($row[11]);
            $documents[] = $document;
        }
        return $documents;
    }

    public function consultDocumentByName($nom)
    {
        $sql = "SELECT * FROM DOCUMENTO WHERE titulo = '".$nom."';";

        if (!$resultado = pg_Exec($this->conexion, $sql));

        $row = pg_fetch_array($resultado); 

            $document = new Document();
            $document->setCod_documento($row[0]);
            $document->setSubido_por($row[1]);
            $document->setCod_t_documento($row[2]);
            $document->setCod_editorial($row[3]);
            $document->setCod_estado($row[4]);
            $document->setCantidad($row[5]);
            $document->setTitulo($row[6]);
            $document->setFecha_creacion($row[7]);
            $document->setPdf($row[8]);
            $document->setCod_estado_reserva($row[9]);
            $document->setCantidad_vistas($row[10]);
            $document->setCod_usuario_accion($row[11]);
                    
        return $document;
    }

    public function contarDocumentoXtipo($cod_t_documento)
    {

        $sql = "SELECT count(*) FROM DOCUMENTO WHERE cod_t_documento = ".$cod_t_documento;

        if (!$resultado = pg_Exec($this->conexion, $sql));
        $row = pg_fetch_array($resultado);

        $conteo = $row[0];

        return $conteo;
    }


    /**
     * Method to query a document
     *
     * @param int $cod_document
     * @return document
     */
    public function consult($cod_document)
    {


        $sql = "SELECT * FROM DOCUMENTO WHERE cod_documento = " . $cod_document;

        if (!$resultado = pg_Exec($this->conexion, $sql));
        $row = pg_fetch_array($resultado);

        $document = new Document();
        $document->setCod_documento($row[0]);
        $document->setSubido_por($row[1]);
        $document->setCod_t_documento($row[2]);
        $document->setCod_editorial($row[3]);
        $document->setCod_estado($row[4]);
        $document->setCantidad($row[5]);
        $document->setTitulo($row[6]);
        $document->setFecha_creacion($row[7]);
        $document->setPdf($row[8]);
        $document->setCod_estado_reserva($row[9]);
        $document->setCantidad_vistas($row[10]);
        $document->setCod_usuario_accion($row[11]);

        return $document;
    }

    /**
     * Method to create a new book
     *
     * @param Document $document
     * @return void
     */
    public function create($document)
    {

        $sql = "insert into DOCUMENTO (subido_por, cod_t_documento, cod_estado, cantidad, titulo, fecha_creacion,pdf, cod_estado_reserva, cantidad_vistas, cod_usuario_accion)
        values (" . $document->getSubido_por() . ",
                " . $document->getCod_t_documento() . ",
                
                " . $document->getCod_estado() . ",
                " . $document->getCantidad() . ",
                '" . $document->getTitulo() . "',
                CURRENT_DATE,
                '" . $document->getPdf() . "',
                " . $document->getCod_estado_reserva() . ",
                " . $document->getCantidad_vistas() . ",
                " . $document->getCod_usuario_accion() . ");";
      
        pg_Exec($this->conexion, $sql);
    }

    /**
     * Method that modifies a book entered by parameter
     *
     * @param Document $document
     * @return void
     */
    public function modify($document)
    {

        $sql = "UPDATE DOCUMENTO SET cod_documento = " . $document->getCod_documento() . ",
                                   subido_por = " . $document->getSubido_por() . ",
                                   cod_t_documento = " . $document->getCod_t_documento() . ",
                                   cod_editorial = " . $document->getCod_editorial() . ",
                                   cod_estado = " . $document->getCod_estado() . "  ,
                                   cantidad= " . $document->getCantidad() . "  ,
                                   titulo = '" . $document->getTitulo() . "'  ,
                                   fecha_creacion= '" . $document->getFecha_creacion() . "' ,
                                   pdf= '" . $document->getPdf() . "',
                                   cod_estado_reserva = " . $document->getCod_estado_reserva() . ",
                                   cantidad_vistas = " . $document->getCantidad_vistas() . ",
                                   cod_usuario_accion = " . $document->getCod_usuario_accion() . "  
                                   where cod_documento = " . $document->getCod_documento() . ";";
                                        
        pg_Exec($this->conexion, $sql);
    }

    /**
     * Method to get a BookDAO object
     *
     * @param Object $conexion
     * @return DocumentDAO
     */
    public function getList()
    {

        $sql = "SELECT * FROM DOCUMENTO ORDER BY COD_DOCUMENTO";
        $documents = array();
        if (!$resultado = pg_Exec($this->conexion, $sql));


        while ($row = pg_fetch_array($resultado)) {

            $document = new Document();
            $document->setCod_documento($row[0]);
            $document->setSubido_por($row[1]);
            $document->setCod_t_documento($row[2]);
            $document->setCod_editorial($row[3]);
            $document->setCod_estado($row[4]);
            $document->setCantidad($row[5]);
            $document->setTitulo($row[6]);
            $document->setFecha_creacion($row[7]);
            $document->setPdf($row[8]);
            $document->setCod_estado_reserva($row[9]);
            $document->setCantidad_vistas($row[10]);
            $document->setCod_usuario_accion($row[11]);
            $documents[] = $document;
        }
        return $documents;
    }

    public function getListBook()
    {

        $sql = "SELECT * FROM DOCUMENTO where cod_t_documento = 1";
        $documents = array();
        if (!$resultado = pg_Exec($this->conexion, $sql));


        while ($row = pg_fetch_array($resultado)) {

            $document = new Document();
            $document->setCod_documento($row[0]);
            $document->setSubido_por($row[1]);
            $document->setCod_t_documento($row[2]);
            $document->setCod_editorial($row[3]);
            $document->setCod_estado($row[4]);
            $document->setCantidad($row[5]);
            $document->setTitulo($row[6]);
            $document->setFecha_creacion($row[7]);
            $document->setPdf($row[8]);
            $document->setCod_estado_reserva($row[9]);
            $document->setCantidad_vistas($row[10]);
            $document->setCod_usuario_accion($row[11]);
            $documents[] = $document;
        }
        return $documents;
    }

    public function getListArticle()
    {

        $sql = "SELECT * FROM DOCUMENTO where cod_t_documento = 2";
        $documents = array();
        if (!$resultado = pg_Exec($this->conexion, $sql));


        while ($row = pg_fetch_array($resultado)) {

            $document = new Document();
            $document->setCod_documento($row[0]);
            $document->setSubido_por($row[1]);
            $document->setCod_t_documento($row[2]);
            $document->setCod_editorial($row[3]);
            $document->setCod_estado($row[4]);
            $document->setCantidad($row[5]);
            $document->setTitulo($row[6]);
            $document->setFecha_creacion($row[7]);
            $document->setPdf($row[8]);
            $document->setCod_estado_reserva($row[9]);
            $document->setCantidad_vistas($row[10]);
            $document->setCod_usuario_accion($row[11]);
            $documents[] = $document;
        }
        return $documents;
    }

    public function getListPresentation()
    {

        $sql = "SELECT * FROM DOCUMENTO where cod_t_documento = 3";
        $documents = array();
        if (!$resultado = pg_Exec($this->conexion, $sql));


        while ($row = pg_fetch_array($resultado)) {

            $document = new Document();
            $document->setCod_documento($row[0]);
            $document->setSubido_por($row[1]);
            $document->setCod_t_documento($row[2]);
            $document->setCod_editorial($row[3]);
            $document->setCod_estado($row[4]);
            $document->setCantidad($row[5]);
            $document->setTitulo($row[6]);
            $document->setFecha_creacion($row[7]);
            $document->setPdf($row[8]);
            $document->setCod_estado_reserva($row[9]);
            $document->setCantidad_vistas($row[10]);
            $document->setCod_usuario_accion($row[11]);
            $documents[] = $document;
        }
        return $documents;
    }
    /**
     * Method to delete a book
     * @param $cod_libro
     * @return Document
     */
    public function delete($cod_documento)
    {
        $sql = "DELETE FROM DOCUMENTO WHERE cod_documento=" . $cod_documento;
        pg_Exec($this->conexion, $sql);
    }

    /**
	* Method to get quantity of documents by type
	* @return Document
	*/

    public function getQuantityDocumentsByType(){

        $quantityDocuments = array();

        $sql = 'SELECT COUNT(COD_DOCUMENTO) FROM DOCUMENTO WHERE COD_T_DOCUMENTO = 1';
        $resultado = pg_exec($this->conexion, $sql);
        $cantidad = pg_fetch_array($resultado);
        array_push($quantityDocuments, $cantidad[0]);

        
        $sql = 'SELECT COUNT(COD_DOCUMENTO) FROM DOCUMENTO WHERE COD_T_DOCUMENTO = 2';
        $resultado = pg_exec($this->conexion, $sql);
        $cantidad = pg_fetch_array($resultado);
        array_push($quantityDocuments, $cantidad[0]);

        
        $sql = 'SELECT COUNT(COD_DOCUMENTO) FROM DOCUMENTO WHERE COD_T_DOCUMENTO = 3';
        $resultado = pg_exec($this->conexion, $sql);
        $cantidad = pg_fetch_array($resultado);
        array_push($quantityDocuments, $cantidad[0]);

        return $quantityDocuments;

    }

    
    public function documentByReserveStatus(){

        $status = array();

        $sql = 'SELECT COUNT(COD_DOCUMENTO) FROM DOCUMENTO WHERE COD_T_DOCUMENTO = 1 AND COD_ESTADO_RESERVA = 1'; //reserved and book
        $resultado = pg_exec($this->conexion, $sql);
        $cantidad = pg_fetch_array($resultado);
        array_push($status, $cantidad[0]);

        $sql = 'SELECT COUNT(COD_DOCUMENTO) FROM DOCUMENTO WHERE COD_T_DOCUMENTO = 1 AND COD_ESTADO_RESERVA = 2'; // available and book
        $resultado = pg_exec($this->conexion, $sql);
        $cantidad = pg_fetch_array($resultado);
        array_push($status, $cantidad[0]);

        $sql = 'SELECT COUNT(COD_DOCUMENTO) FROM DOCUMENTO WHERE COD_T_DOCUMENTO = 2 AND COD_ESTADO_RESERVA = 1'; // reserved and article
        $resultado = pg_exec($this->conexion, $sql);
        $cantidad = pg_fetch_array($resultado);
        array_push($status, $cantidad[0]);

        $sql = 'SELECT COUNT(COD_DOCUMENTO) FROM DOCUMENTO WHERE COD_T_DOCUMENTO = 2 AND COD_ESTADO_RESERVA = 2'; // available and article
        $resultado = pg_exec($this->conexion, $sql);
        $cantidad = pg_fetch_array($resultado);
        array_push($status, $cantidad[0]);

        $sql = 'SELECT COUNT(COD_DOCUMENTO) FROM DOCUMENTO WHERE COD_T_DOCUMENTO = 3 AND COD_ESTADO_RESERVA = 1'; // reserved and presentation
        $resultado = pg_exec($this->conexion, $sql);
        $cantidad = pg_fetch_array($resultado);
        array_push($status, $cantidad[0]);

        $sql = 'SELECT COUNT(COD_DOCUMENTO) FROM DOCUMENTO WHERE COD_T_DOCUMENTO = 3 AND COD_ESTADO_RESERVA = 2'; // available and presentation
        $resultado = pg_exec($this->conexion, $sql);
        $cantidad = pg_fetch_array($resultado);
        array_push($status, $cantidad[0]);

        return $status;

    }

    public function documentByStatus(){

        $status = array();

        $sql = 'SELECT COUNT(COD_DOCUMENTO) FROM DOCUMENTO WHERE COD_ESTADO = 1'; 
        $resultado = pg_exec($this->conexion, $sql);
        $cantidad = pg_fetch_array($resultado);
        array_push($status, $cantidad[0]);

        $sql = 'SELECT COUNT(COD_DOCUMENTO) FROM DOCUMENTO WHERE COD_ESTADO = 2'; 
        $resultado = pg_exec($this->conexion, $sql);
        $cantidad = pg_fetch_array($resultado);
        array_push($status, $cantidad[0]);

        $sql = 'SELECT COUNT(COD_DOCUMENTO) FROM DOCUMENTO WHERE COD_ESTADO = 3'; 
        $resultado = pg_exec($this->conexion, $sql);
        $cantidad = pg_fetch_array($resultado);
        array_push($status, $cantidad[0]);

        $sql = 'SELECT COUNT(COD_DOCUMENTO) FROM DOCUMENTO WHERE COD_ESTADO = 4'; 
        $resultado = pg_exec($this->conexion, $sql);
        $cantidad = pg_fetch_array($resultado);
        array_push($status, $cantidad[0]);

        return $status;

    }

    public function getDocumentsMoreQuantity()
    {
        $sql = "SELECT * FROM DOCUMENTO ORDER BY cantidad DESC LIMIT 5";
        $documentsArray = array();
        if (!$resultado = pg_Exec($this->conexion, $sql));

        while ($row = pg_fetch_array($resultado)) {

            $document = new Document();
            $document->setCod_documento($row[0]);
            $document->setSubido_por($row[1]);
            $document->setCod_t_documento($row[2]);
            $document->setCod_editorial($row[3]);
            $document->setCod_estado($row[4]);
            $document->setCantidad($row[5]);
            $document->setTitulo($row[6]);
            $document->setFecha_creacion($row[7]);
            $document->setPdf($row[8]);
            $document->setCod_estado_reserva($row[9]);
            $document->setCantidad_vistas($row[10]);
            $document->setCod_usuario_accion($row[11]);
            $documentsArray[] = $document;
        }
        return $documentsArray;
    }

    public function getDocumentsLessQuantity()
    {
        $sql = "SELECT * FROM DOCUMENTO ORDER BY cantidad ASC LIMIT 5";
        $documentsArray = array();
        if (!$resultado = pg_Exec($this->conexion, $sql));

        while ($row = pg_fetch_array($resultado)) {

            $document = new Document();
            $document->setCod_documento($row[0]);
            $document->setSubido_por($row[1]);
            $document->setCod_t_documento($row[2]);
            $document->setCod_editorial($row[3]);
            $document->setCod_estado($row[4]);
            $document->setCantidad($row[5]);
            $document->setTitulo($row[6]);
            $document->setFecha_creacion($row[7]);
            $document->setPdf($row[8]);
            $document->setCod_estado_reserva($row[9]);
            $document->setCantidad_vistas($row[10]);
            $document->setCod_usuario_accion($row[11]);
            $documentsArray[] = $document;
        }
        return $documentsArray;
    }


    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return DocumentDAO
     */
    public static function getDocumentDAO($conexion)
    {
        if (self::$documentDAO == null) {
            self::$documentDAO = new DocumentDAO($conexion);
        }

        return self::$documentDAO;
    }
}
