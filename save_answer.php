<?php
session_start();

$questionno=$_GET["questionno"];
$value1="";
$value1=$_GET["value1"];
$_SESSION["correct_option"][$questionno]=$value1;
?>