<!DOCTYPE html>
<html lang="en">
<head>
  <title>SQUARIUM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
		$link = new PDO('mysql:host=localhost;dbname=squarium', 'root', ''); // el campo vaciío es para la password. 
	?>
  
	<div class="container">

		<h1 style="text-align: center; font-family:'courier';"><strong> SQUARIUM SCADA-squarium  </strong></h1>
	  	<form action="logout.php" name="miconfirmar" id="miconfirmar" method="POST" style="text-align:right">
      <right> <button class="btn btn-danger " type="submit">Cerrar Sesión</button></right>
</form>
<br>
  	<div class="panel-group">
  	<div class="panel panel-info">
      <div class="panel-heading" >
      	<center><img src="banner.jpg" border="1" alt="Este es el ejemplo de un texto alternativo" width="1100" height="225"></center>
      	<!--<center><img src="pez.png" border="1" alt="Este es el ejemplo de un texto alternativo" width="75" height="50"></center>-->
      </div><br>
        	      <div style="text-align: right;">
		  	<center><button onclick="location.href='/squarium/models/views/index.php' " class="btn btn-info"><strong>REPORTE GENERAL</strong></button></center>				
		</div><br>
<div class="row">
  <div class="col-md-6">
  	<div class="panel panel-default">
      <div class="panel-heading" style="text-align: center;"><strong>TEMPERATURA</strong></div>
      <div class="panel-body"> <center> <img src="temp.png" width="75px" height="75px"> </center> <br>	
      		<?php foreach ($link->query('SELECT * FROM sensor order by id desc limit 1  ') as $row){ // aca puedes hacer la consulta e iterarla con each. ?> 
				
			
		<div >
			<center>
      	<?php echo '<span style="color:blue; font-size:50px;">'.$row["temperatura"].'</span>';?>
        </center>
        <center><button onclick="location.href='/squarium/models/views/index2.php' " class="btn btn-info"><strong>REPORTE TEMPERATURA</strong></button></center>    
     </div>
     

      </div>
    </div>
  </div>
  <div class="col-md-6">
  	<div class="panel panel-primary">
      <div class="panel-heading" style="text-align: center;"><strong>PH</strong> </div>
      <div class="panel-body"><center> <img src="ph1.png" width="75px" height="75px"></center><br>
      	<div >
			<center>
      	<?php echo '<span style="color:red; font-size:50px;">'.$row["ph"].'</span>';?>
        </center>
         <center><button onclick="location.href='/squarium/models/views/index3.php' " class="btn btn-danger"><strong>REPORTE PH</strong></button></center>  
     </div> 
      </div>
    </div>
  </div>
</div>
<br><br>
<div class="row">
  <div class="col-md-6">
  	<div class="panel panel-warning">
      <div class="panel-heading" style="text-align: center;"><strong>ODA</strong> </div>
      <div class="panel-body"><center> <img src="oda.png" width="75px" height="75px"></center><br>
      <div >
			<center>
      	<?php echo '<span style="color:black; font-size:50px;">'.$row["ox"].'</span>';?>
        </center>
        <center><button onclick="location.href='/squarium/models/views/index4.php' " class="btn btn-success"><strong>REPORTE OXIGENO</strong></button></center> 
     </div> 
      </div>
    </div>
  </div>
  <div class="col-md-6">
  	<div class="panel panel-danger">
      <div class="panel-heading" style="text-align: center;"><strong>LUMINOSIDAD</strong> </div>
      <div class="panel-body"><center> <img src="lumi.png" width="75px" height="75px"></center><br>
      	<div>
			<center>
      	<?php echo '<span style="color:green; font-size:50px;">'.$row["lumi"].'</span>';?>
        </center>
        <center><button onclick="location.href='/squarium/models/views/index5.php' " class="btn btn-primary"><strong>REPORTE ILUMINACION</strong></button></center> 
     </div> 
      	 <?php
			} 
			
		?>
      </div>
    </div>
  </div>
</div><br>

      	
</div>
</div>
</div>
</div>
</div>  
<meta http-equiv="refresh" content="5" />
</body>
</html>