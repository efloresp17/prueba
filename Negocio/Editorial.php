<?php

/**
 * Represents the class of the Editorial - DTO entity
 */

class Editorial
{

    //----------------------------
    //Attributes
    //----------------------------

    /**
     * Editorial code
     * 
     * @var int
     */
    private $cod_editorial;

    /**
     * publisher name
     *
     * @return String
     */
    private $nom_editorial;

    /**
     * editorial email
     *
     * @return String
     */
    private $correo;

    /**
     * editorial address
     *
     * @return String
     */
    private $direccion;

    /**
     * editorial phone
     *
     * @return int
     */
    private $telefono;


    /**
     * Getter the editorial code
     *
     * @return  int
     */
    public function getCod_editorial()
    {
        return $this->cod_editorial;
    }

    /**
     * Setter the editorial code.
     *
     * @param  int  $editorial code.
     *
     * @return  self
     */
    public function setCod_editorial($cod_editorial)
    {
        $this->cod_editorial = $cod_editorial;

        return $this;
    }

   

    /**
     * Getter publisher name
     *
     * @return  String
     */
    public function getNom_editorial()
    {
        return $this->nom_editorial;
    }

    /**
     * Setter publisher name
     *
     * @param  String  $publisher name.
     *
     * @return  self
     */
    public function setNom_editorial($nom_editorial)
    {
        $this->nom_editorial = $nom_editorial;

        return $this;
    }

    /**
     * Getter editorial email.
     *
     * @return  String
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Setter editorial email.
     *
     * @param  String  $editorial email.
     *
     * @return  self
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Getter editorial address.
     *
     * @return  int
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Setter editorial address.
     *
     * @param  int  $editorial address.
     *
     * @return  self
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Getter editorial phone.
     *
     * @return  String
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Setter editorial phone.
     *
     * @param  String  $editorial phone.
     *
     * @return  self
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }
}
