<?php
session_start();
include "connect.php";
$q_code="";
$question ="";
$optionA = "";
$optionB = "";
$optionC = "";
$optionD = "";
$correct_option = "";

$count=0;
$ans="";

$queno=$_GET["questionno"];

if(isset($_SESSION["correct_option"][$queno]))
{
    $ans=$_SESSION["correct_option"][$queno];
}
$res =mysqli_query( $conn,"SELECT *
FROM questions WHERE unitcodeF='$_SESSION[unitcode]' && q_code=$_GET[questionno]"); 
$count=mysqli_num_rows($res);

if ($count==0)
{
echo"over";    }
else

{
  

require 'questions.php';
       
}
