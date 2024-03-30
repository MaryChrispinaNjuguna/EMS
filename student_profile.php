<?php
session_start();
if (!isset($_SESSION["reg_no"]))
{
?>
<script type="text/javascript">
  window.location="student_login.php";
  </script>
<?php
}
?>
<?php
$reg_no=$_SESSION["reg_no"];
include ('connect.php');
$sql = "SELECT reg_no, student_fname, student_lname, student_email, school, dept,course 
FROM students WHERE reg_no = '$reg_no' "; // Assuming user with ID 1
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of the first (or only) row
    $row = $result->fetch_assoc();
    $reg_no = $row["reg_no"];
    $student_fname = $row["student_fname"];
    $student_lname = $row["student_lname"];
    $student_email = $row["student_email"];
    $school = $row["school"];
    $dept = $row["dept"];
    $course = $row["course"];

} else {
    echo "No results found";
}

$conn->close();
?>

<html>
<head>
<style>
 
body
{
    padding: 0;
    margin: 0;
}
 

 @media screen and (max-width: 600px) {
    .navbar a {
      float: none;
      width: 100%;
    }
    
 }
 

</style>
<link rel="stylesheet" href="style_student.css">
   <!-- links css stylesheet-->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
     rel="stylesheet">
     <!-- links icon stylesheet-->
     <title>Exam</title>

</head>
<body>


<?php require ('header_student.php')?>

 <div style="padding:1px 16px;">
 <div class="container_register">
      <h2>Student Profile</h2>
      <form action="" method="post" enctype="multipart/form-data">
      <label for="registration_number"><b>Registration No: </b></label>
      <label for="registration_number"><?php echo $reg_no; ?></label>
      <br>
      <br>

        <label for="student_name"><b> Name: </b></label>
        <label for="student_name"><?php echo $student_fname.' '. $student_lname; ?></label>
        
        <br>
        <br>
              
        <label for="email"><b>Email: </b></label>
        <label for="email"><?php echo $student_email; ?></label>
        
        <br>
        <br>
        <label for="school"><b>School: </b></label>
        <label for="school"><?php echo $school; ?></label>
        
        <br>
        <br>
        <label for="dept"><b>Department: </b></label>
        <label for="dept"><?php echo $dept; ?></label>
       
        <br>
        <br>
        <label for="course"><b>Course: </b></label>
        <label for="course"><?php echo $course; ?></label>



        
        

      </form>

 </div>
</div>



</body>
</html>