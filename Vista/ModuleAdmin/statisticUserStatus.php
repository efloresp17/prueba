<?php 
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoUser.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoUser::setConexionBD($conexion);

$quantityUsers = ManejoUser::getQuantityUsersByStatus();

$dataPoints = array(
    array("label" => "Waiting", "symbol" => "Waiting", "y" => $quantityUsers[0]),
    array("label" => "Rejected", "symbol" => "Rejected", "y" => $quantityUsers[1] ),   
    array("label" => "Active", "symbol" => "Active", "y" => $quantityUsers[2] ), 
    array("label" => "Desactive", "symbol" => "Desactive", "y" => $quantityUsers[3] ),
    )
  
  ?>

<script>
    window.onload = function() {

        var chart = new CanvasJS.Chart("chartContainer", {
            theme: "light2",
            animationEnabled: true,
            title: {
                text: "Users quantity by status",
                fontSize: 20
            },
            
            data: [{
                type: "pie",
                indexLabelFontSize: 18,
                radius: 80,
                indexLabel: "{label} - {y}",
                yValueFormatString: "###0",
                click: explodePie,
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();

        function explodePie(e) {
            for (var i = 0; i < e.dataSeries.dataPoints.length; i++) {
                if (i !== e.dataPointIndex)
                    e.dataSeries.dataPoints[i].exploded = false;
            }
        }

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