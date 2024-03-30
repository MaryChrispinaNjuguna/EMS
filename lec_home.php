<?php
session_start();
if (!isset($_SESSION["lec_email"]))
{
?>
<script type="text/javascript">
  window.location="lec_login.php";
  </script>
<?php
}

include ("connect.php");
$lec_email=$_SESSION["lec_email"];
$query=mysqli_query($conn,"select lec_lname from lecturers where lec_email = '$lec_email'");
while($data=mysqli_fetch_array($query)){
  $lec_lname = $data["lec_lname"];

}
$query1=mysqli_query($conn,"select * from exams where lec_emailF = '$lec_email'");
$exams = mysqli_num_rows($query1);

$query2 = mysqli_query($conn, "SELECT COUNT(DISTINCT results.unitcodeF) AS completed 
                               FROM results 
                               LEFT JOIN exams ON exams.unitcode = results.unitcodeF 
                               WHERE exams.lec_emailF = '$lec_email'");
$row = mysqli_fetch_assoc($query2);
$completed = $row['completed'];

?>
<!DOCTYPE html>
<html>
<head>

<title>Exam</title>

   <link rel="stylesheet" href="styles_lec_home.css">
   <!-- links css stylesheet-->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
     rel="stylesheet">
     <!-- links icon stylesheet-->
<style>
.card
{width: 305px;
height: 180px;
border-radius: 15px;
background-color:#f9f9f9;

}
.row {margin: auto;
  width: 100%;
  margin-top: 50px;
  margin-left: 60px;
  height: 200px;

  
  }
  .box-info {
	display: grid;
	grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
	grid-gap: 24px;
	margin-top: 36px;
  margin-left: 80px
}
.box-info li {
	padding: 24px;
	background: var(--light);
	border-radius: 20px;
	display: flex;
	align-items: center;
	grid-gap: 24px;
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
	background: #E0FFCB;
	color: #66ff00;
}
 .box-info li:nth-child(2) .bx {
	background: var(--light-orange);
	color: var(--orange);
}
.box-info li:nth-child(3) .bx {
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


<?php require ('header_lec.php')?>

 <div style="padding:1px 16px;">

   <h1>Welcome, <?php echo $lec_lname?> <span>&#x1F60A;</span></h1>

   <ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3><?php echo $completed?></h3>
						<p>Exams Completed</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3><?php echo $exams?></h3>
						<p>Exams Scheduled</p>
					</span>
				</li>
				<li style="background-color: #eeeeee;">
					<i  ></i>
					<span >
						<h3></h3>
						<p> </p>
					</span>
				</li>
			</ul>

   <div class="row">
      <a href="exam.php">
         <div class="column">
           <div class="card">
           <i class="material-icons" style= "font-size:80px; color:#3c91e6">quiz</i>
           <div class="container_firstpage">
           <h2><b>Exams Scheduled</b></h2> 
           
           </div>
         </div>
         </div>
       </a>
       <a href="lec_results.php">
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


</body>
</html>