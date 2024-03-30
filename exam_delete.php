<?php
session_start();
if (!isset($_SESSION["lec_email"])) {
?>
<script type="text/javascript">
    window.location="lec_login.php";
</script>
<?php
}

include 'connect.php';

$q_code = $_GET["q_code"];
$unitcode3 = $_GET["unitcode3"];

// Check if the user confirmed the deletion
if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    // Proceed with deletion
    mysqli_query($conn,"DELETE FROM questions WHERE q_code='$q_code' AND unitcodeF='$unitcode3'");
    
    $loop = 0;
    $res = mysqli_query($conn,"SELECT * FROM questions WHERE  unitcodeF='$unitcode3' ORDER BY q_code ASC");
    $loop = 0;
    while ($row = mysqli_fetch_array($res)) {
        $loop++;
        // Update the question code
        mysqli_query($conn, "UPDATE questions SET q_code='$loop' WHERE q_code='$row[q_code]' AND unitcodeF='$unitcode3'");
    }
?>
    <script type="text/javascript">
        alert("Question deleted successfully");
        window.location="exam_questions.php?unitcode3=<?php echo $unitcode3;?>";
    </script>
<?php
} else {
    // Ask for confirmation before deletion
?>
<script type="text/javascript">
    var confirmDelete = confirm("Are you sure you want to delete this question?");
    if (confirmDelete) {
        window.location.href = "exam_delete.php?q_code=<?php echo $q_code; ?>&unitcode3=<?php echo $unitcode3; ?>&confirm=yes";
    } else {
        // Redirect back to exam_questions.php without deleting
        window.location.href = "exam_questions.php?unitcode3=<?php echo $unitcode3; ?>";
    }
</script>
<?php
}
?>
