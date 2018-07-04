<?php
@session_start();
session_destroy();
header("Location: /squarium/index.php");
?>