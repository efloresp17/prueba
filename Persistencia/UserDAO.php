<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/User.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Persistencia/DAO.php';

/**
 *Represents the DAO of the user entity
 */
class UserDAO implements DAO
{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

    /**
     * Reference to a userDAO object
     * @var userDAO
     */
    private static $userDAO;

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
     * Method to query a user by his name
     *
     * @param String $nombre
     * @return User
     */
    public function consultName($nombre)
    {

        $sql = "SELECT * FROM USUARIO WHERE nombre = " . $nombre;

        if (!$resultado = pg_Exec($this->conexion, $sql));
        $row = pg_fetch_array($resultado);

        $user = new User();
        $user->setCod_usuario($row[0]);
        $user->setCod_t_usuario($row[1]);
        $user->setCorreo($row[2]);
        $user->setPassword($row[3]);
        $user->setNombre($row[4]);
        $user->setEstado($row[5]);
        $user->setCantidad_documentos($row[6]);
        $user->setDireccion($row[7]);
        $user->setTelefono($row[8]);
        $user->setCantidad_reservas_hechas($row[9]);
        //echo $sql;
        return $user;
    }


    /**
     * Method to query a user by his name
     *
     * @param String $nombre
     * @return User
     */
    public function consultEmail($email)
    {

        $sql = "SELECT * FROM USUARIO WHERE correo = '" . $email . "';";

        if ($resultado = pg_Exec($this->conexion, $sql)) {

            $row = pg_fetch_array($resultado);

            $user = new User();
            $user->setCod_usuario($row[0]);
            $user->setCod_t_usuario($row[1]);
            $user->setCorreo($row[2]);
            $user->setPassword($row[3]);
            $user->setNombre($row[4]);
            $user->setEstado($row[5]);
            $user->setCantidad_documentos($row[6]);
            $user->setDireccion($row[7]);
            $user->setTelefono($row[8]);
            $user->setCantidad_reservas_hechas($row[9]);
            return $user;
        } else {

            return false;
        }
    }

    /**
     * Method to query a user by his code type
     *
     * @param int $cod_usuario
     * @return User
     */
    public function consult($cod_usuario)
    {

        $sql = "SELECT * FROM USUARIO WHERE cod_usuario = " . $cod_usuario;

        if (!$resultado = pg_Exec($this->conexion, $sql));
        $row = pg_fetch_array($resultado);

        $user = new User();
        $user->setCod_usuario($row[0]);
        $user->setCod_t_usuario($row[1]);
        $user->setCorreo($row[2]);
        $user->setPassword($row[3]);
        $user->setNombre($row[4]);
        $user->setEstado($row[5]);
        $user->setCantidad_documentos($row[6]);
        $user->setDireccion($row[7]);
        $user->setTelefono($row[8]);
        $user->setCantidad_reservas_hechas($row[9]);
        return $user;
    }

    /**
     * Method to create a new User
     *
     * @param User
     * @return void
     */
    public function create($user)
    {


        $sql = "INSERT INTO USUARIO (cod_t_usuario, correo, password, nombre, cod_estado) VALUES (" . $user->getCod_t_usuario() . ",
                                            '" . $user->getCorreo() . "',
                                            '" . $user->getPassword() . "',
                                            '" . $user->getNombre() . "',
                                             " . $user->getEstado() . ",
                                             " . $user->getCantidad_documentos() . ",
                                             '" . $user->getDireccion() . "',
                                             '" . $user->getTelefono() . "',
                                             " . $user->getCantidad_reservas_hechas() . ",
                                            );";
        //echo  $sql;
        pg_Exec($this->conexion, $sql);
    }

    /**
     * Method that modifies a user entered by parameter
     *
     * @param User 
     * @return void
     */
    public function modify($user)
    {

        $sql = "UPDATE USUARIO SET cod_usuario = " . $user->getCod_usuario() . ",
                                    cod_t_usuario = " . $user->getCod_t_usuario() . ",
                                    correo = '" . $user->getCorreo() . "',
                                    password = '" . $user->getPassword() . "',
                                    nombre = '" . $user->getNombre() . "',
                                    cod_estado = " . $user->getEstado() . ",
                                    cantidad_documentos = " . $user->getCantidad_documentos() . ",
                                    direccion = '" . $user->getDireccion() . "',
                                    telefono = '" . $user->getTelefono() . "',
                                    cantidad_reservas_hechas = " . $user->getCantidad_reservas_hechas() . " 
                                    where cod_usuario = " . $user->getCod_usuario() . ";";
        
        pg_Exec($this->conexion, $sql);
    }

    /**
     * Method to get all users
     *
     * @param Object $conexion
     * @return User[]
     */
    public function getList()
    {

        $sql = "SELECT * FROM USUARIO";
        $users = array();
        if (!$resultado = pg_Exec($this->conexion, $sql));


        while ($row = pg_fetch_array($resultado)) {
            $user = new User();
            $user->setCod_usuario($row[0]);
            $user->setCod_t_usuario($row[1]);
            $user->setCorreo($row[2]);
            $user->setPassword($row[3]);
            $user->setNombre($row[4]);
            $user->setEstado($row[5]);
            $user->setCantidad_documentos($row[6]);
            $user->setDireccion($row[7]);
            $user->setTelefono($row[8]);
            $user->setCantidad_reservas_hechas($row[9]);

            $users[] = $user;
        }
        return $users;
    }

    /**
     * Method to get all users by a user type
     *
     * @param Object $conexion
     * @return User[]
     */
    public function getUserListByType($cod_t_usuario)
    {

        $sql = "SELECT * FROM USUARIO WHERE COD_T_USUARIO=" . $cod_t_usuario . ";";
        $users = array();
        if (!$resultado = pg_Exec($this->conexion, $sql));


        while ($row = pg_fetch_array($resultado)) {
            $user = new User();
            $user->setCod_usuario($row[0]);
            $user->setCod_t_usuario($row[1]);
            $user->setCorreo($row[2]);
            $user->setPassword($row[3]);
            $user->setNombre($row[4]);
            $user->setEstado($row[5]);
            $user->setCantidad_documentos($row[6]);
            $user->setDireccion($row[7]);
            $user->setTelefono($row[8]);
            $user->setCantidad_reservas_hechas($row[9]);

            $users[] = $user;
        }
        return $users;
    }

    /**
     * Method to delete a user
     * @param $cod_usuario
     * @return User
     */
    public function delete($cod_usuario)
    {
        $sql = "DELETE FROM USUARIO WHERE cod_usuario=" . $cod_usuario;
        pg_Exec($this->conexion, $sql);
    }

    /**
     * Method to get quantity of users by role
     * @return User
     */
    public function getQuantityUsersByRole()
    {
        $quantityUsers = array();

        $sql = "SELECT COUNT(COD_USUARIO) FROM USUARIO WHERE COD_T_USUARIO=1;";
        $resultado = pg_Exec($this->conexion, $sql);
        $cantidad = pg_fetch_array($resultado);
        array_push($quantityUsers, $cantidad[0]);

        $sql = "SELECT COUNT(COD_USUARIO) FROM USUARIO WHERE COD_T_USUARIO=3;";
        $resultado = pg_Exec($this->conexion, $sql);
        $cantidad = pg_fetch_array($resultado);
        array_push($quantityUsers, $cantidad[0]);

        $sql = "SELECT COUNT(COD_USUARIO) FROM USUARIO WHERE COD_T_USUARIO=4;";
        $resultado = pg_Exec($this->conexion, $sql);
        $cantidad = pg_fetch_array($resultado);
        array_push($quantityUsers, $cantidad[0]);

        $sql = "SELECT COUNT(COD_USUARIO) FROM USUARIO WHERE COD_T_USUARIO=5;";
        $resultado = pg_Exec($this->conexion, $sql);
        $cantidad = pg_fetch_array($resultado);
        array_push($quantityUsers, $cantidad[0]);

        $sql = "SELECT COUNT(COD_USUARIO) FROM USUARIO WHERE COD_T_USUARIO=6;";
        $resultado = pg_Exec($this->conexion, $sql);
        $cantidad = pg_fetch_array($resultado);
        array_push($quantityUsers, $cantidad[0]);


        return $quantityUsers;
    }


    /**
     * Method to get quantity of users by role
     * @return User
     */
    public function getQuantityUsersByStatus()
    {
        $quantityUsers = array();

        $sql = "SELECT COUNT(COD_USUARIO) FROM USUARIO WHERE COD_ESTADO=1;";
        $resultado = pg_Exec($this->conexion, $sql);
        $cantidad = pg_fetch_array($resultado);
        array_push($quantityUsers, $cantidad[0]);

        $sql = "SELECT COUNT(COD_USUARIO) FROM USUARIO WHERE COD_ESTADO=2;";
        $resultado = pg_Exec($this->conexion, $sql);
        $cantidad = pg_fetch_array($resultado);
        array_push($quantityUsers, $cantidad[0]);

        $sql = "SELECT COUNT(COD_USUARIO) FROM USUARIO WHERE COD_ESTADO=3;";
        $resultado = pg_Exec($this->conexion, $sql);
        $cantidad = pg_fetch_array($resultado);
        array_push($quantityUsers, $cantidad[0]);

        $sql = "SELECT COUNT(COD_USUARIO) FROM USUARIO WHERE COD_ESTADO=4;";
        $resultado = pg_Exec($this->conexion, $sql);
        $cantidad = pg_fetch_array($resultado);
        array_push($quantityUsers, $cantidad[0]);


        return $quantityUsers;
    }

    /**
     * Method to get Users with more documents
     * @return User
     */
    public function getUsersMoreDocuments()
    {
        $usersMoreDocuments = array();
        $sql = "SELECT * FROM USUARIO ORDER BY cantidad_documentos DESC LIMIT 5;";

        if (!$resultado = pg_Exec($this->conexion, $sql));


        while ($row = pg_fetch_array($resultado)) {
            $user = new User();
            $user->setCod_usuario($row[0]);
            $user->setCod_t_usuario($row[1]);
            $user->setCorreo($row[2]);
            $user->setPassword($row[3]);
            $user->setNombre($row[4]);
            $user->setEstado($row[5]);
            $user->setCantidad_documentos($row[6]);
            $user->setDireccion($row[7]);
            $user->setTelefono($row[8]);
            $user->setCantidad_reservas_hechas($row[9]);

            $usersMoreDocuments[] = $user;
        }
        return $usersMoreDocuments;
    }

    /**
     * Method to get Users with less documents
     * @return User
     */
    public function getUsersLessDocuments()
    {

        $usersLessDocuments = array();
        $sql = "SELECT * FROM USUARIO ORDER BY cantidad_documentos ASC LIMIT 5;";

        if (!$resultado = pg_Exec($this->conexion, $sql));


        while ($row = pg_fetch_array($resultado)) {
            $user = new User();
            $user->setCod_usuario($row[0]);
            $user->setCod_t_usuario($row[1]);
            $user->setCorreo($row[2]);
            $user->setPassword($row[3]);
            $user->setNombre($row[4]);
            $user->setEstado($row[5]);
            $user->setCantidad_documentos($row[6]);
            $user->setDireccion($row[7]);
            $user->setTelefono($row[8]);
            $user->setCantidad_reservas_hechas($row[9]);

            $usersLessDocuments[] = $user;
        }
        return $usersLessDocuments;
    }


    /**
     * Method to get Users with more reservations
     * @return User
     */
    public function getUsersMoreReservations()
    {

        $usersMoreReservations = array();
        $sql = "SELECT * FROM USUARIO ORDER BY cantidad_reservas_hechas DESC LIMIT 5;";

        if (!$resultado = pg_Exec($this->conexion, $sql));


        while ($row = pg_fetch_array($resultado)) {
            $user = new User();
            $user->setCod_usuario($row[0]);
            $user->setCod_t_usuario($row[1]);
            $user->setCorreo($row[2]);
            $user->setPassword($row[3]);
            $user->setNombre($row[4]);
            $user->setEstado($row[5]);
            $user->setCantidad_documentos($row[6]);
            $user->setDireccion($row[7]);
            $user->setTelefono($row[8]);
            $user->setCantidad_reservas_hechas($row[9]);

            $usersMoreReservations[] = $user;
        }
        return $usersMoreReservations;
    }


    /**
     * Method to get Users with less reservations
     * @return User
     */
    public function getUsersLessReservations()
    {

        $usersLessReservations = array();
        $sql = "SELECT * FROM USUARIO ORDER BY cantidad_reservas_hechas ASC LIMIT 5;";

        if (!$resultado = pg_Exec($this->conexion, $sql));


        while ($row = pg_fetch_array($resultado)) {
            $user = new User();
            $user->setCod_usuario($row[0]);
            $user->setCod_t_usuario($row[1]);
            $user->setCorreo($row[2]);
            $user->setPassword($row[3]);
            $user->setNombre($row[4]);
            $user->setEstado($row[5]);
            $user->setCantidad_documentos($row[6]);
            $user->setDireccion($row[7]);
            $user->setTelefono($row[8]);
            $user->setCantidad_reservas_hechas($row[9]);

            $usersLessReservations[] = $user;
        }
        return $usersLessReservations;
    }

    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return Presentation
     */
    public static function getUserDAO($conexion)
    {
        if (self::$userDAO == null) {
            self::$userDAO = new UserDAO($conexion);
        }

        return self::$userDAO;
    }
}
