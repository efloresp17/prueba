<?php

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/Book.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/Document.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Persistencia/DAO.php';

/**
 *Represents the DAO of the book entity
 */
class BookDAO implements DAO
{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

    /**
     * Reference to a bookDAO object
     * @var bookDAO
     */
    private static $bookDAO;

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
     * Method to query a book by his code type
     *
     * @param int $title_book
     * @return Book
     */
    public function consultTitle($title_book)
    {

        $sql = "SELECT * FROM LIBRO WHERE titulo = " . $title_book;

        if (!$resultado = pg_Exec($this->conexion, $sql));
        $row = pg_fetch_array($resultado);

        $book = new Book();
        $book->setCod_documento($row[0]);
        $book->setFecha_publicacion($row[1]);
        $book->setIsbn($row[2]);
        $book->setTotal_paginas($row[3]);

        return $book;
    }

    /**
     * Method to query a book by his code type
     *
     * @param int $title_book
     * @return Book
     */
    public function consult($cod_documento)
    {

        $sql = "SELECT * FROM LIBRO WHERE cod_documento = " . $cod_documento;


        if (!$resultado = pg_Exec($this->conexion, $sql));
        $row = pg_fetch_array($resultado);

        $book = new Book();

        $book->setCod_documento($row[0]);
        $book->setFecha_publicacion($row[1]);
        $book->setIsbn($row[2]);
        $book->setTotal_paginas($row[3]);

        return $book;
    }

    /**
     * Method to create a new book
     *
     * @param Book $book
     * @return void
     */
    public function create($book)
    {
        $sql = "insert into LIBRO(cod_documento, fecha_publicacion, isbn, total_paginas) values ("
                .$book->getCod_documento().",'"
                .$book->getFecha_publicacion()."','"
                .$book->getIsbn()."',"
                .$book->getTotal_paginas().");";
        
        pg_Exec($this->conexion, $sql);
    }

    /**
     * Method that modifies a book entered by parameter
     *
     * @param Book $book
     * @return void
     */
    public function modify($book)
    {

        $sql = "UPDATE LIBRO SET cod_documento = " . $book->getCod_documento() . ",
                                   fecha_publicacion = '" . $book->getFecha_publicacion() . "',
                                   isbn = '" . $book->getIsbn() . "'  ,
                                   total_paginas= " . $book->getTotal_paginas() . "
                                   where cod_documento = " . $book->getCod_documento() . ";";
        pg_Exec($this->conexion, $sql);
    }
    /**
     * Method that delete a book entered by parameter
     *
     * @param Book $book
     * @return void
     */
    public function delete($book)
    {

        $sql = "DELETE FROM LIBRO WHERE cod_documento = " . $book . ";";

        pg_Exec($this->conexion, $sql);
    }


    /**
     * Method to get a BookDAO object
     *
     * @param Object $conexion
     * @return BookDAO
     */
    public function getList()
    {

        $sql = "SELECT * FROM LIBRO";
        $books = array();
        if (!$resultado = pg_Exec($this->conexion, $sql));


        while ($row = pg_fetch_array($resultado)) {
            $book = new Book();

            $book->setCod_documento($row[0]);
            $book->setFecha_publicacion($row[1]);
            $book->setIsbn($row[2]);
            $book->setTotal_paginas($row[3]);

            $books[] = $book;
        }
        return $books;
    }

    public function getListBook()
    {

        $sql = "select documento.cod_documento, documento.subido_por, documento.cod_editorial, documento.cod_estado, documento.cantidad,
        documento.titulo, documento.fecha_creacion, libro.fecha_publicacion, libro.isbn, libro.total_paginas
        from documento, libro where documento.cod_t_documento = 1;";
        $books = array();
        $documents = array();
        if (!$resultado = pg_Exec($this->conexion, $sql));


        while ($row = pg_fetch_array($resultado)) {
            $book = new Book();
            $document = new Document();

            $document->setCod_documento($row[0]);
            $document->setSubido_por($row[1]);
            $document->setCod_editorial($row[2]);
            $document->setCod_estado($row[3]);
            $document->setCantidad($row[4]);
            $document->setTitulo($row[5]);
            $document->setFecha_creacion($row[6]);
            $book->setFecha_publicacion($row[7]);
            $book->setIsbn($row[8]);
            $book->setTotal_paginas($row[9]);

            $documents[] = $document;
            $books[] = $book;
            $array = array_merge($documents, $books);
        }
        return $array;
    }



    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return BookDAO
     */
    public static function getBookDAO($conexion)
    {
        if (self::$bookDAO == null) {
            self::$bookDAO = new BookDAO($conexion);
        }

        return self::$bookDAO;
    }
}
