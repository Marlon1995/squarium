<?php
$con = mysqli_connect("172.17.0.1","acuario","acuario","acuario");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
