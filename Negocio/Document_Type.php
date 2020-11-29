<?php
 /**
 * Represents the class of the Document_Type - DTO entity
 */   

 class Document_Type{
    //----------------------------
    //Attributes
    //----------------------------

    /**
     * Document_type code
     * 
     * @var int
     */
    private $cod_t_documento;

    /**
     * Name of the type_document
     *
     * @return String
     */ 
    private $nom_t_documento;

    
    /**
     * Getter of cod_t_documento.
     *
     * @return  int
     */ 
    public function getCod_t_documento()
    {
        return $this->cod_t_documento;
    }

    
    /**
     * Setter of cod_t_documento.
     *
     * @param  int  $cod_t_documento.
     *
     * @return  self
     */ 
    public function setCod_t_documento($cod_t_documento)
    {
        $this->cod_t_documento = $cod_t_documento;

        return $this;
    }

    
    /**
     * Getter the name of document type.
     *
     * @return  String
     */ 
    public function getNom_t_documento()
    {
        return $this->nom_t_documento;
    }

    /**
     * Setter the name of document type.
     *
     * @param  String  $name of document type.
     *
     * @return  self
     */ 
    public function setNom_t_documento($nom_t_documento)
    {
        $this->nom_t_documento = $nom_t_documento;

        return $this;
    }



 }
?>