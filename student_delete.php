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

$reg_no = $_GET['regi_no'];

// Check if the user confirmed the deletion
if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    // Proceed with deletion
    mysqli_query($conn, "DELETE FROM students WHERE reg_no='$reg_no'");
?>
<script type="text/javascript">
    alert("Student deleted successfully");
    window.location="all_students.php";
</script>
<?php
} else {
    // Ask for confirmation before deletion
?>
<script type="text/javascript">
    var confirmDelete = confirm("Are you sure you want to delete this student?");
    if (confirmDelete) {
        window.location.href = "student_delete.php?regi_no=<?php echo $reg_no; ?>&confirm=yes";
    } else {
        // Redirect back to all_students.php without deleting
        window.location.href = "all_students.php";
    }
</script>
<?php
}
?>
