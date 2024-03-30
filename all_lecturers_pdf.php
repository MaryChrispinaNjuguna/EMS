<?php
include('fpdf/pdf_mc_table1.php');
include('connect.php');


$pdf = new PDF_MC_Table();


$pdf->AddPage();


$pdf->SetWidths(Array(25, 40, 50, 50, 30,));
$pdf->SetLineHeight(7);


$pdf->SetFont('Arial', '', 11);
$school = isset($_GET["school"]) ? $_GET["school"] : '';
$dept = isset($_GET["dept"]) ? $_GET["dept"] : '';

// Start building the SQL query
$sql = "SELECT * FROM lecturers";

// Check if school is not empty
if (!empty($school)) {
    $sql .= " WHERE school = '$school'";
    
    // If $dept is not empty, include it in the query
    if (!empty($dept)) {
        $sql .= " AND dept = '$dept'";
    }
    
   
}
$query = mysqli_query($conn, $sql);
while ($data = mysqli_fetch_assoc($query)) {
    $pdf->Row(Array(
        $data['PF_No'],
        $data['lec_fname']." ".$data['lec_lname'],
        $data['lec_email'],
        $data['school'],
        $data['dept'],
    ));
}

$pdf->Output();
?>
