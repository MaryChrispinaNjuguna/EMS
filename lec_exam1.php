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
?>
<!DOCTYPE html>
<html>
<head>
<title>Exam</title>

   <link rel="stylesheet" href="styles_lec_home.css">
   <!-- links css stylesheet-->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
     <!-- links icon stylesheet-->
<style>
option {
    background-color: #fff;
    color: #333;
    font-size: 14px;
    
}
</style>
</head>
<body>


<?php require ('header_lec.php')?>

 <div style="padding:1px 16px;">
    
    <h2 style="text-align: center; margin-top:90px;"> ENTER EXAM DETAILS</h2>
    <div class="container_register" >
    <form action="" method="POST" enctype="multipart/form-data" >
        <label for="selectUnit">Select Unit:</label>
        <select id="unitcode" name="unitcode">
            <option value="" disabled selected>Select Unit</option>
            <?php
            include "connect.php";
            $sql = "SELECT * FROM units
            LEFT JOIN lecturers ON units.dept=lecturers.dept WHERE lecturers.lec_email='$_SESSION[lec_email]'
                   AND units.unitcode NOT IN (SELECT unitcode FROM exams)";
        $result = $conn->query($sql);

        // Check if any rows were returned
        if ($result->num_rows > 0) {
            // Loop through each row and generate an <option> element
            while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['unitcode'] . "'>" . $row['unitcode'] ." ". $row['unit_title'] ."</option>";
            }
        } else {
            echo "<option value=''>No options available</option>";
        }

        // Close database connection
        $conn->close();
        ?>
            
            
        </select>

        

        <label for="time_limit">Time Limit (in minutes):</label>
        <input type="number" id="time_limit" name="time_limit" min="1" required>

        <button type="submit" >NEXT</button>
    </form>

    </div>
         
</div>


</body>
</html>
<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $unitcode = $_POST["unitcode"];
    
    $time_limit = $_POST["time_limit"];
    
    
    
    

    // Insert data into the database
    $sql = "INSERT INTO exams ( unitcode,   time_limit, lec_emailF) 
    VALUES ('$unitcode',   '$time_limit', '$_SESSION[lec_email]')";

if ($conn->query($sql) === TRUE) {
    $_SESSION["unitcode1"] = $_POST["unitcode"];

    echo "<script>alert('Exam created successfully'); window.location.href=('exam_questions.php?unitcode3=' + '" . $_SESSION['unitcode1'] . "');</script>";
    exit;
} else {
    echo "<script>alert('Error: " . $sql . "\\n" . $conn->error . "');</script>";
}

  
   
    
    $conn->close();
}
?>