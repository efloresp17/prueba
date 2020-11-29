<?php
 /**
 * Represents the class of the user - DTO entity
 */   

 class User{
    //----------------------------
    //Attributes
    //----------------------------

    /**
     * User code
     * 
     * @var int
     */
    private $cod_usuario;

    /**
     * Code of type user
     *
     * @return int
     */ 
    private $cod_t_usuario;

    /**
     * Email of the user
     *
     * @return String
     */ 
    private $correo;

    /**
     * Password of the user
     *
     * @return String
     */ 
    private $password;
    
    /**
     * Name of the user
     *
     * @return String
     */ 
    private $nombre;

    /**
     * Name of the user
     *
     * @return String
     */ 
    private $estado;

    /**
     * Quantity of the user's documents
     *
     * @return int
     */ 
    private $cantidad_documentos;

    /**
     * Direction of the user
     *
     * @return String
     */ 
    private $direccion;

    /**
     * telephone of the user
     *
     * @return String
     */ 
    private $telefono;

        /**
     * Quantity of the user's documents reservation
     *
     * @return int
     */ 
    private $cantidad_reservas_hechas;



    /**
     * Getter of cod_usuario
     *
     * @return  int
     */ 
    public function getCod_usuario()
    {
        return $this->cod_usuario;
    }

    /**
     * Setter of cod_usuario.
     *
     * @param  int  $cod_usuario.
     *
     * @return  self
     */ 
    public function setCod_usuario($cod_usuario)
    {
        $this->cod_usuario = $cod_usuario;

        return $this;
    }

    /**
     * Getter of cod_t_usuario
     *
     * @return  int
     */ 
    public function getCod_t_usuario()
    {
        return $this->cod_t_usuario;
    }

    /**
     * Setter of cod_t_usuario.
     *
     * @param  int  $cod_t_usuario.
     *
     * @return  self
     */ 
    public function setCod_t_usuario($cod_t_usuario)
    {
        $this->cod_t_usuario = $cod_t_usuario;

        return $this;
    }

    /**
     * Getter of correo
     *
     * @return  String
     */ 
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Setter of correo.
     *
     * @param  int  $correo.
     *
     * @return  self
     */ 
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Getter of password
     *
     * @return  String
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Setter of password.
     *
     * @param  int  $password.
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Getter of name
     *
     * @return  String
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Setter of nombre.
     *
     * @param  String  $nombre.
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Getter of estado
     *
     * @return  String
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Setter of estado.
     *
     * @param  String  $estado.
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    
    /**
     * Getter of quantity
     *
     * @return  int
     */ 
    public function getCantidad_documentos()
    {
        return $this->cantidad_documentos;
    }

        /**
     * Setter of quantity.
     *
     * @param  int  $cantidad_documentos.
     *
     * @return  self
     */ 
    public function setCantidad_documentos($cantidad_documentos)
    {
        $this->cantidad_documentos = $cantidad_documentos;

        return $this;
    }

        /**
     * Getter of Address
     *
     * @return  String
     */ 
    public function getDireccion()
    {
        return $this->direccion;
    }

        /**
     * Setter of Address.
     *
     * @param  String  $direccion.
     *
     * @return  self
     */ 
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

            /**
     * Getter of telefono
     *
     * @return  String
     */ 
    public function getTelefono()
    {
        return $this->telefono;
    }

        /**
     * Setter of telephone.
     *
     * @param  String  $telefono.
     *
     * @return  self
     */ 
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

        /**
     * Getter of quantity of reservation made
     *
     * @return  int
     */ 
    public function getCantidad_reservas_hechas()
    {
        return $this->cantidad_reservas_hechas;
    }

        /**
     * Setter of quantity. of reservation made
     *
     * @param  int  $cantidad_reservas_hechas.
     *
     * @return  self
     */ 
    public function setCantidad_reservas_hechas($cantidad_reservas_hechas)
    {
        $this->cantidad_reservas_hechas = $cantidad_reservas_hechas;

        return $this;
    }

    
 }
?>