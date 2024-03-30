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
<html >
<head>
<title>Exam</title>

   <link rel="stylesheet" href="style_set_exam.css">
   <!-- links css stylesheet-->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
     rel="stylesheet">
     <!-- links icon stylesheet-->
<style>
 .table_container{
  overflow: auto;
  max-height: 480px;
  margin-top: 20px;}
  input[type="submit"] {
    background-color: #174e80;
    color: white;
    padding: 10px;
    border: none;
    cursor: pointer;
    width: auto;
    border-radius: 5px;
    float:right;
    
}
.close {background-color: #174e80;
    color: white;
    padding: 10px;
    border: none;
    cursor: pointer;
    width: auto;
    border-radius: 5px;
    float:left;}

a{
    text-decoration: none;
}
select{
    width: 359px;
}
</style>
</head>

<body >


<?php require ('header_lec.php')?>



 <div class ="section" style="padding:1px 16px;margin-top: 16px; ">
 
 <div class="row" style="margin-left:250px">
      
         <div class="column" style=   " margin-right: 20px; background-color: #ffffff">
         <div class="question" id="question"> 
         <form id="myForm" action="" method="post">


        <?php
            include "connect.php";
            $unitcode3=$_GET["unitcode3"];
            $sql = "SELECT unitcode, unit_title FROM units WHERE unitcode='$unitcode3'";
        $result = $conn->query($sql);

        // Check if any rows were returned
        if ($result->num_rows > 0) {
            // Loop through each row and generate an <option> element
            while($row = $result->fetch_assoc()) {
                echo "<label > <b>" . $unitcode3 ." ". $row['unit_title'] ."</b> </label>";
            }
        } else {
            echo "<label>No options available</label>";
        }
        ?>
        <br>
        <?php
        $q_code=$_GET["q_code"];
        $sql = "SELECT * FROM questions WHERE unitcodeF='$unitcode3'AND q_code='$q_code'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                $question=$row["question"];
                $optionA=$row["optionA"];
                $optionB=$row["optionB"];
                $optionC=$row["optionC"];
                $optionD=$row["optionD"];
                $correct_option=$row["correct_option"]; 
                $weight=$row["weight"]; 

            }
        }

        ?>
        <label id='q_code' name='q_code' value=$q_code > <b> Question <?php echo $q_code?> </b> </label>
   
        <textarea id="question" name="question" rows="4" placeholder="Enter question here" required><?php echo $question ?>
        </textarea><br>

        <label for="optionA">A:</label>
        <input type="text" id="optionA" name="optionA" placeholder="Enter option A" required 
        value="<?php echo $optionA ?>"><br/>

        <label for="optionB">B:</label>
        <input type="text" id="optionB" name="optionB" placeholder="Enter option B" required
        value="<?php echo $optionB ?>"><br/>

        <label for="optionC">C:</label>
        <input type="text" id="optionC" name="optionC" placeholder="Enter option C" required
        value="<?php echo $optionC ?>"><br/>

        <label for="optionD">D:</label>
        <input type="text" id="optionD" name="optionD" placeholder="Enter option D" required
        value="<?php echo $optionD ?>"><br/>

        <label for="correct_option">Correct Answer:</label>
        <select id="correct_option" name="correct_option" required>
            <option value="<?php echo $correct_option?>" ><?php echo $correct_option?></option>
            <option value="A" >A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
        </select>
        <br>
        <label for="weight">Weight: </label>
        <select id="weight" name="weight" required>
            <option value="<?php echo $weight?>"  ><?php echo $weight?></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="5">5</option>
           
        </select>    <br/>

    <a class="close" href="exam_questions.php?unitcode3=<?php echo $unitcode3;?>">CLOSE </a>
    <input type="submit" name="submit" value="SUBMIT"/>
 </form> 
 <script>
  // Function to open new page
  function openNewPage() {
    // Get a reference to the form
    var form = document.getElementById('myForm');
    // Set the action attribute of the form to the URL of the new page
    form.action = 'exam_questions.php'; 
    // Submit the form
    form.submit();
  }
</script>
         
</div>
         </div>
               
   </div>

</div>

</body>
</html>
<?php
include 'connect.php';
$q_code=$_GET["q_code"];
$unitcode3=$_GET["unitcode3"];

if (isset($_POST["submit"])) {
    
    $unitcodeF = $unitcode3;
    $question = $_POST["question"];
    $optionA = $_POST["optionA"];
    $optionB = $_POST["optionB"];
    $optionC = $_POST["optionC"];
    $optionD = $_POST["optionD"];
    $correct_option = $_POST["correct_option"];
    $weight = $_POST["weight"];
    
    
    

    // update data into the database
    mysqli_query($conn, "UPDATE questions 
    SET question='$question',  optionA='$optionA', optionB='$optionB', optionC='$optionC', optionD='$optionD', 
    correct_option='$correct_option', weight='$weight' WHERE unitcodeF='$unitcode3' AND q_code='$q_code'");

   ?>
   <script type="text/javascript">
    alert("question updated successfully");
    window.location="exam_questions.php?unitcode3=<?php echo $unitcode3;?>";

   </script>
   <?php

    $conn->close();
}



