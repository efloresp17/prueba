<?php
/**
 * Represents the class of the Presentation - DTO entity
 */
class Presentation{
    //----------------------------
    //Attributes
    //----------------------------

  
    /**
     * Document code
     * 
     * @var int
     */
    private $cod_documento;


    /**
     * Presentation publication date
     *
     * @return date
     */ 
    private $fecha_publicacion; 

    /**
     * isbn of the Presentation.
     *
     * @return String
     */ 
    private $isbn;

    /**
     * Name of the Congress Presentation
     *
     * @return String
     */ 
    private $nombre_congreso; 

    
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
     * Getter the date of presentation's publication.
     *
     * @return  date
     */ 
    public function getFecha_publicacion()
    {
        return $this->fecha_publicacion;
    }

    /**
     * Setter the date of presentation's publication.
     *
     * @param  date  $date of presentation's publication.
     *
     * @return  self
     */ 
    public function setFecha_publicacion($fecha_publicacion)
    {
        $this->fecha_publicacion = $fecha_publicacion;

        return $this;
    }

    /**
     * Getter isbn of the presentation.
     *
     * @return  String
     */ 
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * Setter isbn of the presentation.
     *
     * @param  String  $isbn of the presentation.
     *
     * @return  self
     */ 
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;

        return $this;
    }

    /**
     * Getter the name of Congress Presentation.
     *
     * @return  String
     */ 
    public function getNombre_Congreso()
    {
        return $this->nombre_congreso;
    }

    /**
     * Setter the name of Congress Presentation.
     *
     * @param  String  $nombre_congreso.
     *
     * @return  self
     */ 
    public function setNombre_Congreso($nombre_congreso)
    {
        $this->nombre_congreso = $nombre_congreso;

        return $this;
    }

}
?>