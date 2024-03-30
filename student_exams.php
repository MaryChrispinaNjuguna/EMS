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
<!DOCTYPE html>
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
 button {
            padding: 5px 10px;
            font-size: 16px;
            background-color: #174e80; 
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            float: right; 
            margin: 0;
            

  }
 .card
{width: 210px;}

.table_container{
  overflow: auto;
  max-height: 400px;
  margin-top: 20px;
}
</style>
<link rel="stylesheet" href="style_student.css">
   <!-- links css stylesheet-->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
     rel="stylesheet">
     <!-- links icon stylesheet-->
     <title>Exam</title>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $("#ajaxdata").load("student_exams_all.php");
    $("#unit").change(function(){
      var selected=$(this).val();
      $("#ajaxdata").load("student_exams_filtered.php?unitcode="+ selected);
    });
    $("#refresh").click(function(){
      $("#ajaxdata").load("student_exams_all.php");
    });
  });
</script>
</head>
<body>
<?php require ('header_student.php')?>



 <div style="padding:1px 16px; padding-top:15px; " >
 <form class="form">
          <label for = 'exam' > <h2> EXAMS </h2> </label>
             <select id="unit" name="unit" required>
             <option value="" disabled selected>Select Unit</option>
            <?php
            include "connect.php";
            $sql = "SELECT * FROM units 
            LEFT JOIN students ON units.course = students.course AND units.offered = students.semester
            WHERE students.reg_no='$_SESSION[reg_no]'";
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
        <input type="submit"value = "Refresh"name="refresh" id="refresh">
         </form>
         <div  id="ajaxdata">
        
         </div>
       
        
</div>


   



</body>
</html>