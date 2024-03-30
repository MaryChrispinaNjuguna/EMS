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
    <title>Exam</title>
    <link rel="stylesheet" type="text/css" href="style_exam.css">
    <script src="exam.js"></script>
    <style> 
    #videoElement {
	width: 200px;
	height: 150px;
	background-color: #666;
}

button
{
  background-color: #174e80;
    color: white;
    padding: 10px;
    border: none;
    cursor: pointer;
    border-radius: 6px;
    

}
.card{
  height: 150px;

}

</style>
<script>
var switchAwayTime = 0;
var timer2;

function checkFocus() {
    if (!document.hasFocus()) {
        // User switches away from the window/tab
        alert("Please stay on this page!");
        switchAwayTime = Date.now();
        // Start the timer for 10 seconds
        timer2 = setTimeout(openPage, 5000);
    } else {
        // User is back on the window/tab, reset the timer and switchAwayTime
        switchAwayTime = 0;
        clearTimeout(timer2);
    }
}

function openPage() {
  window.location.href = "result.php";
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
         <div class="timer" id="timer">00:00:00</div><br><br>
                 <h2><b> Time Remaining</b></h2> 
        </div>
         

      </div>

   </div>

   <div class ="section" style="padding:20px; ">
    <form action="lec_exam2.php" method="post">
        <div class="question" id="question"> 
          <div style="float:right" id="total_que"> 0</div>
          <div style="float:right"> / </div>
          <div style="float:right" id="current_que">0 </div>
          <div id="load_questions"> </div>

   
        

    </div>
    
        <button type="button" value=previous onclick="load_previous()"> PREVIOUS </button>
        <button type="button" value=next style="float:right" onclick="load_next()">NEXT</button>

    </form> 
   </div>
   <script>
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
<script type=text/javascript>
function load_total_que()
{
   var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              document.getElementById("total_que").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","load_total_que.php",true);
        xmlhttp.send(null);
}
var questionno="1";
load_questions(questionno);
function load_questions(questionno)
{
  document.getElementById("current_que").innerHTML=questionno;

  var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              if (xmlhttp.responseText=="over")
              {
                window.location="result.php";
              }
              else{
                document.getElementById("load_questions").innerHTML=xmlhttp.responseText;
                load_total_que();

              }
          }
        };
        xmlhttp.open("GET","load_questions.php?questionno="+ questionno,true);
        xmlhttp.send(null);
}

function radioclick(radiovalue,questionno)
 {

  var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            }
        };
        xmlhttp.open("GET","save_answer.php?questionno="+ questionno + "&value1="+radiovalue,true);
        xmlhttp.send(null);
 }
function load_previous()
{
  if (questionno=="1")
  {
    load_questions(questionno);

  }
  else{
    questionno=eval(questionno)-1;
    load_questions(questionno);
  }
}
function load_next()
{
  questionno=eval(questionno)+1;
    load_questions(questionno);
  }
  

  </script>





</body>
</html>