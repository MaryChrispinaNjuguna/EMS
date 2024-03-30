
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


    // Include the database connection file
    include('connect.php');

    // SQL query to select data from the table
    $sql = "SELECT  unitcode, no_of_questions,  time_limit FROM exams";
    $result = $conn->query($sql);

   // Check if there are rows in the result set
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["unitcode"] . "</td><td>" . $row["no_of_questions"] . "</td><td>" 
        . $row["time_limit"] . "</td>";
        echo "<td><button onclick = 'download()'>DOWNLOAD</button></td>";
        echo   "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>0 results</td></tr>";
}


echo 
"<script>
function download() {
    
    window.open('exam_pdf2.php', '_blank')
}
</script>" ;

// Close the database connection
$conn->close();

    ?>
