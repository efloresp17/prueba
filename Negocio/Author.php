<?php

/**
 * Represents the class of the Editorial - DTO entity
 */

class Author
{

    //----------------------------
    //Attributes
    //----------------------------

    /**
     * Author code
     * 
     * @var int
     */
    private $cod_autor;

    /**
     * author name
     *
     * @return String
     */
    private $nom_autor;

    /**
     * author email
     *
     * @return String
     */
    private $correo;

    /**
     * author address
     *
     * @return String
     */
    private $direccion;

    /**
     * author phone
     *
     * @return String
     */
    private $telefono;


    /**
     * Getter the author code
     *
     * @return  int
     */
    public function getCod_autor()
    {
        return $this->cod_autor;
    }

    /**
     * Setter the author code.
     *
     * @param  int  $autor code.
     *
     * @return  self
     */
    public function setCod_autor($cod_autor)
    {
        $this->cod_autor = $cod_autor;

        return $this;
    }

   

    /**
     * Getter author name
     *
     * @return  String
     */
    public function getNom_autor()
    {
        return $this->nom_autor;
    }

    /**
     * Setter author name
     *
     * @param  String  $autor name.
     *
     * @return  self
     */
    public function setNom_autor($nom_autor)
    {
        $this->nom_autor = $nom_autor;

        return $this;
    }

    /**
     * Getter author email.
     *
     * @return  String
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Setter author email.
     *
     * @param  String  $author email.
     *
     * @return  self
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Getter author address.
     *
     * @return  int
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Setter author address.
     *
     * @param  int  $author address.
     *
     * @return  self
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Getter author phone.
     *
     * @return  String
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Setter author phone.
     *
     * @param  String  $author phone.
     *
     * @return  self
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }
}
