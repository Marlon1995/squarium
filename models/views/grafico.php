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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<title>Reporte</title>

		<script type="text/javascript" src="../resources/jquery.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        title: {
            text: 'Reporte SQUARIUM Con squarium',

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
        series: [{
            name: 'Temperatura',
            data: [
            <?php
                $query = " select temperatura from sensor order by id desc limit 10 ";
                $resultados = mysqli_query($connection, $query);
                while($rows = mysqli_fetch_array($resultados)){
                    ?>
                        <?php echo $rows["temperatura"]?>,
                    <?php
                }
            ?>
            ]
        }, {
            name: 'NIVEL PH',
            data: [
            <?php
                $query = " select ph from sensor order by id desc limit 10 ";
                $resultados = mysqli_query($connection, $query);
                while($rows = mysqli_fetch_array($resultados)){
                    ?>
                        <?php echo $rows["ph"]?>,
                    <?php
                }
            ?>
            ]
        },{
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
        },{
            name: 'ILUMINACIÓN',
            data: [
            <?php
                $query = " select lumi from sensor order by id desc limit 10 ";
                $resultados = mysqli_query($connection, $query);
                while($rows = mysqli_fetch_array($resultados)){
                    ?>
                        <?php echo $rows["lumi"]?>,
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

