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
<?php
include ('connect.php');
$unitcode = $_GET["unitcode"];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Exam</title>
    <link rel="stylesheet" type="text/css" href="style_exam.css">
    <style> 
    #videoElement {
	width: 200px;
	height: 150px;
	background-color: #666;
}
button {
  background-color: #3c91e6;
    color: white;
    padding: 10px;
    border: none;
    cursor: pointer;
    width: auto;
    border-radius: 5px;
    float:right;
    width: 100%;
}

.card{
  height: 150px;

}

</style>

<script>
var switchAwayTime = 0;

function checkFocus() {
    if (!document.hasFocus()) {
        // User switches away from the window/tab
        alert("Please stay on this page!");
        if (switchAwayTime === 0) {
            // Start the timer when the user first switches away
            switchAwayTime = Date.now();
        } else {
            // Check if more than 5 seconds have passed since the user switched away
            var currentTime = Date.now();
            var elapsedTime = currentTime - switchAwayTime;
            if (elapsedTime >= 5000) {
                // Close the current window/tab
                window.close();
            }
        }
    } else {
        // User is back on the window/tab, reset the timer
        switchAwayTime = 0;
    }
}

// Check focus periodically
setInterval(checkFocus, 1000);
</script>
</head>
<body>  
<?php require "header_student_exam.php";?>
         

      <div class="row">
     
         <div class="video">
           <video autoplay="true" id="videoElement"></video>       
         </div>
      <div class="time">
        <div class="card">
         <div class="timer" id="timer">00:00:00</div>
         <br><br>
                 <h2><b> Time Remaining</b></h2> 
        </div>
         

      </div>
   </div>

   <div class ="section" style="padding:20px; ">
    <form action="" method="post">
        <div class="question" id="question"> 
  <br>
  <?php
  include ('connect.php');
  $query=mysqli_query($conn,"SELECT unit_title FROM units WHERE unitcode='$unitcode'");
  while($data=mysqli_fetch_array($query)){
    $unit_title = $data["unit_title"];}
  ?>
<label> <b><?php echo $unitcode . " ". $unit_title?> </b></label>
<br>
<label> <b>INSTRUCTIONS TO CANDIDATES </b> </label>
<label> <b>Please adhere to the following guidelines for this exam:</b>
  <br>
1. This online exam consists of multiple-choice questions.
<br>
2. Answer each question by selecting the most appropriate option.
<br>
3. Carefully read each question and all available answer choices before making your selection.  
<br>
4. Choose the best answer for each question based on the information provided.
<br>
5. Once you have selected an answer, review your choice before proceeding to the next question.
<br>
6. Ensure that you submit your responses within the allotted time frame.
<br>
7. Contact the exam administrator if you encounter any technical difficulties during the exam.
<br>
8. Do not refresh the page or navigate away from the exam interface until you have completed and submitted all your answers.
<br>
9. Double-check that you have answered all questions before finalizing your submission.
<br>
10. Once you have completed the exam, click on the submit button to record your responses.
<br>
<b>INVOLVEMENT IN ANY EXAMINATION IRREGULARITY WILL AUTOMATICALLY LEAD TO DISCONTINUATION FROM THE UNIVERSITY</b>
</label>
        <button id="fullscreen-button"type="button" value="<?php echo $unitcode?>" onclick="set_exam_type_session(this.value)">START</button>
    <br>
    <br>
    <br>
    
      </form> 

   </div>
   </div>
   <script>
    function closePage() {
    // Close the current window
    window.close();
}
var video = document.querySelector("#videoElement");

if (navigator.mediaDevices.getUserMedia) {
  navigator.mediaDevices.getUserMedia({ video: true })
    .then(function (stream) {
      video.srcObject = stream;
    })
    .catch(function (err0r) {
      console.log("Something went wrong!");
    });
}
</script>

<script type="text/javascript">

function set_exam_type_session(unitcode)
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                window.location = "exam_schedule1.php";
            }
        };
        xmlhttp.open("GET","set_exam_type_session.php?unitcode="+ unitcode,true);
        xmlhttp.send(null);
    }
</script>
</body>
</html>