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
    <?php
    include('connect.php');
    $reg_no=$_GET['regi_no'];
    $sql = "SELECT  * FROM students WHERE reg_no='$reg_no'";
    $result = $conn->query($sql);

   // Check if there are rows in the result set
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
      $student_fname=$row["student_fname"];
      $student_lname=$row["student_lname"];
      $student_email=$row["student_email"];
      $school=$row["school"];
      $dept=$row["dept"];
      $course=$row["course"];

    }}   
    ?>
    <div class="container_register" style="margin-top:10px">
      <h2>Edit Student Details</h2>
      <form action="" id="myform" method="post" enctype="multipart/form-data">
        <label for="first_name">First Name:</label>
        <input type="text" id="student_fname" name="student_fname" value="<?php echo $student_fname?>" required />
        <br>
        <label for="last_name">Last Name:</label>
        <input type="text" id="student_lname" name="student_lname" value="<?php echo $student_lname?>" required />
        <br>
        <label for="registration_number">Registration Number:</label>
        <input type="text" id="reg_no" name="reg_no" value="<?php echo $reg_no?>" required  />
        <br>
        <label for="email">Email:</label>
        <input type="email" id="student_email" name="student_email" value="<?php echo $student_email?>" required />
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"value="*****1sa"  required />
        <br>
        <label for="school">School:</label>
        <select id="school" name="school" onchange="populateSecondSelect(this.value);"required>
          <option value="<?php echo $school?>"><?php echo $school?></option>
          <option value="School of Pure and Applied Sciences" <?php if ($school == 'School of Pure and Applied Sciences') echo 'selected'; ?>>School of Pure and Applied Sciences</option>
          <option value="School of Engineering" <?php if ($school == 'School of Engineering') echo 'selected'; ?>>School of Engineering</option>
          <option value="School of Architecture" <?php if ($school == 'School of Architecture') echo 'selected'; ?>> School of Architecture</option>
        </select>
        <br>
        <label for="dept">Department:</label>
        <select id="dept" name="dept" onchange="populateThirdSelect(this.value);"required>
          <option value="<?php echo $dept?>"><?php echo $dept?></option>
         
        </select>
        <br>
        <label for="course">Course:</label>
        <select id="course" name="course" required>
          <option value="<?php echo $course?>"><?php echo $course?></option>
          
        </select>
        
        <br><br><br><br>
        <button type="submit" >UPDATE</button>
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
    
    $original_password_query = mysqli_query($conn, "SELECT password FROM students WHERE reg_no='$_GET[regi_no]'");
    $original_password_row = mysqli_fetch_assoc($original_password_query);
    $original_hashed_password = $original_password_row['password'];
    if ($password=="*****1sa") {
      // Use the original hashed password
      $hashed_password = $original_hashed_password;
  } else {
      // Hash the new password
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  }

    // update data into the database
    mysqli_query($conn, " UPDATE  students SET reg_no='$reg_no', student_fname='$student_fname', student_lname='$student_lname', 
    student_email='$student_email', password='$hashed_password', school='$school', dept='$dept', course='$course' WHERE reg_no='$_GET[regi_no]'");

?>
<script type="text/javascript">
 alert("student details updated successfully");
 window.location="all_students.php";

</script>
<?php

 $conn->close();
}
?>