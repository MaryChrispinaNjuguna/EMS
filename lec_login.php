<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<script>
     function validateEmail() { var email = document.getElementById("lec_email").value; 
      var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/; 
      if (regex.test(email)) { 
        return true; 
      } 
     else {
         alert("Please enter a valid email address."); 
         return false; }
         } 
</script>
<body>
<?php require "header.php";?>
    <div class="container_login">
        <h1>Login</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="lec_email">Lecturer Email</label>
            <input type="text" id="lec_email" name="lec_email" required>
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
    $lec_email = $_POST["lec_email"];
    $password = $_POST["password"];


    $sql = "SELECT password FROM lecturers WHERE lec_email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['lec_email']);
    $stmt->execute();
    $stmt->bind_result($stored_hash);
    $stmt->fetch();
    
    // Verify the entered password against the stored hash
    if (password_verify($password, $stored_hash)) {
        // The entered password is correct
        echo "Login successful";
        $_SESSION["lec_email"]=$_POST["lec_email"];

        echo "<script>alert('User logged in successfully'); window.location.href=('lec_home.php');</script>";
            exit;
          } else {
            echo "<script>alert('Username or Password is incorrect');</script>";
          }
    

    $stmt->close();
    $conn->close();
}
?>