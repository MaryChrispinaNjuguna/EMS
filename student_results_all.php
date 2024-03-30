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
<table class="table">
            <tr>
                <th>Unit Code</th>
                <th>Unit Title</th>
                <th>Total Questions</th>
                <th style='text-align:center'>Correct</th>
                <th style='text-align:center'>Wrong</th>
                <th style='text-align:center'>Total Marks</th>
                <th style='text-align:center'>Percentage</th>
                <th style='text-align:center'>Grade</th>
                <th>Download   </th>

            </tr>
            <?php
    // Include the database connection file
    include('connect.php');

    // SQL query to select data from the table
    $sql = "SELECT  * FROM results LEFT JOIN units ON 
    results.unitcodeF = units.unitcode WHERE reg_noF='$_SESSION[reg_no]'";
    $result = $conn->query($sql);

   // Check if there are rows in the result set
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        ?>
       <div id="info"> 
          <tr>
          <td><?php echo $row["unitcodeF"] ?></td>
          <td><?php echo $row["unit_title"] ?></td>
          <td style='text-align:center'> <?php echo  $row["total_questions"] ?></td>
          <td style='text-align:center'> <?php echo  $row["correct"] ?></td>
          <td style='text-align:center'> <?php echo  $row["wrong"] ?></td>
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
        $reg_no=$_SESSION["reg_no"];

        ?>
      <td style='text-align:center'><a href = "student_detailed_results_pdf.php?unitcode3=<?php echo $row['unitcode'];?>&regi_no=<?php echo $reg_no;?>"
             target="_blank"><i class="material-icons" style= "font-size:30px; color:green">
          download</i></a></td>

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

<script>
  function download() {
           

    
            window.open('student_results_pdf.php?reg_no=<?php echo $_SESSION["reg_no"];?>', '_blank')
}
</script>

        </table>