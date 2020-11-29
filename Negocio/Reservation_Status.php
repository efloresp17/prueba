<?php
 /**
 * Represents the class of the Reservation Status - DTO entity
 */   

 class Reservation_Status{
    //----------------------------
    //Attributes
    //----------------------------

    /**
     * reservation status code
     * 
     * @var int
     */
    private $cod_estado_reserva;

    /**
     * Name of the reservation status
     *
     * @return String
     */ 
    private $nom_estado_reserva;

    
    /**
     * Getter of cod_estado_reserva.
     *
     * @return  int
     */ 
    public function getCod_estado_reserva()
    {
        return $this->cod_estado_reserva;
    }

    
    /**
     * Setter of cod_estado.
     *
     * @param  int  $cod_estado_reserva.
     *
     * @return  self
     */ 
    public function setCod_estado_reserva($cod_estado_reserva)
    {
        $this->cod_estado_reserva = $cod_estado_reserva;

        return $this;
    }

    
    /**
     * Getter the name of reservation status.
     *
     * @return  String
     */ 
    public function getNom_estado_reserva()
    {
        return $this->nom_estado_reserva;
    }

    /**
     * Setter the name of reservation status.
     *
     * @param  String  $name of reservation status.
     *
     * @return  self
     */ 
    public function setNom_estado_reserva($nom_estado_reserva)
    {
        $this->nom_estado_reserva = $nom_estado_reserva;

        return $this;
    }
 }
?>