<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoUser.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoDocument.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoAuthor.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoEditorial.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoUser::setConexionBD($conexion);
ManejoDocument::setConexionBD($conexion);
ManejoAuthor::setConexionBD($conexion);
ManejoEditorial::setConexionBD($conexion);


$quantityUsers = ManejoUser::getQuantityUsersByRole();
$quantityDocuments = ManejoDocument::getDocumentsByType();
$editorials = ManejoEditorial::getList();
$authors = ManejoAuthor::getList();
$documentStatus = ManejoDocument::documentStatus_r();


$dataPoints = array(
    array("label" => "Clientes", "symbol" => "Clientes", "y" => $quantityUsers[0]),
    array("label" => "Admins", "symbol" => "Admins", "y" => $quantityUsers[1] ),   
    array("label" => "Readers", "symbol" => "Readers", "y" => $quantityUsers[2] ), 
    array("label" => "Authors", "symbol" => "Authors", "y" => $quantityUsers[3] ), 
    array("label" => "Editorials", "symbol" => "Editorials", "y" => $quantityUsers[4] ), 
    )
  
  ?>

<script>
  window.onload = function() {


    var chart = new CanvasJS.Chart("chartContainer", {
      theme: "light2",
      animationEnabled: true,
      data: [{
        type: "doughnut",
        indexLabel: "{symbol} - {y}",
        legendText: "{label} : {y}",
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
      }]
    });
    chart.render();

  }
</script>

<div class="row">
    <!-- card1 start -->
    <div class="col-md-6 col-xl-3">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="icofont icofont-user card1-icon" style="background-color: #C0392B;"></i>
                <span class="f-w-600" style="color: #C0392B;">Users quantity</span>
                <h4><?php echo $quantityUsers[0] + $quantityUsers[3] + $quantityUsers[4] ?></h4>
            </div>
        </div>
    </div>
    <!-- card1 end -->
    <!-- card1 start -->
    <div class="col-md-6 col-xl-3">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="icofont icofont-file-document card1-icon" style="background-color: #C0392B;"></i>
                <span class="f-w-600" style="color: #C0392B;">Documents quantity</span>
                <h4> <?php echo $quantityDocuments[0] + $quantityDocuments[1] + $quantityDocuments[2] ?></h4>
            </div>
        </div>
    </div>
    <!-- card1 end -->
    <!-- card1 start -->
    <div class="col-md-6 col-xl-3">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="icofont icofont-pen-alt-4 card1-icon" style="background-color: #C0392B;"></i>
                <span class="f-w-600" style="color: #C0392B;">Authors quantity</span>
                <h4><?php echo count($authors) + $quantityUsers[3] ?></h4>
            </div>
        </div>
    </div>
    <!-- card1 end -->
    <!-- card1 start -->
    <div class="col-md-6 col-xl-3">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="icofont icofont-company card1-icon" style="background-color: #C0392B;"></i>
                <span class="f-w-600" style="color: #C0392B;">Editorials quantity</span>
                <h4><?php echo count($editorials) + $quantityUsers[4] ?></h4>
            </div>
        </div>
    </div>
    <!-- card1 end -->
    <!-- Statestics Start -->
    <div class="col-md-12 col-xl-8">
        <div class="card">
            <div class="card-header">
                <h5>User Statistics</h5>
                <div class="card-header-left ">
                </div>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="icofont icofont-simple-left "></i></li>
                        <li><i class="icofont icofont-maximize full-card"></i></li>
                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block">
                <div id="chartContainer" style="height:517px;"></div>
            </div>
        </div>
    </div>



    <div class="col-md-12 col-xl-4">
        <div class="card fb-card">
            <div class="card-header" style="background-color: #7E0D02;">
                <i class="icofont icofont-book-alt" style="background-color: #C0392B;" ></i>
                <div class="d-inline-block">
                    <h5>Books</h5>
                </div>
            </div>
            <div class="card-block text-center">
                <div class="row">
                    <div class="col-6 b-r-default">
                        <h2><?php echo $documentStatus[1]?></h2>
                        <p class="text-muted">Available</p>
                    </div>
                    <div class="col-6">
                        <h2><?php echo $documentStatus[0]?></h2>
                        <p class="text-muted">Reserved</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card dribble-card">
            <div class="card-header" style="background-color: #7E0D02;">
                <i class="icofont icofont-file-presentation" style="background-color: #C0392B;" ></i>
                <div class="d-inline-block">
                    <h5>Presentations</h5>                    
                </div>
            </div>
            <div class="card-block text-center">
                <div class="row">
                    <div class="col-6 b-r-default">
                        <h2><?php echo $documentStatus[5]?></h2>
                        <p class="text-muted">Available</p>
                    </div>
                    <div class="col-6">
                        <h2><?php echo $documentStatus[4]?></h2>
                        <p class="text-muted">Reserved</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card twitter-card">
            <div class="card-header" style="background-color: #7E0D02;">
                <i class="icofont icofont-file-text" style="background-color: #C0392B;"></i>
                <div class="d-inline-block">
                    <h5>Articles</h5>
                </div>
            </div>
            <div class="card-block text-center">
                <div class="row">
                    <div class="col-6 b-r-default">
                        <h2><?php echo $documentStatus[3]?></h2>
                        <p class="text-muted">Available</p>
                    </div>
                    <div class="col-6">
                        <h2><?php echo $documentStatus[2]?></h2>
                        <p class="text-muted">Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>