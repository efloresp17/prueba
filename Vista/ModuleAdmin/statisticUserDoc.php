<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoUser.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoUser::setConexionBD($conexion);

$usersMoreDocuments = ManejoUser::getUsersMoreDocuments();
$usersLessDocuments = ManejoUser::getUsersLessDocuments();



$dataPoints = array();


for ($i = 0; $i < count($usersMoreDocuments); $i++) {

    array_push($dataPoints, array("y" => $usersMoreDocuments[$i]->getCantidad_documentos(), "label" => $usersMoreDocuments[$i]->getNombre() ));
}


$dataPoints2 = array();

for ($i = 0; $i < count($usersLessDocuments); $i++) {

    array_push($dataPoints2, array("y" => $usersLessDocuments[$i]->getCantidad_documentos(), "label" => $usersLessDocuments[$i]->getNombre() ));
}


?>


<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
        text: "Users that owns more documents",
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
		text: "Users that owns less documents",
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
    <!-- SITE VISIT CHART start -->
    <div class="col-md-12 col-lg-6">
        <div class="card">
            <div class="card-header">               
                <div class="card-header-right"> <i class="icofont icofont-spinner-alt-5"></i> </div>
            </div>
            <div class="card-block">
                <div style="height:517px;" id="chartContainer"></div>
            </div>
        </div>
    </div>
    <!-- SITE VISIT CHART Ends -->
    <!-- Bar Chart start -->
    <div class="col-md-12 col-lg-6">
        <div class="card">
            <div class="card-header">                               
                <div class="card-header-right"> <i class="icofont icofont-spinner-alt-5"></i> </div>
            </div>
            <div class="card-block">
                <div style="height:517px;" id="chartContainer2"></div>
            </div>
        </div>
    </div>
</div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>