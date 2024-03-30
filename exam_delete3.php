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

$unitcode4 = $_GET["unitcode4"];

// Check if the user confirmed the deletion
if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    // Proceed with deletion
    mysqli_query($conn,"DELETE FROM exams WHERE unitcode='$unitcode4'");
?>
    <script type="text/javascript">
        alert("Exam deleted successfully");
        window.location="exam.php";
    </script>
<?php
} else {
    // Ask for confirmation before deletion
?>
<script type="text/javascript">
    var confirmDelete = confirm("Are you sure you want to delete this exam?");
    if (confirmDelete) {
        window.location.href = "exam_delete3.php?unitcode4=<?php echo $unitcode4; ?>&confirm=yes";
    } else {
        // Redirect back to exam.php without deleting
        window.location.href = "exam.php";
    }
</script>
<?php
}
?>
