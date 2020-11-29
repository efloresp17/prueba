<?php

/**
 * Represents the class of the RESERVATION - DTO entity
 */

class Reservation{

    //----------------------------
    //Attributes
    //----------------------------

    /**
     * Reservation code
     * 
     * @var int
     */
    private $cod_reserva;


    /**
     * Code of the document to which it belongs
     *
     * @return int
     */ 
    private $cod_documento;

    /**
     * User Code.
     *
     * @return int
     */ 
    private $cod_usuario;

    /**
     * User Code.
     *
     * @return String
     */ 
    private $estado;

    /**
     * User Code.
     *
     * @return date
     */ 
    private $fecha_Inicial;
     
    /**
     * User Code.
     *
     * @return date
     */ 
    private $fecha_Limite_Entrega;

    /**
     * User Code.
     *
     * @return date
     */ 
    private $fecha_Entrega;

    /**
     * Get reservation code
     *
     * @return  int
     */ 
    public function getCod_reserva()
    {
        return $this->cod_reserva;
    }

    /**
     * Set reservation code
     *
     * @param  int  $cod_reserva  Reservation code
     *
     * @return  self
     */ 
    public function setCod_reserva($cod_reserva)
    {
        $this->cod_reserva = $cod_reserva;

        return $this;
    }

    /**
     * Get the value of cod_documento
     */ 
    public function getCod_documento()
    {
        return $this->cod_documento;
    }

    /**
     * Set the value of cod_documento
     *
     * @return  self
     */ 
    public function setCod_documento($cod_documento)
    {
        $this->cod_documento = $cod_documento;

        return $this;
    }

    /**
     * Get the value of cod_usuario
     */ 
    public function getCod_usuario()
    {
        return $this->cod_usuario;
    }

    /**
     * Set the value of cod_usuario
     *
     * @return  self
     */ 
    public function setCod_usuario($cod_usuario)
    {
        $this->cod_usuario = $cod_usuario;

        return $this;
    }

    /**
     * Get the value of cod_usuario
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of cod_usuario
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of cod_usuario
     */ 
    public function getFecha_Inicial()
    {
        return $this->fecha_Inicial;
    }

    /**
     * Set the value of cod_usuario
     *
     * @return  self
     */ 
    public function setFecha_Inicial($fecha_Inicial)
    {
        $this->fecha_Inicial = $fecha_Inicial;

        return $this;
    }

    /**
     * Get the value of cod_usuario
     */ 
    public function getFecha_Limite_Entrega()
    {
        return $this->fecha_Limite_Entrega;
    }

    /**
     * Set the value of cod_usuario
     *
     * @return  self
     */ 
    public function setFecha_Limite_Entrega($fecha_Limite_Entrega)
    {
        $this->fecha_Limite_Entrega = $fecha_Limite_Entrega;

        return $this;
    }

    /**
     * Get the value of cod_usuario
     */ 
    public function getFecha_Entrega()
    {
        return $this->fecha_Entrega;
    }

    /**
     * Set the value of cod_usuario
     *
     * @return  self
     */ 
    public function setFecha_Entrega($fecha_Entrega)
    {
        $this->fecha_Entrega = $fecha_Entrega;

        return $this;
    }
}  