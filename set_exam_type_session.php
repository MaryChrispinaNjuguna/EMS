<?php
session_start();
include "connect.php";
$unitcode=$_GET["unitcode"];
$_SESSION["unitcode"]=$unitcode;

$res=mysqli_query($conn,"select * from exams where unitcode='$unitcode'");
while($row=mysqli_fetch_array($res))
{
    $_SESSION["time_limit"]=$row["time_limit"];
}
$date = date("Y-m-d H:i:s");
$_SESSION["end_time"]=date("Y-m-d H:i:s", strtotime($date . "+$_SESSION[time_limit] minutes"));
$_SESSION["exam_start"]="yes";
?>