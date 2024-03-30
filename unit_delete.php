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

$unitcode = $_GET['unitcode'];

// Check if the user confirmed the deletion
if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    // Proceed with deletion
    mysqli_query($conn, "DELETE FROM units WHERE unitcode='$unitcode'");
?>
<script type="text/javascript">
    alert("Unit deleted successfully");
    window.location="all_units.php";
</script>
<?php
} else {
    // Ask for confirmation before deletion
?>
<script type="text/javascript">
    var confirmDelete = confirm("Are you sure you want to delete this unit?");
    if (confirmDelete) {
        window.location.href = "unit_delete.php?unitcode=<?php echo $unitcode; ?>&confirm=yes";
    } else {
        // Redirect back to all_units.php without deleting
        window.location.href = "all_units.php";
    }
</script>
<?php
}
?>
