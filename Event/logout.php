<?php 
session_start();
$_SESSION["mail"]="";
$_SESSION["pass"]="";
session_destroy();
header("location:login.php");
?>