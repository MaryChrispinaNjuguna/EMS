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
    display: inline-block;
    
  }
</style>
<link rel="stylesheet" href="style_student.css">
   <!-- links css stylesheet-->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
     rel="stylesheet">
     <!-- links icon stylesheet-->
     <title>Exam</title>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $("#ajaxdata").load("student_results_all.php");
    $("#semester").change(function(){
      var semester=$(this).val();
      $("#ajaxdata").load("student_results_filtered.php?semester="+ semester);
    });
    $("#refresh").click(function(){
      $("#ajaxdata").load("student_results_all.php");
    });

    $("#download").click(function(){
      var semester=$("#semester").val();
     var url = "student_results_pdf.php?semester=" + semester;
    
    // Open the URL in a new window
    window.open(url, '_blank');    });
  
  });
</script>
</head>
<body>


<?php require ('header_student.php')?>

 <div style="padding:1px 16px;">

 <form >
          <label for = 'results' > <h2> RESULTS </h2> </label>
          <input style="float:right; margin-right:70px;" type="submit"value = "Download"name="download" id="download"><br><br>

        <select id="semester" name="semester" >
          <option value="" disabled selected>Select a Semester</option>
          <option value="1.1">Year1 Semester1</option>
          <option value="1.2">Year1 Semester2</option>
          <option value="2.1">Year2 Semester1</option>
          <option value="2.2">Year2 Semester2</option>
          <option value="3.1">Year3 Semester1</option>
          <option value="3.2">Year3 Semester2</option>
          <option value="4.1">Year4 Semester1</option>
          <option value="4.2">Year4 Semester2</option>

        </select>
          
  <input type="submit"value = "Refresh"name="refresh" id="refresh">
         </form>
         <div  id="ajaxdata">
        
         </div>        <br/>
         
</div>





</body>
</html>