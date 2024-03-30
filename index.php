<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examination Management System</title>
    <link rel="stylesheet" href="styles.css">
    <!-- links css stylesheet-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <!-- links icon stylesheet-->
<style>
  


    a {
        text-decoration: none;
        color:black;
    }
    body
{
  padding: 0;
  margin: 0;
}
.card
{width: 300px;
height: 180px;
border-radius: 15px;
background-color:#f9f9f9;
}
.row {margin: auto;
  margin-right:0 ;
  width: 70%;
margin-top: 100px;
height: 200px;


  
}
.row:after {
  content: "";
  display: table;
  clear: both;
}
.column {
  float: left;
  padding: 0 15px;
  
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color:#f9f9f9;
}
</style>
</head>
<body>
<?php require "header.php";?>
 
<h1 class="h1_first_page" style="margin-top:30px"> <b>Kenyatta University Examination Proctoring System</b></h1>

<div class="row">
<a href="student_login.php">
  <div class="column">
    <div class="card">
    <i class="material-icons" style= "font-size:80px; color:#3c91e6">school</i>
    <div class="container_firstpage">
    <h2><b>Student HomePage</b></h2> 
    <p>Current Student Login here</p> 

    </div>
  </div>
</a>
  </div>
  <a href="lec_login.php">
  <div class="column">
    <div class="card">
    <i class="material-icons" style= "font-size:80px; color:#3c91e6">edit_calendar</i>
    <div class="container_firstpage">
    <h2><b>Faculty HomePage</b></h2> 
    <p>Faculty Login here</p> 
    </div>
  </div>
 </div>
  </a>
</div>
</body>
</html>