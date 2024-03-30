<?php
session_start();

// Retrieve the data sent from exam
$reg_no = $_GET["regi_no"];
$unitcode = $_GET["unitcode3"];



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


$this->Cell(0, 6, 'KENYATTA UNIVERSITY', 0,0,'C');
$this->SetFont('Helvetica', '', 10);
$this->Cell(0, 7, 'DATE: ' . date('d-m-Y'), 0,1,'R');

$this->Cell(0, 7, 'P.O. BOX 43844-00100', 0,1,'C');
$this->Ln(1);
$this->Cell(190,0,'','T',1,'',true);

$this->SetFont('Helvetica', 'B', 11);
$this->Ln(3);
include('connect.php');

$reg_no = $_GET["regi_no"];

$query=mysqli_query($conn,"SELECT  * FROM students  WHERE reg_no='$reg_no'");
while($data=mysqli_fetch_array($query)){
	$this->Cell(40, 7, '', 0,0,'');
$this->Cell(65, 7, 'Registration Number: '.' '. $reg_no, 0,0,'C');
$this->Cell(40, 7, ' Name: '. $data['student_fname'] .' '. $data['student_lname'], 0,1,'C');}
include('connect.php');

$unitcode = $_GET["unitcode3"];

$query=mysqli_query($conn,"select unit_title from units where unitcode = '$unitcode'");
while($data=mysqli_fetch_array($query)){
$this->Cell(0, 7,  $unitcode.' '. $data['unit_title'], 0,1,'C');}
$query=mysqli_query($conn,"SELECT  * FROM results LEFT JOIN units ON results.unitcodef = units.unitcode WHERE reg_noF='$reg_no' AND 
unitcodeF='$unitcode'");
while($data=mysqli_fetch_array($query)){

$sql1="SELECT SUM(weight) AS sum_value FROM questions WHERE unitcodeF='$unitcode'";
$result1= $conn->query($sql1);
$row1 = $result1->fetch_assoc();
$sum_of_values = $row1['sum_value'];
$this->Cell(50, 7, '', 0,0,'');
$this->Cell(35, 7, 'Total Marks: '.' '. $data["marks"]."/" .$sum_of_values , 0,0,'C');
$marks=$data["marks"];
$total=($marks/$sum_of_values)*100;
$total = intval($total);
$this->Cell(35, 7, 'Percentage: '.' '. $total."%", 0,0,'C');
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

$this->Cell(30, 7, 'Grade: '.' '. $grade, 0,1,'');$this->Ln(5);


}
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
$unitcode = $_GET["unitcode3"];

$query=mysqli_query($conn,"select q_code, question, optionA, optionB, optionC, optionD, correct_option,
weight from questions where unitcodeF = '$unitcode'");
while($data=mysqli_fetch_array($query)){
$pdf->SetFont('Arial','B',11);
$reg_no = $_GET["regi_no"];
$selected="";
$sql=mysqlI_query($conn, "SELECT * FROM selected 
WHERE unitcodeF = '$unitcode' AND reg_noF='$reg_no' AND q_code='$data[q_code]'");
while($row=mysqli_fetch_array($sql)){
	$selected=$row['selected'];

}

	$optionA=$data['optionA'];
	$optionB=$data['optionB'];
	$optionC=$data['optionC'];
	$optionD=$data['optionD'];
	$correct_option=$data['correct_option'];
	$correct_option1="";
	//this is to convert the A or B to actual value of optionA or optionB
	$result =mysqli_query( $conn,"SELECT option".$correct_option." AS 'correct_option1'
	FROM questions WHERE unitcodeF='$unitcode' && q_code='$data[q_code]'"); 
	while($row1=mysqli_fetch_array($result))
	{
	 $correct_option1=$row1["correct_option1"];
	
	}

$pdf->Cell(18,7,'Question ',0,0,'');
$pdf->MultiCell(40,7,$data['q_code'],0,1,'');
$pdf->SetFont('Arial','',11);
$pdf->Cell(20,7,'Question: ',0,0,'');
$pdf->MultiCell(170,7,$data['question'],0,1,'');


$cellColorA = ($correct_option1 != $optionA && $selected == $optionA) ? [255, 0, 0] : (($correct_option1 == $optionA) ? [0, 255, 0] : [255, 255, 255]);
// Output option A with color
$pdf->SetFillColor($cellColorA[0], $cellColorA[1], $cellColorA[2]);
$pdf->Cell(20,7,'Option A: ',0,0,'',true);
$pdf->Cell(170,7,$data['optionA'],0,1,'',true);
$cellColorB = ($correct_option1 != $optionB && $selected == $optionB) ? [255, 0, 0] : (($correct_option1 == $optionB) ? [0, 255, 0] : [255, 255, 255]);
// Output option B with color
$pdf->SetFillColor($cellColorB[0], $cellColorB[1], $cellColorB[2]);
$pdf->Cell(20,7,'Option B: ',0,0,'',true);
$pdf->Cell(170,7,$data['optionB'],0,1,'',true);
$cellColorC = ($correct_option1 != $optionC && $selected == $optionC) ? [255, 0, 0] : (($correct_option1 == $optionC) ? [0, 255, 0] : [255, 255, 255]);
// Output option C with color
$pdf->SetFillColor($cellColorC[0], $cellColorC[1], $cellColorC[2]);
$pdf->Cell(20,7,'Option C: ',0,0,'',true);
$pdf->Cell(170,7,$data['optionC'],0,1,'',true);
$cellColorD = ($correct_option1 != $optionD && $selected == $optionD) ? [255, 0, 0] : (($correct_option1 == $optionD) ? [0, 255, 0] : [255, 255, 255]);
// Output option D with color
$pdf->SetFillColor($cellColorD[0], $cellColorD[1], $cellColorD[2]);
$pdf->Cell(20,7,'Option D: ',0,0,'',true);
$pdf->Cell(170,7,$data['optionD'],0,1,'',true);
$pdf->Cell(20,7,'Weight: ',0,0,'');
$pdf->Cell(40,7,$data['weight'],0,1,'');
$pdf->Ln(3);



}




$pdf->Output();


?>
