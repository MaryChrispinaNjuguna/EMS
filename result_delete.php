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

$reg_no = $_GET['regi_no'];
$unitcode = $_GET['unitcode3'];

// Check if the user confirmed the deletion
if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    // Proceed with deletion
    mysqli_query($conn, "DELETE FROM results WHERE reg_noF='$reg_no' AND unitcodeF='$unitcode'");
    mysqli_query($conn, "DELETE FROM selected WHERE reg_noF='$reg_no' AND unitcodeF='$unitcode'");
?>
<script type="text/javascript">
    alert("Result deleted successfully");
    window.location="lec_results.php";
</script>
<?php
} else {
    // Ask for confirmation before deletion
?>
<script type="text/javascript">
    var confirmDelete = confirm("Are you sure you want to delete this result?");
    if (confirmDelete) {
        window.location.href = "result_delete.php?regi_no=<?php echo $reg_no; ?>&unitcode3=<?php echo $unitcode; ?>&confirm=yes";
    } else {
        // Redirect back to lec_results.php without deleting
        window.location.href = "lec_results.php";
    }
</script>
<?php
}
?>
