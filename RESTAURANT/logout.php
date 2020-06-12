<?php 
require_once("session.php");
session_destroy();
header("location: mcveggies1.php");
?>