<?php

session_start();
?>
<!DOCTYPE html>
<html>
<title>Exam</title>

<head>
   <link rel="stylesheet" href="styles_lec_home.css">
   <!-- links css stylesheet-->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
     rel="stylesheet">
     <!-- links icon stylesheet-->
<style>

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
  .form button{
    margin-top: 10px;

  }
h2{
 display: inline-block;  
}
.table {
    border-collapse: collapse;
    width: 100%;
    margin:0;
}

.table_container{
  overflow: auto;
  max-height: 450px;
  margin-top: 20px;}
  .table th {
  background-color: #f2f2f2;
  position: sticky;
  top: 0;
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


<?php require ('header_lec.php')?>

 <div style="padding:1px 16px; padding-top: 20px;">
  
   <a href="lec_exam1.php" class="btn-download">
    <i class='bx bx-plus' ></i>
    <span class="text">Add Exam</span>
</a>
   
        <form class="form" >
          <label for = 'exam' > <h2 style= "margin-bottom:0;"> EXAMS </h2> </label>
          <input style="float:right; margin-right:17px;" type="submit"value = "Download"name="download" id="download" onclick="openNewTab()"><br>
        <div class=table_container>
        <table class="table">
            <tr>
                <th>Unit Code</th>
                <th>Unit Title</th>
                <th>Total Questions</th>
                <th>Total Marks</th>
                <th>Time Limit</th>                
                <th>Download</th>                
                <th>Edit</th>                
                <th>Delete</th>                
            </tr>
            
            <?php
    // Include the database connection file
    include('connect.php');

    // SQL query to select data from the table
    $sql = "SELECT  * FROM exams LEFT JOIN units ON exams.unitcode = units.unitcode WHERE lec_emailF='$_SESSION[lec_email]'";
    $result = $conn->query($sql);

   // Check if there are rows in the result set
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
      ?>
        <tr>
        <td><?php echo $row["unitcode"] ?></td>
        <td><?php echo $row["unit_title"] ?></td>
        <?php
        $sql1="SELECT * FROM questions WHERE unitcodeF='$row[unitcode]'";
        $result1= $conn->query($sql1);
        $no_of_questions = mysqli_num_rows($result1);
        echo "<td style='text-align:center'>". $no_of_questions."</td>"
        ?>
        <?php
        $sql1="SELECT SUM(weight) AS sum_value FROM questions WHERE unitcodeF='$row[unitcode]'";
        $result1= $conn->query($sql1);
        $row1 = $result1->fetch_assoc();
        $sum_of_values = $row1['sum_value'];
        echo "<td style='text-align:center'>" . $sum_of_values . "</td>";
        ?>
        <td style="text-align:center"> <?php echo  $row["time_limit"] ?></td>
        
        <td style="text-align:center"><a href = "exam_pdf2.php?unitcode=<?php echo $row["unitcode"];?>" target="_blank"><i class="material-icons" 
        style= "font-size:30px; color:green">download</i></a></td>
        
        <td style="text-align:center"><a href = "exam_questions.php?unitcode3=<?php echo $row['unitcode'];?>" 
        > <i class="material-icons" style= "font-size:30px; color:#00b1eb">
          create</i></a></td>
          <td style="text-align:center"><a href = "exam_delete3.php?unitcode4=<?php echo $row['unitcode'];?>" >
          <i class="material-icons" style= "font-size:30px; color:red">delete</i></a></td>
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

<script>
        function openNewTab() {
          window.open('exam_pdf1.php?lec_email=<?php echo $_SESSION["lec_email"]; ?>', '_blank');

        }
    </script>
</body>
</html>