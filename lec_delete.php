<?php
session_start();
if (!isset($_SESSION["username"])) {
?>
<script type="text/javascript">
    window.location="admin_login.php";
</script>
<?php
}

include 'connect.php';

$lec_email = $_GET['lec_email'];

// Check if the user confirmed the deletion
if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    // Proceed with deletion
    mysqli_query($conn, "DELETE FROM lecturers WHERE lec_email='$lec_email'");
?>
<script type="text/javascript">
    alert("Lecturer deleted successfully");
    window.location="all_lecturers.php";
</script>
<?php
} else {
    // Ask for confirmation before deletion
?>
<script type="text/javascript">
    var confirmDelete = confirm("Are you sure you want to delete this lecturer?");
    if (confirmDelete) {
        window.location.href = "lec_delete.php?lec_email=<?php echo $lec_email; ?>&confirm=yes";
    } else {
        // Redirect back to all_lecturers.php without deleting
        window.location.href = "all_lecturers.php";
    }
</script>
<?php
}
?>
