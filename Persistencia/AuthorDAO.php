<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/Author.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Persistencia/DAO.php';

/**
 *Represents the DAO of the author entity
 */
class AuthorDAO implements DAO
{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

    /**
     * Reference to a authorDAO object
     * @var AuthorDAO
     */
    private static $AuthorDAO;

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
     * Method to query a Author by his code type
     *
     * @param int $cod_autor
     * @return Author
     */
    public function consult($cod_autor)
    {

        $sql = "SELECT * FROM AUTOR WHERE cod_autor = " . $cod_autor;
    
        if (!$resultado = pg_Exec($this->conexion, $sql));
        $row = pg_fetch_array($resultado);

        $autor = new Author();
        $autor->setCod_autor($row[0]);
        $autor->setNom_autor($row[1]);
        $autor->setCorreo($row[2]);
        $autor->setDireccion($row[3]);
        $autor->setTelefono($row[4]);


        return $autor;
    }

    public function consultByName($nom)
    {

        $sql = "SELECT * FROM AUTOR WHERE nom_autor = '".$nom."';";
    
        if (!$resultado = pg_Exec($this->conexion, $sql));
        $row = pg_fetch_array($resultado);

        $autor = new Author();
        $autor->setCod_autor($row[0]);
        $autor->setNom_autor($row[1]);
        $autor->setCorreo($row[2]);
        $autor->setDireccion($row[3]);
        $autor->setTelefono($row[4]);


        return $autor;
    }
    /**
     * Method to create a new author
     *
     * @param Author $author
     * @return void
     */
    public function create($author)
    {

        $sql = "INSERT INTO AUTOR(nom_autor,correo,direccion,telefono) 
        VALUES ('".$author->getNom_autor()."',
            '".$author->getCorreo()."',
            '".$author->getDireccion()."',
            '".$author->getTelefono()."');";
        pg_Exec($this->conexion, $sql);
    }

    /**
     * Method that modifies a author entered by parameter
     *
     * @param Author $author
     * @return void
     */
    public function modify($author)
    {

        $sql = "UPDATE AUTOR SET cod_autor = " . $author->getCod_autor() . ",                                 
                                   nom_autor = '" . $author->getNom_autor() . "',
                                   correo = '" . $author->getCorreo() . "',
                                   direccion = '" . $author->getDireccion() . "',
                                   telefono = '" . $author->getTelefono() . "'
                                   where cod_autor = " . $author->getCod_autor() . ";";
        pg_Exec($this->conexion, $sql);
    }

    /**
     * Method to get all author
     *
     * @return Author
     */
    public function getList()
    {

        $sql = "SELECT * FROM AUTOR";
        $autores = array();
        if (!$resultado = pg_Exec($this->conexion, $sql));

        $autor = new Author();

        while ($row = pg_fetch_array($resultado)) {
            $autor->setCod_autor($row[0]);
            $autor->setNom_autor($row[1]);
            $autor->setCorreo($row[2]);
            $autor->setDireccion($row[3]);
            $autor->setTelefono($row[4]);
            $autores[] = $autor;
        }
        return $autores;
    }

    public function buscarAutor($nombre){

        $sql = "SELECT * FROM AUTOR WHERE nom_autor iLIKE '%".$nombre."%'";
        $autores = array();
        
        if (!$resultado = pg_Exec($this->conexion, $sql));
        
        while ($row = pg_fetch_array($resultado)) {
            
            $autor = new Author();
            $autor->setCod_autor($row[0]);
            $autor->setNom_autor($row[1]);
            $autor->setCorreo($row[2]);
            $autor->setDireccion($row[3]);
            $autor->setTelefono($row[4]);
            $autores[] = $autor;
        }
        return $autores;
    }

    /**
     * Method to delete a author
     * @param $cod_autor
     * @return Author
     */
    public function delete($cod_autor)
    {
        $sql = "DELETE FROM AUTOR WHERE cod_autor=" . $cod_autor;
        pg_Exec($this->conexion, $sql);
    }

    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return EditorialDAO
     */
    public static function getAuthorDAO($conexion)
    {
        if (self::$AuthorDAO == null) {
            self::$AuthorDAO = new AuthorDAO($conexion);
        }

        return self::$AuthorDAO;
    }
}
