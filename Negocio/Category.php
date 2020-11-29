<?php

/**
 * Represents the class of the CATEGORY - DTO entity
 */

class Category{

    //----------------------------
    //Attributes
    //----------------------------

    /**
     * Category code
     * 
     * @var int
     */
    private $cod_categoria;


    /**
     * Name of the category
     *
     * @return int
     */ 
    private $nom_categoria;
     
    /**
     * Get category code
     *
     * @return  int
     */ 
    public function getCod_categoria()
    {
        return $this->cod_categoria;
    }

    /**
     * Set category code
     *
     * @param  int  $cod_categoria  Category code
     *
     * @return  self
     */ 
    public function setCod_categoria(int $cod_categoria)
    {
        $this->cod_categoria = $cod_categoria;

        return $this;
    }

    /**
     * Get the value of nom_categoria
     */ 
    public function getNom_categoria()
    {
        return $this->nom_categoria;
    }

    /**
     * Set the value of nom_categoria
     *
     * @return  self
     */ 
    public function setNom_categoria($nom_categoria)
    {
        $this->nom_categoria = $nom_categoria;

        return $this;
    }
}  