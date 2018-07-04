<?php
require_once("conexion.php");
?>
<!DOCTYPE HTML>
<html>
	<head>
<center><img src="grafico.png" alt="temp" width="100" height="100"></center>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <script type="text/javascript">
            setTimeout('document.location.reload()',10000)
        </script>
		<title>Reporte</title>

		<script type="text/javascript" src="../resources/jquery.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        title: {
            text: 'Reporte SQUARIUM Con Arduino',

                        x: -20 //center
        },
        subtitle: {
            text: '@Squarium',
            x: -20
        },
        xAxis: {
            categories: [
            <?php
                $sql = " select fecha from sensor order by id desc limit 10 ";
                $result = mysqli_query($connection, $sql);
                while($registros = mysqli_fetch_array($result)){
                    ?>
                        '<?php echo  $registros["fecha"]?>',
                    <?php
                }
            ?>
            ]
        },
        yAxis: {
            title: {
                text: ''
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ''
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [ {
            name: 'NIVEL OXIGENO',
            data: [
            <?php
                $query = " select ox from sensor order by id desc limit 10 ";
                $resultados = mysqli_query($connection, $query);
                while($rows = mysqli_fetch_array($resultados)){
                    ?>
                        <?php echo $rows["ox"]?>,
                    <?php
                }
            ?>
            ]
        }
        ]
    });
});
		</script>

	</head>

	<body>
<script src="../resources/highcharts.js"></script>
<script src="../resources/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto">
    

</div>


	</body>
    <button onclick="location.href='/squarium/models/web.php' " class="btn btn-danger"><strong>ATRAS</strong></button>
</html>
