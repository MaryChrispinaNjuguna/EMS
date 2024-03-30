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

    <div class="container_register">
      <h1>Registration Page</h1>
      <form action="" id="myform" method="post" enctype="multipart/form-data" >
        <label for="first_name">First Name:</label>
        <input type="text" id="lec_fname" name="lec_fname" required />
        <br>
        <label for="last_name">Last Name:</label>
        <input type="text" id="lec_lname" name="lec_lname" required />
        <br>
        <label for="PF_No">Lecutrer PF.No/ID No:</label>
        <input type="text" id="PF_No" name="PF_No" required />
        <br>
        <label for="email">Email:</label>
        <input type="email" id="lec_email" name="lec_email" required />
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required />
        <br>
        <label for="school">School:</label>
        <select id="school" name="school" onchange="populateLecSelect(this.value);" required>
          <option value="">Select a School</option>
          <option value="School of Pure and Applied Sciences">School of Pure and Applied Sciences</option>
          <option value="School of Engineering">School of Engineering</option>
          <option value="School of Architecture"> School of Architecture</option>
        </select>
        <label for="dept">Department:</label>
        <select id="dept" name="dept" required>
          <option value="">Select a Department</option>
          
        </select>
        <script>
        function populateLecSelect(selectedOption) {
    var dept = document.getElementById('dept');

    // Clear the options of the dept dropdown
    dept.options.length = 1;

    // Clear the options of the course dropdown
    
    if (selectedOption === 'School of Pure and Applied Sciences') {
        dept.options.add(new Option('Mathematics'));
        dept.options.add(new Option('CIT'));
    } else if (selectedOption === 'School of Engineering') {
        dept.options.add(new Option(' Electrical'));
        dept.options.add(new Option('Civil'));
    }
    else if (selectedOption === 'School of Architecture') {
        dept.options.add(new Option('Architecture'));
        dept.options.add(new Option('Planning'));
    }
}
        </script>
          
        </select><br><br><br><br>
        
        <button type="submit" style="width:100%" >Register</button>
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
    $PF_No = $_POST["PF_No"];
    $lec_fname = $_POST["lec_fname"];
    $lec_lname = $_POST["lec_lname"];
    $lec_email = $_POST["lec_email"];
    $password = $_POST["password"];
    // Hash the user's password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $school = $_POST["school"];
    $dept = $_POST["dept"];
    
    

    // Insert data into the database
    $sql = "INSERT INTO lecturers (PF_No, lec_fname, lec_lname, lec_email, password, school, dept) 
    VALUES ('$PF_No', '$lec_fname', '$lec_lname', '$lec_email', '$hashed_password', '$school', '$dept')";

if ($conn->query($sql) === TRUE) {
  echo "<script>alert('User registered successfully'); window.location.href=('all_lecturers.php');</script>";
  exit;
} else {
  echo "<script>alert('Error: " . $sql . "\\n" . $conn->error . "');</script>";
}

    $conn->close();
}
?>