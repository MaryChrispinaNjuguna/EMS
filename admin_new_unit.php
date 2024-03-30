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

  <h1 style="margin-top:25px; margin-bottom:10px; text-align:center">Add Unit </h1>

    <div class="container_register" style="margin-top:5px;">
      <form action="" method="post" enctype="multipart/form-data" >
               
         <label for="school">School:</label>
        <select id="school" name="school" onchange="populateSecondSelect(this.value);" required>
          <option value="">Select a School</option>
          <option value="School of Pure and Applied Sciences">School of Pure and Applied Sciences</option>
          <option value="School of Engineering">School of Engineering</option>
          <option value="School of Architecture"> School of Architecture</option>
        </select><br>
        <label for="dept">Department:</label>
        <select id="dept" name="dept"  onchange="populateThirdSelect(this.value);" required>
          <option value="">Select a Department</option>
          </select>
          <br>
        <label for="course">Course:</label>
        <select id="course" name="course" required>
          <option value="">Select a course</option>
        </select>
        <br>
        <label for="unitcode">Unit Code</label>
        <input type="text" id="unitcode" name="unitcode" required />
        <br>
        <label for="unit_tile">Unit Title</label>
        <input type="text" id="unit_title" name="unit_title" required /><br>
        <label for="offered">Offered</label>
        <select id="offered" name="offered" required>
          <option value="">Select a Semester</option>
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
        <button type="submit" style="width:100%" >SUBMIT</button>
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
    $sql = "INSERT INTO units 
    VALUES ('$unitcode', '$unit_title', '$school','$dept', '$course', '$offered')";

    if ($conn->query($sql) === TRUE) {?>
      <script type="text/javascript">
      alert("unit created successfully");
      window.location="all_units.php";
     
     </script>
     <?php
    } else {
      ?>
      <script type="text/javascript">
 alert("<?php echo "Error: " . $sql . "<br>" . $conn->error;?>");
 window.location="all_units.php";

</script>
<?php
    }

    $conn->close();
}
?>