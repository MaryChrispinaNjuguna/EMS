<?php
session_start();
include"connect.php";
$total_que =0;
$result=mysqli_query($conn, "SELECT * FROM questions WHERE unitcodeF = '$_SESSION[unitcode]'");
$total_que=mysqli_num_rows($result);
echo $total_que;

?>