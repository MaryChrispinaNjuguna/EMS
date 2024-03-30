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


<table class="table table-striped table-responsive">
            <tr >
                <th>Unit Code</th>
                <th>Unit Title</th>
                <th>Total Questions</th>
                <th>Total Marks</th>
                <th>Time Limit</th>
                <th>Exam</th>
            </tr>
            
            <?php
    // Include the database connection file
    include('connect.php');

    // SQL query to select data from the table
    $sql = "SELECT *  FROM exams 
    LEFT JOIN units ON exams.unitcode = units.unitcode
    LEFT JOIN students ON units.course = students.course AND units.offered = students.semester
    WHERE students.reg_no = '$_SESSION[reg_no]' 
    AND exams.unitcode NOT IN (SELECT unitcodeF FROM results WHERE reg_noF = '$_SESSION[reg_no]')";

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
          <td> <?php echo  $row["time_limit"] ?></td>
          <td><button onclick="downloadPDF('<?php echo $row["unitcode"]; ?>')">Take Exam</button></td>
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
    
  
<script>
  function downloadPDF(unitcode) {
            
            var screenWidth = screen.availWidth;
    var screenHeight = screen.availHeight;

           

            var windowFeatures = 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, fullscreen=yes';

            window.open('exam_schedule.php?unitcode=' + unitcode, '_blank', 'width=' + screenWidth + ', height=' + screenHeight + ',' + windowFeatures);

}
</script>

        </table>