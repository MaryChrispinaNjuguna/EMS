<?php
include('fpdf/pdf_mc_table.php');
include('connect.php');


$pdf = new PDF_MC_Table();


$pdf->AddPage();


$pdf->SetWidths(Array(20, 43, 40, 25, 50, 17));
$pdf->SetLineHeight(7);


$pdf->SetFont('Arial', '', 11);
$school = isset($_GET["school"]) ? $_GET["school"] : '';
$dept = isset($_GET["dept"]) ? $_GET["dept"] : '';
$course = isset($_GET["course"]) ? $_GET["course"] : '';

// Start building the SQL query
$sql = "SELECT * FROM units";

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

$result = $conn->query($sql);
$query = mysqli_query($conn, $sql);
while ($data = mysqli_fetch_assoc($query)) {
    $pdf->Row(Array(
        $data['unitcode'],
        $data['unit_title'],
        $data['school'],
        $data['dept'],
        $data['course'],
        $data['offered'],
    ));
}

$pdf->Output();
?>
