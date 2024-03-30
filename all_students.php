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
     <script src="script.js">
      
      
      
      </script>
       <script src="script1.js"></script>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script type="text/javascript">
  $(document).ready(function(){
    // Load the initial data
    $("#ajaxdata").load("all_students_all.php");

    // When the first dropdown changes
    $("#school").change(function(){
      var school = encodeURIComponent($(this).val()); // Encode the selected value from the first dropdown
      var dept = encodeURIComponent($("#dept").val()); // Encode the selected value from the second dropdown
      var course = encodeURIComponent($("#course").val()); // Encode the selected value from the third dropdown

      // Load data based on all selected values
      $("#ajaxdata").load("all_students_filtered.php?school=" + school + "&dept=" + dept + "&course=" + course);
    });

    // When the second dropdown changes
    $("#dept").change(function(){
      var dept = encodeURIComponent($(this).val()); // Encode the selected value from the second dropdown
      var school = encodeURIComponent($("#school").val()); // Encode the selected value from the first dropdown
      var course = encodeURIComponent($("#course").val()); // Encode the selected value from the third dropdown

      // Load data based on all selected values
      $("#ajaxdata").load("all_students_filtered.php?school=" + school + "&dept=" + dept + "&course=" + course);
    });

    // When the third dropdown changes
    $("#course").change(function(){
      var course = encodeURIComponent($(this).val()); // Encode the selected value from the third dropdown
      var school = encodeURIComponent($("#school").val()); // Encode the selected value from the first dropdown
      var dept = encodeURIComponent($("#dept").val()); // Encode the selected value from the second dropdown

      // Load data based on all selected values
      $("#ajaxdata").load("all_students_filtered.php?school=" + school + "&dept=" + dept + "&course=" + course);
    });

    // Refresh button functionality
    $("#refresh").click(function(){
      $("#ajaxdata").load("all_students_all.php");
    });
    $("#download").click(function(){
      var course = encodeURIComponent($("#course").val()); // Encode the selected value from the third dropdown
      var school = encodeURIComponent($("#school").val()); // Encode the selected value from the first dropdown
      var dept = encodeURIComponent($("#dept").val()); // Encode the selected value from the second dropdown
      var url = "all_students_pdf.php?school=" + school + "&dept=" + dept + "&course=" + course;
    
    // Open the URL in a new window
    window.open(url, '_blank');    });
  });
</script>

<style>
.card
{width: 210px;}
.table_container{
  overflow: auto;
  max-height: 370px;
  margin-top: 20px;
}
select{
    width: 25%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
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

 </div>
 <div style="padding:1px 16px;">
 <h2><B> STUDENT DETAILS </B></h2>

 <a href="admin_new_student.php" class="btn-download">
    <i class='bx bx-plus' ></i>
    <span class="text">New Student</span>
</a>
   
    <form class="">
    <input style="float:right; margin-right:17px;" type="submit"value = "Download"name="download" id="download"><br><br>
    <select id="school" name="school" onchange="populateSecondSelect(this.value);">
          <option value="">Select a School</option>
          <option value="School of Pure and Applied Sciences">School of Pure and Applied Sciences</option>
          <option value="School of Engineering">School of Engineering</option>
          <option value="School of Architecture"> School of Architecture</option>
        </select>
        <select id="dept" name="dept" onchange="populateThirdSelect(this.value);">
          <option value="">Select a Department</option>
         
        </select>
        
        <select id="course" name="course" >
          <option value="">Select a course</option>
          
        </select>
        

        <input type="submit"value = "Refresh"name="refresh" id="refresh">
         </form>
         <div  id="ajaxdata">
        
         </div>        <br/>
 </div>
