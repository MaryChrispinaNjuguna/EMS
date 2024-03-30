<?php
session_start();
if (!isset($_SESSION["username"]))
{
?>
<script type="text/javascript">
  window.location="admin_login.php";
  </script>
  <?php
}
  include "connect.php";
  $query1=mysqli_query($conn,"select * from exams ");
$exams = mysqli_num_rows($query1);
  $query2=mysqli_query($conn,"select * from students ");
$students = mysqli_num_rows($query2);
  $query3=mysqli_query($conn,"select * from lecturers ");
$lecturers = mysqli_num_rows($query3);
  $query4=mysqli_query($conn,"select * from units ");
$units = mysqli_num_rows($query4);

?>
<!DOCTYPE html>
<html>
<head>

<title>Exam</title>

   <link rel="stylesheet" href="style_admin.css">
   <!-- links css stylesheet-->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
     rel="stylesheet">
     <!-- links icon stylesheet-->
     <script src="script1.js"></script>

<style>
.card
{width: 225px;
height: 180px;
border-radius: 15px;
background-color:#f9f9f9;
}
.row {margin: auto;
  width: 100%;
  margin-top: 50px;
  margin-right:0 ;
  height: 200px;


  
  }
  .box-info {
	display: grid;
	grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
	grid-gap: 24px;
	margin-top: 36px;
  margin-left: 20px;
  margin-right: 30px;
}
.box-info li {
	padding: 24px;
	background: var(--light);
	border-radius: 20px;
	display: flex;
	align-items: center;
	grid-gap: 20px;
}
 .box-info li .bx {
	width: 80px;
	height: 80px;
	border-radius: 10px;
	font-size: 36px;
	display: flex;
	justify-content: center;
	align-items: center;
}
.box-info li:nth-child(1) .bx {
	background: var(--light-blue);
	color: var(--blue);
}
 .box-info li:nth-child(2) .bx {
	background: var(--light-blue);
	color: var(--blue);
}
.box-info li:nth-child(3) .bx {
	background: var(--light-yellow);
	color: var(--yellow);
}
.box-info li:nth-child(4) .bx {
	background: var(--light-orange);
	color: var(--orange);
}
.box-info li .text h3 {
	font-size: 24px;
	font-weight: 600;
	color: var(--dark);
}
.box-info li .text p {
	color: var(--dark);	
}
</style>
</head>
<body>


<?php
require('admin_header.php');
?>
 <div >

 <ul class="box-info">
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3><?php echo $students?></h3>
						<p>No of Students</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3><?php echo "$lecturers"?></h3>
						<p>No of Lecturers</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-book' ></i>
					<span class="text">
						<h3><?php echo "$units"?></h3>
						<p>No of Units</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3><?php echo "$exams"?></h3>
						<p>Exams Scheduled</p>
					</span>
				</li>
			</ul>
 <div class="row">
      
       <a href="all_students.php">
         <div class="column">
           <div class="card">
           <i class="material-icons" style= "font-size:80px; color:#3c91e6">people</i>
           <div class="container_firstpage">
           <h2><b>Student Details</b></h2> 
           
       
           </div>
         </div>
         </div>
       </a>
       
         
       <a href="all_lecturers.php">
         <div class="column">
           <div class="card">
           <i class="material-icons" style= "font-size:80px; color:#3c91e6">people</i>
           <div class="container_firstpage">
           <h2><b>Lecturer Details</b></h2> 
           
       
           </div>
         </div>
         </div>
       </a>
       
         

      <a href="all_units.php">
         <div class="column">
           <div class="card">
           <i class="material-icons" style= "font-size:80px; color:#3c91e6">library_books</i>
           <div class="container_firstpage">
           <h2><b>Units Details</b></h2> 
           
           </div>
         </div>
         </div>
       </a>
      
       
         
       <a href="all_results.php">
         <div class="column">
           <div class="card">
           <i class="material-icons" style= "font-size:80px; color:#3c91e6">edit_calendar</i>
           <div class="container_firstpage">
           <h2><b>Student Results</b></h2> 
           
       
           </div>
         </div>
         </div>
       </a>
       
         
   </div>
 </div>
