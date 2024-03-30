<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php require "header.php";?>

    <div class="container_login">
        <h1>Login</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="reg_no">Registration Number</label>
            <input type="text" id="reg_no" name="reg_no" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Login">
        </form>
        <p>Don't have an account? <a href="student_register.php">Register</a></p>
    </div>
</body>
</html>
<?php 
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $reg_no = $_POST["reg_no"];
    $password = $_POST["password"];

    $sql = "SELECT password FROM students WHERE reg_no = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['reg_no']);
    $stmt->execute();
    $stmt->bind_result($stored_hash);
    $stmt->fetch();
    
    // Verify the entered password against the stored hash
    if (password_verify($password, $stored_hash)) {
        // The entered password is correct
        $_SESSION["reg_no"]=$_POST["reg_no"];
            echo "<script>alert('User logged in successfully'); window.location.href=('student_home.php');</script>";
            exit;
          } else {
            echo "<script>alert('Username or Password is incorrect');</script>";
          }
          
          
    

    $stmt->close();
    $conn->close();
}
?>