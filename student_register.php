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
    display: inline;
    color: #f00;
    font-size: 12px;
  }label{
    width:190px;
  }
  </style>
  </head>
  <body>
  <?php require "header.php";?>

    <div class="container_register">
      <h1>Student Registration </h1>
      <form action=""id="myform" method="post" enctype="multipart/form-data"  >
        <label for="first_name">First Name:</label>
        <input type="text" id="student_fname" name="student_fname" required /><br>
        
        <label for="last_name">Last Name:</label>
        <input type="text" id="student_lname" name="student_lname" required /><br>
        
        <label for="registration_number">Registration Number:</label>
        <input type="text" id="reg_no" name="reg_no" placeholder="eg 0807/2020" required /><br>
        
        <label for="email">Email:</label>
        <input type="email" id="student_email" name="student_email" required /><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required /><br>

        <label for="school">School:</label>
        <select id="school" name="school" onchange="populateSecondSelect(this.value);"required>
          <option value="">Select a School</option>
          <option value="School of Pure and Applied Sciences">School of Pure and Applied Sciences</option>
          <option value="School of Engineering">School of Engineering</option>
          <option value="School of Architecture"> School of Architecture</option>
        </select><br>
        <label for="dept">Department:</label>
        <select id="dept" name="dept" onchange="populateThirdSelect(this.value);"required>
          <option value="">Select a Department</option><br>
         
        </select><br>
        
        <label for="course">Course:</label>
        <select id="course" name="course" required>
          <option value="">Select a course</option><br>
          
        </select>
        <label for="semester">Semester</label>
        <select id="semester" name="semester" required>
          <option value="">Select Current Semester</option>
          <option value="1.1">Year1 Semester1</option>
          <option value="1.2">Year1 Semester2</option>
          <option value="2.1">Year2 Semester1</option>
          <option value="2.2">Year2 Semester2</option>
          <option value="3.1">Year3 Semester1</option>
          <option value="3.2">Year3 Semester2</option>
          <option value="4.1">Year4 Semester1</option>
          <option value="4.2">Year4 Semester2</option>

        </select>
        
        <br>
        <br>
        <button type="submit" >Register</button> <br><br>
       
      </form>
      <p>Already have an account? <a href="student_login.php">Login</a></p>
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
    $semester = $_POST["semester"];
    
    //email validation
   
    $sql = "INSERT INTO students (reg_no, student_fname, student_lname, student_email, password, school, dept, course,semester) 
    VALUES ('$reg_no', '$student_fname', '$student_lname', '$student_email', '$hashed_password', '$school', '$dept', '$course','$semester')";

if ($conn->query($sql) === TRUE) {
  echo "<script>alert('User registered successfully'); window.location.href=('student_login.php');</script>";
  exit;
} else {
  echo "<script>alert('Error: " . $sql . "\\n" . $conn->error . "');</script>";
}


    $conn->close();
}
?>