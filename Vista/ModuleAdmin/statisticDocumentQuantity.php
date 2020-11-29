<?php 
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoDocument.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoDocument::setConexionBD($conexion);

$more = ManejoDocument::documentsMoreQuantity();
$less = ManejoDocument::documentsLessQuantity();


$dataPoints = array();

for ($i=0; $i < 5; $i++) { 
   
    array_push($dataPoints, array("y" => $more[$i]->getCantidad(), "label" => $more[$i]->getTitulo()));
}
$dataPoints2 = array();

for ($i=0; $i < 5; $i++) { 
   
    array_push($dataPoints2, array("y" => $less[$i]->getCantidad(), "label" => $less[$i]->getTitulo()));
}
  ?>

<script>
window.onload = function() {
 
 var chart = new CanvasJS.Chart("chartContainer", {
     animationEnabled: true,
     theme: "light2",
     title:{
         text: "Documents with more quantity",
         fontSize: 24
     },
     axisY: {
         title: "Number of documents",
         fontSize: 16
     },
     data: [{
         type: "column",
         yValueFormatString: "#,##0 documents",
         dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
     }]
 });
 chart.render();

 
 var chart2 = new CanvasJS.Chart("chartContainer2", {
     animationEnabled: true,
     theme: "light2",
     title:{
         text: "Documents with less quantity",
         fontSize: 24
     },
     axisY: {
         title: "Number of documents",
         fontSize: 16
     },
     data: [{
         type: "column",
         yValueFormatString: "#,##0 documents",
         dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
     }]
 });
 chart2.render();
  
 }
</script>
<div class="row">
<div class="col-md-12 col-lg-6">
        <div class="card">
            <div class="card-header">                               
                <div class="card-header-right"> <i class="icofont icofont-spinner-alt-5"></i> </div>
            </div>
            <div class="card-block">
                <div style="height:500px;" id="chartContainer"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-6">
        <div class="card">
            <div class="card-header">                               
                <div class="card-header-right"> <i class="icofont icofont-spinner-alt-5"></i> </div>
            </div>
            <div class="card-block">
                <div style="height:500px;" id="chartContainer2"></div>
            </div>
        </div>
    </div>
</div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>