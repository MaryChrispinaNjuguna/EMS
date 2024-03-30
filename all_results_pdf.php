<?php
session_start();

// Retrieve the data sent from exam


require('fpdf/fpdf.php');
include('connect.php');

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm


class PDF extends FPDF 
{

	function header()
{
$this->SetFont('Helvetica', 'B', 14);

$this->Cell(0,3,'',0,1,'C');

$this->Image('logo2.png',100,3,10);


$this->Cell(0, 7, 'KENYATTA UNIVERSITY', 0,0,'C');
$this->SetFont('Helvetica', '', 10);
$this->Cell(0, 7, 'DATE: ' . date('d-m-Y'), 0,1,'R');

$this->Cell(0, 7, 'P.O. BOX 43844-00100', 0,1,'C');
$this->Ln(1);
$this->Cell(190,0,'','T',1,'',true);

$this->SetFont('Helvetica', 'B', 11);
$this->Ln(3);
$this->Cell(0, 7, 'STUDENT RESULTS', 0,1,'C');
$this->Ln(2);

$this->SetFillColor(193,193,193);
$this->SetDrawColor(50,54,57);
$this->Cell(22,10,'Reg No',1,0,'',true);
$this->Cell(35,10,'Name',1,0,'',true);
$this->Cell(20,10,'Unit Code',1,0,'',true);
$this->Cell(65,10,'Unit Title',1,0,'',true);
$this->Cell(20,10,'Questions',1,0,'C',true);
$this->Cell(21,10,'Percentage',1,0,'C',true);
$this->Cell(15,10,'Grade',1,1,'C',true);



}
	function footer()
{
$this->SetY(-15);
$this->SetFont('Helvetica','',8);
		
//width = 0 means the cell is extended up to the right margin
$this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');

}
}

$pdf = new PDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','',11);
$pdf->SetFillColor(193,193,193);
$pdf->SetDrawColor(50,54,57);

$school = $_GET["school"];
$dept = isset($_GET["dept"]) ? $_GET["dept"] : '';
$course = isset($_GET["course"]) ? $_GET["course"] : '';

// Start building the SQL query
$sql = "SELECT  * FROM results LEFT JOIN units ON results.unitcodeF = units.unitcode 
LEFT JOIN students ON results.reg_noF = students.reg_no  ";    
// If $dept is not empty, include it in the query
if (!empty($school)) {
    $sql .= " WHERE units.school = '$school'";
    
    // If $dept is not empty, include it in the query
    if (!empty($dept)) {
        $sql .= " AND units.dept = '$dept'";
    }
    
    // If $course is not empty, include it in the query
    if (!empty($course)) {
        $sql .= " AND units.course = '$course'";
    }
}
$query = mysqli_query($conn, $sql);

while($data=mysqli_fetch_array($query)){

$pdf->Cell(22,10,$data['reg_no'],1,0,'');
$pdf->Cell(35,10,$data['student_fname'] .' '. $data['student_lname'],1,0,'');
$pdf->Cell(20,10,$data['unitcodeF'],1,0,'');
$pdf->Cell(65,10,$data['unit_title'],1,0,'');
$pdf->Cell(20,10,$data['total_questions'],1,0,'C');
$sql1="SELECT SUM(weight) AS sum_value FROM questions WHERE unitcodeF='$data[unitcodeF]'";
$result1= $conn->query($sql1);
$row1 = $result1->fetch_assoc();
$sum_of_values = $row1['sum_value'];
$marks=$data["marks"];
$total=($marks/$sum_of_values)*100;
$total = intval($total);
$pdf->Cell(21,10,$total."%",1,0,'C');
	// Define the grading thresholds
$gradeA = 70;
$gradeB = 60;
$gradeC = 50;
$gradeD = 40;

// Calculate the grade based on the total score
if ($total >= $gradeA) {
	$grade = 'A';
} elseif ($total >= $gradeB) {
	$grade = 'B';
} elseif ($total >= $gradeC) {
	$grade = 'C';
} elseif ($total >= $gradeD) {
	$grade = 'D';
} else {
	$grade = 'E';
}

$pdf->Cell(15,10,$grade,1,1,'C');

}


$pdf->Output();


?>
