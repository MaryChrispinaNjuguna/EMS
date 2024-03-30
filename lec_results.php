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
   <link rel="stylesheet" href="styles_lec_home.css">
   <!-- links css stylesheet-->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
     rel="stylesheet">
     <!-- links icon stylesheet-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

     <script type="text/javascript">
  $(document).ready(function(){
    // Load the initial data
    $("#ajaxdata").load("lec_results_all.php");

    // When the first dropdown changes
    $("#unit").change(function(){
      var unit = encodeURIComponent($(this).val()); // Encode the selected value from the first dropdown
      var grade = encodeURIComponent($("#grade").val()); // Encode the selected value from the second dropdown

      // Load data based on both selected values
      $("#ajaxdata").load("lec_results_filtered.php?unit=" + unit + "&grade=" + grade);
    });

    // When the second dropdown changes
    $("#grade").change(function(){
      var grade = encodeURIComponent($(this).val()); // Encode the selected value from the second dropdown
      var unit = encodeURIComponent($("#unit").val()); // Encode the selected value from the first dropdown

      // Load data based on both selected values
      $("#ajaxdata").load("lec_results_filtered.php?unit=" + unit + "&grade=" + grade);
    });

    // Refresh button functionality
    $("#refresh").click(function(){
      $("#ajaxdata").load("lec_results_all.php");
    });
    $("#download").click(function(){
      var unit = encodeURIComponent($("#unit").val()); // Encode the selected value from the first dropdown
      var grade = encodeURIComponent($("#grade").val()); // Encode the selected value from the second dropdown
      var url = "lec_results_pdf.php?unit=" + unit + "&grade=" + grade ;
    
    // Open the URL in a new window
    window.open(url, '_blank');    });
  });
</script>

<style>
  .table th {
  background-color: #f2f2f2;
  position: sticky;
  top: 0;
}
 button[type="button"] {
    width: 20%;
    padding: 10px;
    background-color: #174e80;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    float:right;
    margin-bottom: 5px;
  }
  select{
    width: 50%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-bottom: 10px;
    margin-right: 20px;
    
  }
  input[type="submit"]
  {
    width: auto;
      padding: 10px;
      background-color: #174e80;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-left: 20px ;
      width: 150px;
  }
</style>
<title>Exam</title>

</head>
<body>


<?php require ('header_lec.php')?>


 <div style="padding:1px 16px;">
   
  <form class="">
    <label for = 'results' > <h2> RESULTS </h2> </label>
       
  <select id="unit" name="unit" >
             <option value="" disabled selected>Select Unit</option>
            <?php
            include "connect.php";
            $sql = "SELECT DISTINCT units.* 
            FROM units
            INNER JOIN results ON units.unitcode = results.unitcodeF
            INNER JOIN exams ON units.unitcode = exams.unitcode
            LEFT JOIN lecturers ON units.dept = lecturers.dept
            WHERE lecturers.lec_email = '$_SESSION[lec_email]'
            AND exams.lec_emailF = '$_SESSION[lec_email]'";
    

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

      
        ?>   
  </select>
           
   
  <input type="submit"value = "Refresh"name="refresh" id="refresh">
  <input style="float:right; margin-right:17px;" type="submit"value = "Download"name="download" id="download"><br><br>

         </form>
   <div  id="ajaxdata">
        
        </div> 
 
  
</div>


         


</body>
</html>