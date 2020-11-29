<?php 
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoDocument.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoDocument::setConexionBD($conexion);

$documentStatus = ManejoDocument::documentStatus();

$dataPoints = array(
    array("label" => "Available", "symbol" => "Available", "y" => $documentStatus[0]),
    array("label" => "Unavailable", "symbol" => "Unavailable", "y" => $documentStatus[1] ),   
    array("label" => "Waiting", "symbol" => "Waiting", "y" => $documentStatus[2] ), 
    array("label" => "Rejected", "symbol" => "Rejected", "y" => $documentStatus[3] ),
    )
  
  ?>

<script>
window.onload = function() {
 
 var chart = new CanvasJS.Chart("chartContainer", {
     animationEnabled: true,
     theme: "light2",
     title:{
         text: "Documents quantity by status"
     },
     axisY: {
         title: "Number of documents"
     },
     data: [{
         type: "column",
         yValueFormatString: "#,##0.## documents",
         dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
     }]
 });
 chart.render();
  
 }
</script>

<div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">                               
                <div class="card-header-right"> <i class="icofont icofont-spinner-alt-5"></i> </div>
            </div>
            <div class="card-block">
                <div style="height:517px;" id="chartContainer"></div>
            </div>
        </div>
    </div>


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>