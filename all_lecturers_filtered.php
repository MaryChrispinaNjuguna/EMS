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
                <th>PF NO/ID NO</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>School</th>
                <th>Department</th>
                <th>Edit   </th>
                <th>Delete   </th>

            </tr>
    <?php
    // Include the database connection file
    include('connect.php');

    // SQL query to select data from the table
    $school = $_GET["school"];
    $dept = isset($_GET["dept"]) ? $_GET["dept"] : '';
    
    // Start building the SQL query
    $sql = "SELECT * FROM lecturers WHERE school = '$school'";
    
    // If $dept is not empty, include it in the query
    if (!empty($dept)) {
        $sql .= " AND dept = '$dept'";
    }
    $result = $conn->query($sql);

   // Check if there are rows in the result set
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        ?>
       <div id="info"> 
          <tr>
          <td><?php echo $row["PF_No"] ?></td>
          <td><?php echo  $row["lec_fname"] ." ".$row["lec_lname"]?></td>
          <td> <?php echo  $row["lec_email"] ?></td>
          <td> <?php echo  $row["school"] ?></td>
          <td> <?php echo  $row["dept"] ?></td>
          <td><a href = "admin_edit_lec.php?lec_email=<?php echo $row["lec_email"]?>" > <i class="material-icons" style= "font-size:30px; color:#00b1eb">
          create</i></a></td>
          <td><a href = "lec_delete.php?lec_email=<?php echo $row["lec_email"]?>" ><i class="material-icons" style= "font-size:30px; color:red">
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