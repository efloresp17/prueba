<?php
    /**
     * Import classes
     */	
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/RecordDAO.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/Util/Conexion.php';
	
	class ManejoRecord{
		
        /**
         * Atribute for the connection to  the database
         */
        private static $conexionBD;		

		function __construct(){
			
		}

        public static function consultRecord($codRecord){

            $recordDAO = RecordDAO::getRecordDAO(self::$conexionBD);
            $record = $recordDAO->consult($codRecord);
            return $record;
        }

        /**
         * Create an Record
         * @param Record record to create
         * @return void
         */
        public static function createRecord($record){
            $recordDAO=RecordDAO::getRecordDAO(self::$conexionBD);
            $recordDAO->create($record);
        }

        /**
         * Modify an record
         * @param Record record to modify
         * @return void
         */
        public static function modifyRecord($record){
            $recordDAO=RecordDAO::getRecordDAO(self::$conexionBD);
            $recordDAO->modify($record);
        }

        /**
         * List of record
         * @return Record[] List of all the record in the Data Base
         */
        public  static function getList(){
            $recordDAO=RecordDAO::getRecordDAO(self::$conexionBD);
            $record=$recordDAO->getList();
            return $record;
        }

        /**
         * List of record
         * @return Record[] List of all the record in the Data Base
         */
        public  static function getListByDocument($cod_documento){
            $recordDAO=RecordDAO::getRecordDAO(self::$conexionBD);
            $record=$recordDAO->getListByDocument($cod_documento);
            return $record;
        }

	    /**
	    * Change the conexion
	    */
	    public static function setConexionBD($conexionBD){
	                self::$conexionBD = $conexionBD;
	            }
	}
?>