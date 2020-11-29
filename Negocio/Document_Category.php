<?php

/**
 * Represents the class of the Editorial - DTO entity
 */

class Document_Category
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
     * Category code
     *
     * @return int
     */
    private $cod_categoria;


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
     * Getter the category code
     *
     * @return  int
     */
    public function getCod_categoria()
    {
        return $this->cod_categoria;
    }

    /**
     * Setter the category code.
     *
     * @param  int  $document code.
     *
     * @return  self
     */
    public function setCod_categoria($cod_categoria)
    {
        $this->cod_categoria = $cod_categoria;

        return $this;
    }
}
