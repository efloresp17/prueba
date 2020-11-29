<?php

/**
 * Represents the class of the BOOK - DTO entity
 */

class Book{

    //----------------------------
    //Attributes
    //----------------------------

    /**
     * Code of the document to which it belongs
     *
     * @return int
     */ 
    private $cod_documento;

    /**
     * book publication date
     *
     * @return date
     */ 
    private $fecha_publicacion; 

    /**
     * isbn of the book.
     *
     * @return String
     */ 
    private $isbn;

    /**
     * total pages of the book
     *
     * @return int
     */ 
    private $total_paginas;

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
     * Getter the date of publication book.
     *
     * @return  date
     */ 
    public function getFecha_publicacion()
    {
        return $this->fecha_publicacion;
    }

    /**
     * Setter the date of publication book.
     *
     * @param  date  $date of publication book.
     *
     * @return  self
     */ 
    public function setFecha_publicacion($fecha_publicacion)
    {
        $this->fecha_publicacion = $fecha_publicacion;

        return $this;
    }

    /**
     * Getter isbn of the book.
     *
     * @return  String
     */ 
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * Setter isbn of the book.
     *
     * @param  String  $isbn of the book.
     *
     * @return  self
     */ 
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;

        return $this;
    }

    /**
     * Getter total pages of the book.
     *
     * @return  int
     */ 
    public function getTotal_paginas()
    {
        return $this->total_paginas;
    }

    /**
     * Setter total pages of the book.
     *
     * @param  int  $total pages of the book.
     *
     * @return  self
     */ 
    public function setTotal_paginas($total_paginas)
    {
        $this->total_paginas = $total_paginas;

        return $this;
    }
     
}  

?>