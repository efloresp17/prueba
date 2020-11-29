<?php

/**
 * Represents the class of the DOCUMENT - DTO entity
 */

class Document{

    //----------------------------
    //Attributes
    //----------------------------

    /**
     * Book code
     * 
     * @var int
     */
    private $cod_documento;

    /**
     * Code of the user who uploaded the document
     * 
     * @var int
     */
    private $subido_por;

    /**
     * Document Type code
     * 
     * @var int
     */
    private $cod_t_documento;

    /**
     * Editorial code
     * 
     * @var int
     */
    private $cod_editorial;

    /**
     * State code
     * 
     * @var int
     */
    private $cod_estado;

    /**
     * Number of document
     * 
     * @var int
     */
    private $cantidad;

    /**
     * Date creation of document
     * 
     * @var date
     */
    private $fecha_creacion;

    /**
     * Number of views
     * 
     * @var int
     */
    private $num_vistas;

    /**
     * Document title
     * 
     * @var String
     */
    private $titulo;


    /**
     * Document pdf
     * 
     * @var String
     */
    private $pdf;

        /**
     * Reserve document status
     * 
     * @var int
     */
    private $cod_estado_documento;

    /**
     * Reserve document reservation status
     * 
     * @var int
     */
    private $cod_estado_reserva;

    
    /**
     * Number of views
     * 
     * @var int
     */
    private $cantidad_vistas;

    /**
     * Code of the user who made the last CRUD to the document
     * 
     * @var int
     */
    private $cod_usuario_accion;


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
     * Getter the Code of the user who uploaded the document.
     *
     * @return  int
     */ 
    public function getSubido_por()
    {
        return $this->subido_por;
    }

    /**
     * Setter the Code of the user who uploaded the document.
     *
     * @param  int  $Code of the user who uploaded the document.
     *
     * @return  self
     */ 
    public function setSubido_por($subido_por)
    {
        $this->subido_por = $subido_por;

        return $this;
    }
 
     
    /**
     * Getter the Document Type code.
     *
     * @return  int
     */ 
    public function getCod_t_documento()
    {
        return $this->cod_t_documento;
    }

    /**
     * Setter the Document Type code.
     *
     * @param  int  $Document Type code.
     *
     * @return  self
     */ 
    public function setCod_t_documento($cod_t_documento)
    {
        $this->cod_t_documento = $cod_t_documento;

        return $this;
    }


    /**
     * Getter the Editorial code.
     *
     * @return  int
     */ 
    public function getCod_editorial()
    {
        return $this->cod_editorial;
    }

    /**
     * Setter the Editorial code.
     *
     * @param  int  $Editorial code.
     *
     * @return  self
     */ 
    public function setCod_editorial($cod_editorial)
    {
        $this->cod_editorial = $cod_editorial;

        return $this;
    }


    /**
     * Getter the State code.
     *
     * @return  int
     */ 
    public function getCod_estado()
    {
        return $this->cod_estado;
    }

    /**
     * Setter the State code.
     *
     * @param  int  $State code.
     *
     * @return  self
     */ 
    public function setCod_estado($cod_estado)
    {
        $this->cod_estado = $cod_estado;

        return $this;
    }


    /**
     * Getter the Number of document.
     *
     * @return  int
     */ 
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Setter the Number of document.
     *
     * @param  int  $Number of document.
     *
     * @return  self
     */ 
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }


    /**
     * Getter the Date creation of document.
     *
     * @return  int
     */ 
    public function getFecha_creacion()
    {
        return $this->fecha_creacion;
    }

    /**
     * Setter the Date creation of document.
     *
     * @param  int  $Date creation of document.
     *
     * @return  self
     */ 
    public function setFecha_creacion($fecha_creacion)
    {
        $this->fecha_creacion = $fecha_creacion;

        return $this;
    }


    /**
     * Getter the Number of views.
     *
     * @return  int
     */ 
    public function getNum_vistas()
    {
        return $this->num_vistas;
    }

    /**
     * Setter the Number of views.
     *
     * @param  int  $Number of views
     * @return  self
     */ 
    public function setNum_vistas($num_vistas)
    {
        $this->num_vistas = $num_vistas;

        return $this;
    }     

    /**
     * Get document title
     *
     * @return  String
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set document title
     *
     * @param  String  $titulo  Document title
     *
     * @return  self
     */ 
    public function setTitulo( $titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }


    /**
     * Get document pdf
     *
     * @return  String
     */ 
    public function getPdf()
    {
        return $this->pdf;
    }

    /**
     * Set document pdf
     *
     * @param  String  $pdf  Document pdf
     *
     * @return  self
     */ 
    public function setPdf($pdf)
    {
        $this->pdf = $pdf;

        return $this;
    }

    /**
     * Get reserve document status
     *
     * @return  int
     */ 
    public function getCod_estado_documento()
    {
        return $this->cod_estado_documento;
    }

    /**
     * Set reserve document status
     *
     * @param  int  $cod_estado_documento  Reserve document status
     *
     * @return  self
     */ 
    public function setCod_estado_documento(int $cod_estado_documento)
    {
        $this->cod_estado_documento = $cod_estado_documento;

        return $this;
    }

    /**
     * Get reserve document status
     *
     * @return  int
     */ 
    public function getCod_estado_reserva()
    {
        return $this->cod_estado_reserva;
    }

    /**
     * Set reserve document status
     *
     * @param  int  $cod_estado_reserva  Reserve document status
     *
     * @return  self
     */ 
    public function setCod_estado_reserva(int $cod_estado_reserva)
    {
        $this->cod_estado_reserva = $cod_estado_reserva;

        return $this;
    }

    

     /**
     * Get number of view
     *
     * @return  int
     */ 
    public function getCantidad_vistas()
    {
        return $this->cantidad_vistas;
    }

    /**
     * Set number of view
     *
     * @param  int  $cantidad_vistas
     *
     * @return  self
     */ 
    public function setCantidad_vistas(int $cantidad_vistas)
    {
        $this->cantidad_vistas = $cantidad_vistas;

        return $this;
    }

         /**
     * Get number of view
     *
     * @return  int
     */ 
    public function getCod_usuario_accion()
    {
        return $this->cod_usuario_accion;
    }

    /**
     * Set number of view
     *
     * @param  int  $cantidad_vistas
     *
     * @return  self
     */ 
    public function setCod_usuario_accion(int $cod_usuario_accion)
    {
        $this->cod_usuario_accion = $cod_usuario_accion;

        return $this;
    }


}
