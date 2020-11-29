<?php

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/negocio/Document.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/negocio/ManejoRecord.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/negocio/ManejoUser.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/negocio/ManejoDocument.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Persistencia/Util/Conexion.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoRecord::setConexionBD($conexion);
ManejoDocument::setConexionBD($conexion);
ManejoUser::setConexionBD($conexion);

$records = ManejoRecord::getListByDocument($_GET["codeDoc"]);


?>

<!-- Basic table card start -->
<div class="card">
    <div class="card-header" style="background-color: #05cfb3;">
        <h3><?php echo ManejoDocument::consult($_GET["codeDoc"])->getTitulo(); ?> Record</h3>
        <!--<span>use class <code>table</code> inside table element</span>-->
        
    </div>
    <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table" width="100%">
                <thead>
                    <tr>
                        <th style="width: 5%;">Document</th>
                        <th style="width: 15%;">Action made by</th>
                        <th style="width: 10%;">Description</th>
                        <th style="width: 10%;">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($records); $i++) { ?>
                    <tr>
                        <td><?php echo ManejoDocument::consult($records[$i]->getCod_documento())->getTitulo(); ?></td>
                        <td><?php echo ManejoUseR::consultUser($records[$i]->getCod_usuario())->getNombre(); ?></td>
                        <td><?php echo $records[$i]->getDescripcion(); ?></td>
                        <td><?php echo $records[$i]->getFecha_publicacion(); ?></td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>