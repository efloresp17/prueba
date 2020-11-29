<?php
    /**
     * Amount of classes
     */	
	require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/persistencia/Util/Conexion.php';
	require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/persistencia/UserDAO.php';


    class ManejoUser{
        
        /**
         * Attribute for connection to the database
         */
        private static $conexion;

        /**
         * @var ManejoUser
         */
        
		function __construct(){
            
        }
        
        /**
	     * Consult a User by his code type
	     *
	    * @param int $cod_usuario
	    * @return User
	     */
        public static function consultUser($cod_usuario){

            $userDAO= UserDAO::getUserDAO(self::$conexion);
            $user=$userDAO->consult($cod_usuario);
            return $user;
        }
        
        /**
         * Consult a User by his code type
         *
        * @param int $cod_usuario
        * @return User
         */
        public static function consultEmail($email){

            $userDAO = UserDAO::getUserDAO(self::$conexion);
            $user=$userDAO->consultEmail($email);
            return $user;
        }

        /**
         * Create a new User
         * @param User
         * @return void
         */
        public static function createUser($user){
            $userDAO= UserDAO::getUserDAO(self::$conexion);
            $userDAO->create($user);
        }

        
        /**
         * Modify a User
         * @param User
         * @return void
         */
        public static function modifyUser($user){
            $userDAO=UserDAO::getUserDAO(self::$conexion);
            $userDAO->modify($user);
        }

        /**
         * Delete a User
         * @param User
         * @return void
         */
        public static function deleteUser($cod_usuario){
            $userDAO=UserDAO::getUserDAO(self::$conexion);
            $userDAO->delete($cod_usuario);
        }

        
        /**
         * List all User
         * @return User[] 
         */
        public static function getUserList(){
            
            $userDAO= UserDAO::getUserDAO(self::$conexion);
            $user=$userDAO->getList();
            return $user;
        }

        /**
         * List all User by a user type
         * @return User[] 
         */
        public static function getUserListByType($cod_t_usuario){
            
            $userDAO= UserDAO::getUserDAO(self::$conexion);
            $user=$userDAO->getUserListByType($cod_t_usuario);
            return $user;
        }

        /**
         * List of quantity users by role
         * @return quantityUsers[] 
         */
        public static function getQuantityUsersByRole(){
            
            $userDAO= UserDAO::getUserDAO(self::$conexion);
            $quantityUsers=$userDAO->getQuantityUsersByRole();
            return $quantityUsers;
        }

        /**
         * List of quantity users by status
         * @return quantityUsers[] 
         */
        public static function getQuantityUsersByStatus(){
            
            $userDAO= UserDAO::getUserDAO(self::$conexion);
            $quantityUsers=$userDAO->getQuantityUsersByStatus();
            return $quantityUsers;
        }

        /**
         * List of users with more documents
         * @return quantityUsers[] 
         */
        public static function getUsersMoreDocuments(){
            
            $userDAO= UserDAO::getUserDAO(self::$conexion);
            $usersMoreDocuments=$userDAO->getUsersMoreDocuments();
            return $usersMoreDocuments;
        }

        /**
         * List of users with less documents
         * @return quantityUsers[] 
         */
        public static function getUsersLessDocuments(){
            
            $userDAO= UserDAO::getUserDAO(self::$conexion);
            $usersLessDocuments=$userDAO->getUsersLessDocuments();
            return $usersLessDocuments;
        }


        /**
         * List of Users with more reservations
         * @return quantityUsers[] 
         */
        public static function getUsersMoreReservations(){
            
            $userDAO= UserDAO::getUserDAO(self::$conexion);
            $usersMoreReservations=$userDAO->getUsersMoreReservations();
            return $usersMoreReservations;
        }

        /**
         * List of Users with less reservations
         * @return quantityUsers[] 
         */
        public static function getUsersLessReservations(){
            
            $userDAO= UserDAO::getUserDAO(self::$conexion);
            $usersLessReservations=$userDAO->getUsersLessReservations();
            return $usersLessReservations;
        }
        
         /**
         * Reference to the connection with the database
         * @var Object
         */
        public static function setConexionBD($conexion){
            self::$conexion = $conexion;
        }

    }
?>