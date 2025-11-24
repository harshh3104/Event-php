<?php 
session_start();
$_SESSION["mail"]="";
$_SESSION["pass"]="";
// $_SESSION['logout_message'] = "You have logged out successfully!";
session_destroy();
session_start();
$_SESSION['logout_message'] = "You have logged out successfully!";
header("location:index.php");
?>