<?php
/**
 * Represents the class of the User_Type - DTO entity
 */

class User_Type{
    //----------------------------
    //Attributes
    //----------------------------

    /**
     * User_Type code
     * 
     * @var int
     */
    private $cod_t_usuario;

    /**
     * Name of the type user
     *
     * @return String
     */ 
    private $nom_t_usuario;
    
    /**
     * Getter of cod_t_usuario.
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
     * Getter the name of user type.
     *
     * @return  String
     */ 
    public function getNom_t_usuario()
    {
        return $this->nom_t_usuario;
    }

    /**
     * Setter the name of user type.
     *
     * @param  String  $name of user type.
     *
     * @return  self
     */ 
    public function setNom_t_usuario($nom_t_usuario)
    {
        $this->nom_t_usuario = $nom_t_usuario;

        return $this;
    }

}

?>