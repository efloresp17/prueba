<?php

/**
 * Represents the class of the Author_Document - DTO entity
 */

class Author_Document
{

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
     * Author code
     *
     * @return int
     */
    private $cod_autor;


    /**
     * Getter the cocument code
     *
     * @return  int
     */
    public function getCod_documento()
    {
        return $this->cod_documento;
    }

    /**
     * Setter the document code.
     *
     * @param  int  $document code.
     *
     * @return  self
     */
    public function setCod_documento($cod_documento)
    {
        $this->cod_documento = $cod_documento;

        return $this;
    }

    /**
     * Getter the Author code
     *
     * @return  int
     */
    public function getCod_autor()
    {
        return $this->cod_autor;
    }

    /**
     * Setter the Author code
     *
     * @param  int  $Author code
     * @return  self
     */
    public function setCod_autor($cod_autor)
    {
        $this->cod_autor = $cod_autor;

        return $this;
    }
}
