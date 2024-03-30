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
  button[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #174e80;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
    </style>
  </head>
  <body>
  <?php
require('admin_header.php');
?>
    <div class="container_register" style="margin-top:10px">
      <h2>Edit Lec Details</h2>
      <form action="" method="post" id="myform" enctype="multipart/form-data" >
      <?php
            include "connect.php";
            $lec_email=$_GET["lec_email"];
            $sql = "SELECT * FROM lecturers WHERE lec_email='$lec_email'";
        $result = $conn->query($sql);

        // Check if any rows were returned
        if ($result->num_rows > 0) {
            // Loop through each row and generate an <option> element
            while($row = $result->fetch_assoc()) {
                $lec_fname=$row["lec_fname"];
                $lec_lname=$row["lec_lname"];
                $PF_No=$row["PF_No"];
                $lec_email=$row["lec_email"];
                $password=$row["password"];
                $school=$row["school"];
                $dept=$row["dept"];
            }
        } else {
            echo "<label>No options available</label>";
        }
        ?>
        <label for="first_name">First Name:</label>
        <input type="text" id="lec_fname" name="lec_fname" value=<?php echo $lec_fname?> required />
        <br>
        <label for="last_name">Last Name:</label>
        <input type="text" id="lec_lname" name="lec_lname"value=<?php echo $lec_lname?> required />
        <br>
        <label for="PF_No">Lecutrer PF.No/ID No:</label>
        <input type="text" id="PF_No" name="PF_No" value=<?php echo $PF_No?> required />
        <br>
        <label for="email">Email:</label>
        <input type="email" id="lec_email" name="lec_email" value=<?php echo $lec_email?> required />
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="*****1ws"required />
        <br>
      
        <label for="school">School:</label>
        <select id="school" name="school" onchange="populateLecSelect(this.value);" required>
        <option value="<?php echo $school?>"><?php echo $school?></option>
          <option value="School of Pure and Applied Sciences">School of Pure and Applied Sciences</option>
          <option value="School of Engineering">School of Engineering</option>
          <option value="School of Architecture"> School of Architecture</option>
        </select>
        <label for="dept">Department:</label>
        <select id="dept" name="dept" required>
        <option value="<?php echo $dept?>"><?php echo $dept?></option>
          
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
        <br><br><br>
        <button type="submit" >Update</button>
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
    
    $original_password_query = mysqli_query($conn, "SELECT password FROM lecturers WHERE lec_email='$_GET[lec_email]'");
    $original_password_row = mysqli_fetch_assoc($original_password_query);
    $original_hashed_password = $original_password_row['password'];
    if ($password=="*****1ws") {
      // Use the original hashed password
      $hashed_password = $original_hashed_password;
  } else {
      // Hash the new password
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  }

    // UPDATE data into the database
    mysqli_query($conn, " UPDATE  lecturers SET PF_No='$PF_No', lec_fname='$lec_fname', lec_lname='$lec_lname', lec_email='$lec_email', 
    password='$hashed_password', school='$school', dept='$dept' WHERE lec_email='$_GET[lec_email]'");

    ?>
<script type="text/javascript">
 alert("Lecturer details updated successfully");
 window.location="all_lecturers.php";

</script>
<?php

 $conn->close();
}
?>