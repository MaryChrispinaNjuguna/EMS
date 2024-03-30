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
   <table class="table">
            <tr>
               <th>Registration No</th>
                <th>Full Name</th>
                <th>Unit Code</th>
                <th>Unit Title</th>
                <th>Total Questions</th>
                <th>Total Marks</th>
                <th>Percentage</th>
                <th>Grade</th>
                <th>Download   </th>
                <th>Delete   </th>

            </tr>
    <?php
    // Include the database connection file
    include('connect.php');

    // SQL query to select data from the table
    $sql = "SELECT  * FROM results 
    LEFT JOIN units ON results.unitcodeF = units.unitcode 
     LEFT JOIN students ON results.reg_noF = students.reg_no 
     LEFT JOIN exams ON results.unitcodeF=exams.unitcode
     WHERE exams.lec_emailF = '$_SESSION[lec_email]'";
    $result = $conn->query($sql);

   // Check if there are rows in the result set
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        ?>
       <div id="info"> 
          <tr>
          <td><?php echo $row["reg_no"] ?></td>
          <td><?php echo  $row["student_fname"] ." ".$row["student_lname"]?></td>
          <td><?php echo $row["unitcode"] ?></td>
          <td><?php echo $row["unit_title"] ?></td>
          <td style="text-align:center;"> <?php echo  $row["total_questions"] ?></td>
          <?php
        $sql1="SELECT SUM(weight) AS sum_value FROM questions WHERE unitcodeF='$row[unitcode]'";
        $result1= $conn->query($sql1);
        $row1 = $result1->fetch_assoc();
        $sum_of_values = $row1['sum_value'];
        echo "<td style='text-align:center'>".$row["marks"]."/" . $sum_of_values . "</td>";

        $marks=$row["marks"];
        $total=($marks/$sum_of_values)*100;
        $total = intval($total);
        echo "<td style='text-align:center'>".$total ."%". "</td>";

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
        echo "<td style='text-align:center'>".$grade . "</td>";

        ?>
          <td style='text-align:center'><a href = "student_detailed_results_pdf.php?regi_no=<?php echo $row["reg_no"];?>&unitcode3=<?php echo $row["unitcode"]?>" target="_blank"> <i class="material-icons" style= "font-size:30px; color:green">
          download</i></a></td>
          <td style='text-align:center'><a href = "result_delete.php?regi_no=<?php echo $row["reg_no"];?>&unitcode3=<?php echo $row["unitcode"]?>" ><i class="material-icons" style= "font-size:30px; color:red">
          delete</i></a></td>
          </tr>
       </div>
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
