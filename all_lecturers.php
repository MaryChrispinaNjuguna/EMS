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

<title>Exam</title>

   <link rel="stylesheet" href="style_admin.css">
   <!-- links css stylesheet-->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
     rel="stylesheet">
     <!-- links icon stylesheet-->
     <script src="script.js"> </script>
     <script src="script1.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

     <script type="text/javascript">
  $(document).ready(function(){
    // Load the initial data
    $("#ajaxdata").load("all_lecturers_all.php");

    // When the first dropdown changes
    $("#school").change(function(){
      var school = encodeURIComponent($(this).val()); // Encode the selected value from the first dropdown
      var dept = encodeURIComponent($("#dept").val()); // Encode the selected value from the second dropdown

      // Load data based on both selected values
      $("#ajaxdata").load("all_lecturers_filtered.php?school=" + school + "&dept=" + dept);
    });

    // When the second dropdown changes
    $("#dept").change(function(){
      var dept = encodeURIComponent($(this).val()); // Encode the selected value from the second dropdown
      var school = encodeURIComponent($("#school").val()); // Encode the selected value from the first dropdown

      // Load data based on both selected values
      $("#ajaxdata").load("all_lecturers_filtered.php?school=" + school + "&dept=" + dept);
    });

    // Refresh button functionality
    $("#refresh").click(function(){
      $("#ajaxdata").load("all_lecturers_all.php");
    });
    $("#download").click(function(){
      var school = encodeURIComponent($("#school").val()); // Encode the selected value from the first dropdown
      var dept = encodeURIComponent($("#dept").val()); // Encode the selected value from the second dropdown
      var url = "all_lecturers_pdf.php?school=" + school + "&dept=" + dept ;
    
    // Open the URL in a new window
    window.open(url, '_blank');    });
  });
</script>

<style>
.card
{width: 210px;}
.table_container{
  overflow: auto;
  max-height: 400px;
  margin-top: 20px;
}
select{
    width: 25%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-bottom: 10px;
    margin-right: 20px;
    
  }
  .btn-download {
	height: 36px;
	padding: 0 16px;
	border-radius: 20px;
	background: var(--blue);
	color: var(--light);
	display: flex;
	justify-content: center;
	align-items: center;
	grid-gap: 10px;
  width: 15%;
  margin-bottom: 10px;
}
</style>
</head>
<body>


<?php require('admin_header.php');?>


 <div style="padding:1px 16px;">
 <h2><B> LECTURER DETAILS </B></h2>

 <a href="admin_new_lecturer.php" class="btn-download">
    <i class='bx bx-plus' ></i>
    <span class="text">New Lecturer</span>
</a>
   
    <form class="">
    <select id="school" name="school" onchange="populateLecSelect(this.value);">
          <option value="">Select a School</option>
          <option value="School of Pure and Applied Sciences"> School of Pure and Applied Sciences</option>
          <option value="School of Engineering"> School of Engineering</option>
          <option value="School of Architecture"> School of Architecture</option>
        </select>
        <select id="dept" name="dept">
          <option value="">Select a Department</option>
         
        </select>
        <script>
        function populateLecSelect(selectedOption) {
    var dept = document.getElementById('dept');

    // Clear the options of the dept dropdown
    dept.options.length = 1;

    // Clear the options of the course dropdown
    
    if (selectedOption === 'School of Pure and Applied Sciences') {
        dept.options.add(new Option('Mathematics'));
        dept.options.add(new Option('CIT'));
    } else if (selectedOption === 'School of Engineering') {
        dept.options.add(new Option(' Electrical'));
        dept.options.add(new Option('Civil'));
    }
    else if (selectedOption === 'School of Architecture') {
        dept.options.add(new Option('Architecture'));
        dept.options.add(new Option('Planning'));
    }
}
        </script>
        
        

        <input type="submit"value = "Refresh"name="refresh" id="refresh">
        <input style="float:right; margin-right:17px;" type="submit"value = "Download"name="download" id="download"><br><br>

         </form>
         <div  id="ajaxdata">
        
         </div>        <br/>
       
   </form>

    
 </div>
