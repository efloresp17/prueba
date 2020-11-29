<?php
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/persistencia/Util/Conexion.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoDocument_Type.php';

    $objeto= new Conexion();
    $conexion= $objeto->conectarDB();
    ManejoDocument_Type::setConexionBD($conexion);

    $t_documentos = ManejoDocument_Type::consult(3); 
    
    
        echo $t_documentos->getCod_t_documento();
        echo $t_documentos->getNom_t_documento();
    
?>
