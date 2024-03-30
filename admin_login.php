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
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
<?php 
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['username']);
    $stmt->execute();
    $stmt->bind_result($stored_hash);
    $stmt->fetch();
   
    // Verify the entered password against the stored hash
    if (password_verify($password, $stored_hash)) {
        // The entered password is correct
        echo "Login successful";
        $_SESSION["username"]=$_POST["username"];
        echo "<script>alert('User logged in successfully'); window.location.href=('admin_view.php');</script>";
            exit;
          } else {
            echo "<script>alert('Username or Password is incorrect');</script>";
          }
    

    $stmt->close();
    $conn->close();
}
?>