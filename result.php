<?php
session_start();
include "connect.php";
$date=date("Y-m-d H:i:s");
$_SESSION["end_time"]=date("Y-m-d H:i:s", strtotime($date."+$_SESSION[time_limit] minutes"));
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
include ('connect.php');
$sql = "SELECT reg_no, student_fname, student_lname, student_email, school, dept,course 
FROM students WHERE reg_no = '$_SESSION[reg_no]'"; // Assuming user with ID 1
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

?>

<html>
<head>
<style>
 
body
{
    padding: 0;
    margin: 0;

}
.green-label {
    background-color: green;
}
.red-label {
    background-color: red;
}


</style>
<link rel="stylesheet" href="style_results.css">
   <!-- links css stylesheet-->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
     rel="stylesheet">
     <!-- links icon stylesheet-->

     <title>Exam</title>

</head>
<body>
<?php require "header_student_exam.php";?>



 <div style="margin-left:5%;padding:1px 10px;">
 <div class="container_register">
      <h2> <?php echo $_SESSION["unitcode"]?> Examination Results</h2>


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
        <label for="email"><?php echo   $student_email ?></label>
        
        <br>
        <br>
        <?php
$correct=0;
$wrong=0;
$marks=0;

if (isset($_SESSION["correct_option"]))
{
  for($i=1;$i<=sizeof($_SESSION["correct_option"]);$i++)
  {

    $correct_option="";
    $correct_option1="";
    $weight=0;

    $res =mysqli_query( $conn,"SELECT *
FROM questions WHERE unitcodeF='$_SESSION[unitcode]' && q_code=$i"); 
while($row=mysqli_fetch_array($res))
{
  $correct_option=$row["correct_option"];
  $weight=$row["weight"];
//this is to convert the A or B to actual value of optionA or optionB
  $result =mysqli_query( $conn,"SELECT option".$correct_option." AS 'correct_option1'
FROM questions WHERE unitcodeF='$_SESSION[unitcode]' && q_code=$i"); 
while($row1=mysqli_fetch_array($result))
{
 $correct_option1=$row1["correct_option1"];
}

}

if (isset($_SESSION["correct_option"][$i]))
{
    if ($correct_option1==($_SESSION["correct_option"][$i]))
    {
        $correct=$correct+1;
        $marks=$marks+$weight;
  }
  else{
    $wrong=$wrong+1;

  }
}
else{
  $wrong=$wrong+1;

}
mysqli_query($conn, "INSERT INTO selected (reg_noF, unitcodeF, q_code, selected) 
VALUES ('{$_SESSION['reg_no']}', '{$_SESSION['unitcode']}', '$i', '{$_SESSION['correct_option'][$i]}')");


}
}

$count =0;
$res =mysqli_query( $conn,"SELECT * FROM questions WHERE unitcodeF='$_SESSION[unitcode]' "); 
$count=mysqli_num_rows($res);
$wrong=$count-$correct;

 echo '<label for="total_questions"><b>Total Questions: </b></label>
<label for="total_questions">'.$count.'</label><br>
<br>';
echo '<label for="questions_right"><b>Questions Right: </b></label>
<label for="questions_right">'.$correct.'</label><br>
<br>';
echo '
<label for="questions wrong"><b>Questions Wrong: </b></label>
        <label for="questions_wrong">'.$wrong.'</label>
        
        <br>
        <br>';


$sql1="SELECT SUM(weight) AS sum_value FROM questions WHERE unitcodeF='$_SESSION[unitcode]'";
$result1= $conn->query($sql1);
$row1 = $result1->fetch_assoc();
$sum_of_values = $row1['sum_value'];
echo '
<label for="marks"><b>Total Marks: </b></label>
        <label for="marks">'.$marks."/" . $sum_of_values .'</label>      
        <br>
        <br>   
';
$total=($marks/$sum_of_values)*100;
$total = intval($total);
echo '
<label for="percentage"><b>Percentage: </b></label>
        <label for="percentage">'.$total."%".'</label>      
        <br>
        <br>   
';

 // Define the grading thresholds
$gradeA = 70;
$gradeB = 60;
$gradeC = 50;
$gradeD = 40;

// Calculate the grade based on the total score
if ($total >= $gradeA) {
    $grade = 'A';
} elseif ($total >= $gradeB) {
    $grade = 'B';
} elseif ($total >= $gradeC) {
    $grade = 'C';
} elseif ($total >= $gradeD) {
    $grade = 'D';
} else {
    $grade = 'E';
}
        
echo '
<label for="grade"><b>Grade: </b></label>
        <label for="grade">'.$grade.'</label>      
        
';
$reg_no=$_SESSION["reg_no"];

   
?>
<br>
<br>
<br>

<a href="student_detailed_results_pdf.php?unitcode3=<?php echo $_SESSION['unitcode'];?>&regi_no=<?php echo $reg_no;?>"  style="float:left"> View Detailed Results</a> 
<br>     
<br>     
<br>     
      </form>

     


 </div>


</div>

<?php
if (isset($_SESSION["exam_start"]))
{
  $date=date("Y-m-d H:i:s");
  mysqli_query($conn,"INSERT INTO results(reg_noF, unitcodeF, total_questions,correct,wrong,exam_time,marks) VALUES
  ('$_SESSION[reg_no]','$_SESSION[unitcode]','$count','$correct','$wrong','$date' ,'$marks' )" );

}
unset($_SESSION['correct_option']);

$conn->close();

?>



</body>
</html>