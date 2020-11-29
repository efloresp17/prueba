<?php
 /**
 * Represents the class of the State - DTO entity
 */   

 class Status_User{
    //----------------------------
    //Attributes
    //----------------------------

    /**
     * State code
     * 
     * @var int
     */
    private $cod_estado;

    /**
     * Name of the state
     *
     * @return String
     */ 
    private $nom_estado;

    
    /**
     * Getter of cod_estado.
     *
     * @return  int
     */ 
    public function getCod_estado()
    {
        return $this->cod_estado;
    }

    
    /**
     * Setter of cod_estado.
     *
     * @param  int  $cod_estado.
     *
     * @return  self
     */ 
    public function setCod_estado($cod_estado)
    {
        $this->cod_estado = $cod_estado;

        return $this;
    }

    
    /**
     * Getter the name of state.
     *
     * @return  String
     */ 
    public function getNom_estado()
    {
        return $this->nom_estado;
    }

    /**
     * Setter the name of state.
     *
     * @param  String  $name of state.
     *
     * @return  self
     */ 
    public function setNom_estado($nom_estado)
    {
        $this->nom_estado = $nom_estado;

        return $this;
    }
 }
?>