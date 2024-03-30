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
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Registration Page</title>
    <link rel="stylesheet" type="text/css" href="styleregister.css" />
    <script src="script.js">
      
    </script>
       <style>
      label{
    width:190px;
  }
      </style>
  </head>
  <body>  
    <?php require('admin_header.php');?>
  <?php
    include('connect.php');
    $unitcode=$_GET['unitcode'];
    $sql = "SELECT  * FROM units WHERE unitcode='$unitcode'";
    $result = $conn->query($sql);

   // Check if there are rows in the result set
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
      
      $unitcode=$row["unitcode"];
      $unit_title=$row["unit_title"];
      $school=$row["school"];
      $dept=$row["dept"];
      $course=$row["course"];
      $offered=$row["offered"];

    }}   
    ?>

    <div class="container_register" style="margin-top:25px;">
      <form action="" method="post" enctype="multipart/form-data" >

      <h2 style="text-align:center">Edit Unit </h2>
     
         <label for="school">School:</label>
        <select id="school" name="school" onchange="populateSecondSelect(this.value);" required>
          <option value="<?php echo $school?>"><?php echo $school?></option>
          <option value="School of Pure and Applied Sciences">School of Pure and Applied Sciences</option>
          <option value="School of Engineering">School of Engineering</option>
          <option value="School of Architecture"> School of Architecture</option>
        </select><br>
        <label for="dept">Department:</label>
        <select id="dept" name="dept"  onchange="populateThirdSelect(this.value);" required>
          <option value="<?php echo $dept?>"><?php echo $dept?></option>
          <label for="course">Course:</label>
        </select><br>
        <label for="course">Course:</label>
        <select id="course" name="course" required>
          <option value="<?php echo $dept?>"><?php echo $course?></option>
        </select><br>
        <label for="unitcode">Unit Code</label>
        <input type="text" id="unitcode" name="unitcode" value="<?php echo $unitcode?>" required />
        <br>
        <label for="unit_tile">Unit Title</label>
        <input type="text" id="unit_title" name="unit_title" value="<?php echo $unit_title?>" required /><br>
        <label for="offered">Offered</label>
        <select id="offered" name="offered" required>
          <option value="<?php echo $offered?>"><?php echo $offered?></option>
          <option value="1.1">Year1 Semester1</option>
          <option value="1.2">Year1 Semester2</option>
          <option value="2.1">Year2 Semester1</option>
          <option value="2.2">Year2 Semester2</option>
          <option value="3.1">Year3 Semester1</option>
          <option value="3.2">Year3 Semester2</option>
          <option value="4.1">Year4 Semester1</option>
          <option value="4.2">Year4 Semester2</option>

        </select>
        <br><br><br>
        <button type="submit" style="width:100%">UPDATE</button>
      </form>
    </div>
  </body>
</html>
<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
   
    $school = $_POST["school"];
    $dept = $_POST["dept"];
    $course = $_POST["course"];
    $unitcode = $_POST["unitcode"];
    $unit_title = $_POST["unit_title"];
    $offered = $_POST["offered"];


    
    

    // Insert data into the database
    mysqli_query($conn, " UPDATE  units SET unitcode='$unitcode', unit_title='$unit_title', school='$school', dept='$dept', 
    course='$course', offered='$offered' WHERE unitcode='$_GET[unitcode]'");

?>
<script type="text/javascript">
 alert("unit details updated successfully");
 window.location="all_units.php";

</script>
<?php

 $conn->close();
}
?>