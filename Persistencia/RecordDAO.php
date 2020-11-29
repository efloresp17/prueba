<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/Record.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Persistencia/DAO.php';

/**
 *Represents the DAO of the editorial entity
 */
class RecordDAO implements DAO
{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

    /**
     * Reference to a editorialDAO object
     * @var recordDAO
     */
    private static $recordDAO;

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
     * Method to query a Editorial by his code type
     *
     * @param int $cod_t_documento
     * @return Editorial
     */
    public function consult($cod_documento)
    {

        $sql = "SELECT * FROM HISTORIAL WHERE cod_documento = " . $cod_documento;

        if (!$resultado = pg_Exec($this->conexion, $sql));
        $row = pg_fetch_array($resultado);

        $historial = new Record();
        $historial->setCod_record($row[0]);
        $historial->setCod_documento($row[1]);
        $historial->setCod_usuario($row[2]);
        $historial->setDescripcion($row[3]);
        $historial->setFecha_publicacion($row[4]);

        return $historial;
    }

    /**
     * Method to create a new historial
     *
     * @param historial $historial
     * @return void
     */
    public function create($historial)
    {

        $sql = "INSERT INTO HISTORIAL VALUES (" . $historial->getCod_record() . ",
                                              " . $historial->getCod_documento() . ",
                                            '" . $historial->getCod_usuario() . "',
                                            '" . $historial->getDescripcion() . "',
                                            '" . $historial->getFecha_publicacion() . "
                                            );";

        pg_Exec($this->conexion, $sql);
    }

    /**
     * Method that modifies a historial entered by parameter
     *
     * @param historial $historial
     * @return void
     */
    public function modify($historial)
    {

        $sql = "UPDATE HISTORIAL SET cod_historial = " . $historial->getCod_record() . ",   
                                    cod_documento = " . $historial->getCod_documento() . ",                                 
                                   nom_editorial = '" . $historial->getCod_usuario() . "',
                                   direccion = '" . $historial->getDescripcion() . "',
                                   telefono = '" . $historial->getFecha_publicacion() . "'
                                   where cod_historial = " . $historial->getCod_record() . ";";
        pg_Exec($this->conexion, $sql);
    }

    /**
     * Method to get all editorial
     *
     * @return Record
     */
    public function getList()
    {

        $sql = "SELECT * FROM HISTORIAL";
        $historiales = array();
        if (!$resultado = pg_Exec($this->conexion, $sql));

        $historial = new Record();

        while ($row = pg_fetch_array($resultado)) {

            $historial = new Record();
            $historial->setCod_record($row[0]);
            $historial->setCod_documento($row[1]);
            $historial->setCod_usuario($row[2]);
            $historial->setDescripcion($row[3]);
            $historial->setFecha_publicacion($row[4]);
            $historiales[] = $historial;
        }
        return $historiales;
    }

    /**
     * Method to get all records of a document
     *
     * @return record[]
     */
    public function getListByDocument($cod_documento)
    {

        $sql = "SELECT * FROM HISTORIAL WHERE COD_DOCUMENTO=" . $cod_documento;
        $historiales = array();
        if (!$resultado = pg_Exec($this->conexion, $sql));

        $historial = new Record();

        while ($row = pg_fetch_array($resultado)) {

            $historial = new Record();
            $historial->setCod_record($row[0]);
            $historial->setCod_documento($row[1]);
            $historial->setCod_usuario($row[2]);
            $historial->setDescripcion($row[3]);
            $historial->setFecha_publicacion($row[4]);
            $historiales[] = $historial;
        }
        return $historiales;
    }

    /**
     * Method to delete a editorial
     * @param $cod_documento
     * @return historial
     */
    public function delete($cod_historial)
    {
        $sql = "DELETE FROM HISTORIAL WHERE cod_historial=" . $cod_historial;
        pg_Exec($this->conexion, $sql);
    }

    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return RecordlDAO
     */
    public static function getRecordDAO($conexion)
    {
        if (self::$recordDAO == null) {
            self::$recordDAO = new RecordDAO($conexion);
        }

        return self::$recordDAO;
    }
}
