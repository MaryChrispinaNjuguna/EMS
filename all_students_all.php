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
<table class="table">
            <tr>
                <th>Registration Number</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>School</th>
                <th>Department</th>
                <th>Course</th>
                <th>Edit   </th>
                <th>Delete   </th>

            </tr>
    <?php
    // Include the database connection file
    include('connect.php');

    // SQL query to select data from the table
    $sql = "SELECT  * FROM students ";
    $result = $conn->query($sql);

   // Check if there are rows in the result set
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        ?>
       <div id="info"> 
          <tr>
          <td><?php echo $row["reg_no"] ?></td>
          <td><?php echo  $row["student_fname"] ." ".$row["student_lname"]?></td>
          <td> <?php echo  $row["student_email"] ?></td>
          <td> <?php echo  $row["school"] ?></td>
          <td> <?php echo  $row["dept"] ?></td>
          <td> <?php echo  $row["course"] ?></td>
          <td><a href = "admin_edit_student.php?regi_no=<?php echo $row['reg_no']?>"> <i class="material-icons" style= "font-size:30px; color:#00b1eb">
          create</i></a></td>
          <td><a href = "student_delete.php?regi_no=<?php echo $row['reg_no']?>" ><i class="material-icons" style= "font-size:30px; color:red">
          delete</i></a></td>

          </tr>
       </div>
          <?php
      }
      
  }
  
  else {
    ?>
      <tr><td colspan='3'>0 results</td></tr>
      <?php
  }
  ?>
 </table>