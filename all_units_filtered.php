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
                <th>Unit Code</th>
                <th>Unit Title</th>
                <th>School</th>
                <th>Department</th>
                <th>Course</th>
                <th>Offered</th>
                <th>Edit   </th>
                <th>Delete   </th>

            </tr>
    <?php
    // Include the database connection file
    include('connect.php');

    // SQL query to select data from the table
    $school = $_GET["school"];
    $dept = isset($_GET["dept"]) ? $_GET["dept"] : '';
    $course = isset($_GET["course"]) ? $_GET["course"] : '';
    
    // Start building the SQL query
    $sql = "SELECT * FROM units WHERE school = '$school'";
    
    // If $dept is not empty, include it in the query
    if (!empty($dept)) {
        $sql .= " AND dept = '$dept'";
    }
    
    // If $course is not empty, include it in the query
    if (!empty($course)) {
        $sql .= " AND course = '$course'";
    }    $result = $conn->query($sql);

   // Check if there are rows in the result set
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        ?>
       <div id="info"> 
          <tr>
          <td><?php echo $row["unitcode"] ?></td>
          <td><?php echo $row["unit_title"] ?></td>
          <td> <?php echo  $row["school"] ?></td>
          <td> <?php echo  $row["dept"] ?></td>
          <td> <?php echo  $row["course"] ?></td>
          <td> <?php echo  $row["offered"] ?></td>
          <td><a href = "admin_edit_unit.php?unitcode=<?php echo $row['unitcode'] ?>" > <i class="material-icons" style= "font-size:30px; color:#00b1eb">
          create</i></a></td>
          <td><a href = "unit_delete.php?unitcode=<?php echo $row['unitcode'] ?>"><i class="material-icons" style= "font-size:30px; color:red">
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