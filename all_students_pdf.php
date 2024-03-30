<?php
include('fpdf/pdf_mc_table2.php');
include('connect.php');


$pdf = new PDF_MC_Table();


$pdf->AddPage();


$pdf->SetWidths(Array(23, 25, 30, 40,20, 40, 15));
$pdf->SetLineHeight(7);


$pdf->SetFont('Arial', '', 11);
$school = isset($_GET["school"]) ? $_GET["school"] : '';
$dept = isset($_GET["dept"]) ? $_GET["dept"] : '';
$course = isset($_GET["course"]) ? $_GET["course"] : '';

// Start building the SQL query
$sql = "SELECT * FROM students";

// Check if school is not empty
if (!empty($school)) {
    $sql .= " WHERE school = '$school'";
    
    // If $dept is not empty, include it in the query
    if (!empty($dept)) {
        $sql .= " AND dept = '$dept'";
    }
    
    // If $course is not empty, include it in the query
    if (!empty($course)) {
        $sql .= " AND course = '$course'";
    }
}
$query = mysqli_query($conn, $sql);
while ($data = mysqli_fetch_assoc($query)) {
    $pdf->Row(Array(
        $data['reg_no'],
        $data['student_fname']." ".$data['student_lname'],
        $data['student_email'],
        $data['school'],
        $data['dept'],
        $data['course'],
        $data['semester'],
    ));
}

$pdf->Output();
?>
