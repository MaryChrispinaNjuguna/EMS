<?php
session_start();

// Retrieve the data sent from exam
$unitcode = $_GET["unitcode"];


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
include('connect.php');

$unitcode = $_GET["unitcode"];

$query=mysqli_query($conn,"select unit_title from units where unitcode = '$unitcode'");
while($data=mysqli_fetch_array($query)){
$this->Cell(120, 7,  $unitcode.' '. $data['unit_title'], 0,0,'C');}

$query2=mysqli_query($conn,"select * from exams LEFT JOIN lecturers ON
 exams.lec_emailF=lecturers.lec_email where unitcode = '$unitcode'");
while($data=mysqli_fetch_array($query2)){
$this->Cell(100, 7,  "Lecturer:".' '. $data['lec_fname']. " ".$data['lec_lname'], 0,1);}

$this->Ln(5);



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

$query=mysqli_query($conn,"select q_code, question, optionA, optionB, optionC, optionD, correct_option,
weight from questions where unitcodeF = '$unitcode'");
while($data=mysqli_fetch_array($query)){
$pdf->SetFont('Arial','B',11);
$pdf->Cell(18,7,'Question ',0,0,'');

$pdf->MultiCell(40,5,$data['q_code'],0,1,'');
$pdf->SetFont('Arial','',11);
$pdf->Cell(20,7,'Question: ',0,0,'');
$pdf->MultiCell(170,5,$data['question'],0,1,'');
$pdf->Cell(20,7,'Option A: ',0,0,'');
$pdf->Cell(40,7,$data['optionA'],0,1,'');
$pdf->Cell(20,7,'Option B: ',0,0,'');
$pdf->Cell(40,7,$data['optionB'],0,1,'');
$pdf->Cell(20,7,'Option C: ',0,0,'');
$pdf->Cell(40,7,$data['optionC'],0,1,'');
$pdf->Cell(20,7,'Option D: ',0,0,'');
$pdf->Cell(40,7,$data['optionD'],0,1,'');
$pdf->Cell(30,7,'Correct Answer: ',0,0,'');
$pdf->Cell(40,7,$data['correct_option'],0,1,'');
$pdf->Cell(20,7,'Weight: ',0,0,'');
$pdf->Cell(40,7,$data['weight'],0,1,'');
$pdf->Ln(3);



}


$pdf->Output();


?>
