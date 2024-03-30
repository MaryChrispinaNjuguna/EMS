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

$lec_email=$_SESSION["lec_email"];
include ('connect.php');
$sql = "SELECT PF_No, lec_fname, lec_lname, lec_email, school, dept 
FROM lecturers WHERE lec_email = '$lec_email' "; // Assuming user with ID 1
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of the first (or only) row
    $row = $result->fetch_assoc();
    $PF_No = $row["PF_No"];
    $lec_fname = $row["lec_fname"];
    $lec_lname = $row["lec_lname"];
    $lec_email = $row["lec_email"];
    $school = $row["school"];
    $dept = $row["dept"];

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
 

 
    
 
 label{
  display: inline;
 }
 

</style>
<title>Exam</title>

<link rel="stylesheet" href="style_student.css">
   <!-- links css stylesheet-->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
     rel="stylesheet">
     <!-- links icon stylesheet-->
</head>
<body>

<?php require ('header_lec.php')?>

 <div style="padding:1px 16px;">
 <div class="container_register">
      <h2>Lecuturer Profile</h2>
      <form class="profile" action="" method="post" enctype="multipart/form-data">
      <label for="number"><b>P.F. No/ID No: </b></label>
      <label for="number"><?php echo $PF_No; ?></label>
      <br>
      <br>

        <label for="lec_name"><b> Name: </b></label>
        <label for="lec_name"><?php echo $lec_fname.' '. $lec_lname; ?></label>
        
        <br>
        <br>
              
        <label for="email"><b>Email: </b></label>
        <label for="email"><?php echo $lec_email; ?></label>
        
        <br>
        <br>
        <label for="school"><b>School: </b></label>
        <label for="school"><?php echo $school; ?></label>
        
        <br>
        <br>
        <label for="dept"><b>Department: </b></label>
        <label for="dept"><?php echo $dept; ?></label>
       
     

      </form>

 </div>
</div>



</body>
</html>