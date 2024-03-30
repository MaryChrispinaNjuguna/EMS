<?php
session_start();
if (!isset($_SESSION["username"]))
{
?>
<script type="text/javascript">
  window.location="admin_login.php";
  </script>
  <?php
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Registration Page</title>
    <link rel="stylesheet" type="text/css" href="styleregister.css" />
    <script src="script.js">
      
      
    </script>
    <style> 
   button[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #174e80;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  
  }
  label.error{
    font-weight: 400;
    display: block;
    color: #f00;
    font-size: 12px;
  }
  label{
    width:190px;
  }
  </style>
  </head>
  <body>
  <?php require('admin_header.php');?>

    <div class="container_register" style="margin-top:10px">
      <h1>Registration Page</h1>
      <form action="" id="myform" method="post" enctype="multipart/form-data">
        <label for="first_name">First Name:</label>
        <input type="text" id="student_fname" name="student_fname" required />
        <br>
        <label for="last_name">Last Name:</label>
        <input type="text" id="student_lname" name="student_lname" required />
        <br>
        <label for="registration_number">Registration Number:</label>
        <input type="text" id="reg_no" name="reg_no" required />
        <br>
        <label for="email">Email:</label>
        <input type="email" id="student_email" name="student_email" required />
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required />
        <br>
        <label for="school">School:</label>
        <select id="school" name="school" onchange="populateSecondSelect(this.value);"required>
          <option value="">Select a School</option>
          <option value="School of Pure and Applied Sciences">School of Pure and Applied Sciences</option>
          <option value="School of Engineering">School of Engineering</option>
          <option value="School of Architecture"> School of Architecture</option>
        </select><br>
        <label for="dept">Department:</label>
        <select id="dept" name="dept" onchange="populateThirdSelect(this.value);"required>
          <option value="">Select a Department</option>
         
        </select><br>
        
        <label for="course">Course:</label>
        <select id="course" name="course" required>
          <option value="">Select a course</option>
          
        </select>
        
        <br><br><br><br>
        <button type="submit" >Register</button>
      </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script type=text/javascript src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js">
        </script>
            <script src="custom.js"></script>
  </body>
</html>
<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reg_no = $_POST["reg_no"];
    $student_fname = $_POST["student_fname"];
    $student_lname = $_POST["student_lname"];
    $student_email = $_POST["student_email"];
    $password = $_POST["password"];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $school = $_POST["school"];
    $dept = $_POST["dept"];
    $course = $_POST["course"];
    
    //email validation
    if (!filter_var($student_email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid Email!";
        exit;
    }

    // Insert data into the database
    $sql = "INSERT INTO students (reg_no, student_fname, student_lname, student_email, password, school, dept, course) 
    VALUES ('$reg_no', '$student_fname', '$student_lname', '$student_email', '$hashed_password', '$school', '$dept', '$course')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header('Location: all_students.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>