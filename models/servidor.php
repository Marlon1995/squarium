<?php
    require("base.php");
    $valor = mysqli_real_escape_string($con, $_GET['t']);
    $valor2 = mysqli_real_escape_string($con, $_GET['ph']);
    $valor3 = mysqli_real_escape_string($con, $_GET['ox']);
    $valor4 = mysqli_real_escape_string($con, $_GET['lumi']);
    $query = "INSERT INTO sensor(temperatura,ph,ox,lumi) VALUES ('".$valor."','".$valor2."','".$valor3."','".$valor4."');";
    mysqli_query($con, $query);
    mysqli_close($con);
?>