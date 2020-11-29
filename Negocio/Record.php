<?php

/**
 * Represents the class of the RECORD - DTO entity
 */

class Record{

    //----------------------------
    //Attributes
    //----------------------------

    /**
     * record code
     * 
     * @var int
     */
    private $cod_record;

    /**
     * Book code
     * 
     * @var int
     */
    private $cod_documento;

    /**
     * User code
     * 
     * @var int
     */
    private $cod_usuario;

    /**
     * Description of record
     * 
     * @var int
     */
    private $descripcion;

    /**
     * Date publication
     * 
     * @var date
     */
    private $fecha_publicacion;


    //----------------------------
    //Methods
    //----------------------------


    /**
     * Getter the code of the document.
     *
     * @return  int
     */ 
    public function getCod_documento()
    {
        return $this->cod_documento;
    }

    /**
     * Setter the code of the document.
     *
     * @param  int  $code of the document.
     *
     * @return  self
     */ 
    public function setCod_documento($cod_documento)
    {
        $this->cod_documento = $cod_documento;

        return $this;
    }

    /**
     * Getter the User code
     *
     * @return  int
     */ 
    public function getCod_usuario()
    {
        return $this->cod_usuario;
    }

    /**
     * Setter the User code
     *
     * @param  int  $User code
     *
     * @return  self
     */ 
    public function setCod_usuario($cod_usuario)
    {
        $this->cod_usuario = $cod_usuario;

        return $this;
    }


    /**
     * Getter the Description of record
     *
     * @return  int
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Setter the Description of record
     *
     * @param  int  $Description of record
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }


    /**
     * Getter the Date publication.
     *
     * @return  date
     */ 
    public function getFecha_publicacion()
    {
        return $this->fecha_publicacion;
    }

    /**
     * Setter the Date publication.
     *
     * @param  date  $Date publication.
     *
     * @return  self
     */ 
    public function setFecha_publicacion($fecha_publicacion)
    {
        $this->fecha_publicacion = $fecha_publicacion;

        return $this;
    }

        /**
     * Getter the record code
     *
     * @return  int
     */ 
    public function getCod_record()
    {
        return $this->cod_record;
    }

    /**
     * Setter the record code
     *
     * @param  int  $record code
     *
     * @return  self
     */ 
    public function setCod_record($cod_record)
    {
        $this->cod_record = $cod_record;

        return $this;
    }
 
}

?>