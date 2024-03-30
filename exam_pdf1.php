<?php
session_start();

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
$this->Cell(100, 7, 'Examinations', 0,0,'C');
$lec_email = $_GET["lec_email"];
include('connect.php');
$query=mysqli_query($conn,"SELECT  * FROM lecturers  WHERE lec_email='$lec_email'");
while($data=mysqli_fetch_array($query)){
$this->Cell(0, 7, "Lecturer:" .' '. $data['lec_fname']." ".$data['lec_lname'], 0,1,'C');}
$this->Ln(5);

$this->SetFillColor(193,193,193);
$this->SetDrawColor(50,54,57);
$this->Cell(40,10,'Unit Code',1,0,'',true);
$this->Cell(85,10,'Unit Title',1,0,'',true);
$this->Cell(40,10,'Total Questions',1,0,'C',true);
$this->Cell(25,10,'Time Limit',1,1,'C',true);

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
$lec_email = $_GET["lec_email"];
$query=mysqli_query($conn,"select * from exams LEFT JOIN units ON exams.unitcode = units.unitcode WHERE lec_emailF='$lec_email'");
while($data=mysqli_fetch_array($query)){
$pdf->Cell(40,10,$data['unitcode'],1,0,'');
$pdf->Cell(85,10,$data['unit_title'],1,0,'');
$sql1="SELECT * FROM questions WHERE unitcodeF='$data[unitcode]'";
$result1= $conn->query($sql1);
$no_of_questions = mysqli_num_rows($result1);
$pdf->Cell(40,10,$no_of_questions,1,0,'C');
$pdf->Cell(25,10,$data['time_limit'],1,1,'C');

}


$pdf->Output();


?>
