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
  body{
    overflow: auto;
  }
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
</style>
</head>

<body style="background-color: #ffffff">


<?php require ('header_lec_exam.php')?>



 <div class ="section" style="padding:1px 16px;margin-top: 16px; ">
 
 <div class="row">
      
         <div class="column" style=   " margin-right: 20px;">
         <div class="question" id="question"> 
         <form id="myForm" action="" method="post">


        <?php
            include "connect.php";
            $unitcode=$_GET["unitcode3"];

            $sql = "SELECT unitcode, unit_title FROM units WHERE unitcode='$unitcode'";
        $result = $conn->query($sql);

        // Check if any rows were returned
        if ($result->num_rows > 0) {
            // Loop through each row and generate an <option> element
            while($row = $result->fetch_assoc()) {
                echo "<label > <b>" . $row['unitcode'] ." ". $row['unit_title'] ."</b> </label>";
            }
        } else {
            echo "<label>No options available</label>";
        }
        ?>
        <br>
        <?php
         include "connect.php";
         $unitcode=$_GET["unitcode3"];
         $count=0;
         $query = "SELECT * FROM questions WHERE unitcodeF='$unitcode'";
         $result = mysqli_query($conn, $query);
         
         $count=mysqli_num_rows($result);
         if($count==0)
         {
            $q_code=1;
            echo "<label id='q_code' name='q_code' value='".$q_code ."'> <b> Question " . $q_code . "</b> </label>";

         }
         else{
            $q_code=$count+1;
            echo "<label id='q_code' name='q_code' value='".$q_code ."'><b> Question " . $q_code . "</b> </label>";

         }
        ?>
        <textarea id="question" name="question" rows="4" placeholder="Enter question here" required></textarea><br>

        <label for="optionA">A:</label>
        <input type="text" id="optionA" name="optionA" placeholder="Enter option A" required><br/>

        <label for="optionB">B:</label>
        <input type="text" id="optionB" name="optionB" placeholder="Enter option B" required><br/>

        <label for="optionC">C:</label>
        <input type="text" id="optionC" name="optionC" placeholder="Enter option C" required><br/>

        <label for="optionD">D:</label>
        <input type="text" id="optionD" name="optionD" placeholder="Enter option D" required><br/>

        <label for="correct_option">Correct Answer:</label>
        <select id="correct_option" name="correct_option" required>
            <option value="">Select Correct Answer</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
        </select>
        <br>
        <label for="weight">Weight: </label>
        <select id="weight" name="weight" required>
            <option value="">Select Weight</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="5">5</option>
        </select>    <br/>
    <a class="close" href="exam.php">CLOSE </a>
    <input type="submit" name="submit" value="SUBMIT"/>
 </form> 
 <script>
  // Function to open new page
  function openNewPage() {
    // Get a reference to the form
    var form = document.getElementById('myForm');
    // Set the action attribute of the form to the URL of the new page
    form.action = 'exam.php'; 
    // Submit the form
    form.submit();
  }
</script>
         
</div>
         </div>
       
         <div class="column" style="text-align:center;">
         <?php
            include "connect.php";
            $unitcode=$_GET["unitcode3"];
            $sql = "SELECT unitcode, unit_title FROM units WHERE unitcode='$unitcode'";
        $result = $conn->query($sql);

        // Check if any rows were returned
        if ($result->num_rows > 0) {
            // Loop through each row and generate an <option> element
            while($row = $result->fetch_assoc()) {
                echo "<label> <b>" . $row['unitcode'] ." ". $row['unit_title'] ." QUESTIONS"."</b> </label>";
            }
        } else {
            echo "<label>No options available</label>";
        }
        ?>
        <br>
         <div class=table_container>
        <table class="table">
            <tr >
                <th>No</th>
                <th>Question</th>
                <th>OptionA</th>
                <th>OptionB</th>
                <th>OptionC</th>
                <th>OptionD</th>
                <th>Cor</th>
                <th>Weig</th>
                <th>Edit</th>
                <th>Del</th>
            </tr>
            
            <?php
    // Include the database connection file
    include('connect.php');
    // SQL query to select data from the table
    $unitcode=$_GET["unitcode3"];

    $sql = "SELECT * FROM questions WHERE unitcodeF=('$unitcode')";
    $result = $conn->query($sql);
        $count=0;
   // Check if there are rows in the result set
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $count=$count+1;
        $unitcode=$_GET["unitcode3"];

        ?>
          <tr>
          <td style="text-align:center;"><?php echo $count ?></td>
          <td><?php echo  $row["question"] ?></td>
          <td><?php echo  $row["optionA"] ?></td>
          <td><?php echo  $row["optionB"] ?></td>
          <td><?php echo  $row["optionC"] ?></td>
          <td><?php echo  $row["optionD"] ?></td>
          <td style="text-align:center;"> <?php echo  $row["correct_option"] ?></td>
          <td style="text-align:center;"> <?php echo  $row["weight"] ?></td>
          <td style="text-align:center;"><a href = "exam_edit.php?q_code=<?php echo $row['q_code'];?>&unitcode3=<?php echo $unitcode;?>" >
          <i class="material-icons" style= "font-size:20px; color:#00b1eb">create</i></a></td>
          <td style="text-align:center;"><a href = "exam_delete.php?q_code=<?php echo $row['q_code']; ?>&unitcode3=<?php echo $unitcode;?>" >
          <i class="material-icons" style= "font-size:20px; color:red">
          delete</i></a></td>
          </tr>
      <?php
      }
      
  }
  
  else {
    ?>
      <tr><td colspan='3'>0 results</td></tr>
      <?php
  }
  ?>
    
  

        </table>
         </div>
       
         </div>
       
         
      
       
         
   </div>

 </div>
 
</body>
</html>

<?php
include 'connect.php';

if (isset($_POST["submit"])) {
    $unitcode=$_GET["unitcode3"];

    $query = "SELECT * FROM questions WHERE unitcodeF='$unitcode'";
         $result = mysqli_query($conn, $query);
         
         $count=mysqli_num_rows($result);
         if($count==0)
         {
            $q_code=1;

         }
         else{
            $q_code=$count+1;

         }
    $unitcodeF = $unitcode;
    $question = $_POST["question"];
    $optionA = $_POST["optionA"];
    $optionB = $_POST["optionB"];
    $optionC = $_POST["optionC"];
    $optionD = $_POST["optionD"];
    $correct_option = $_POST["correct_option"];
    $weight = $_POST["weight"];
    
    
    

    // Insert data into the database
    mysqli_query($conn, "INSERT INTO questions  
    VALUES ('$q_code', '$unitcodeF', '$question',  '$optionA', '$optionB', '$optionC', '$optionD', 
    '$correct_option','$weight')");

   ?>
   <script type="text/javascript">
    alert("question added successfully");
    window.location.href=window.location.href;
   </script>
   <?php
    
    $conn->close();
}
?>

