<?php


$patient_name=$_POST['patient_name'];
$patient_age=$_POST['patient_age'];
$patient_sex=$_POST['patient_sex'];
$patient_date=$_POST['patient_date'];
$patient_text1=$_POST['patient_text1'];
$patient_text2=$_POST['patient_text2'];
$doctor_name=$_POST['doctor_name'];
$doctor_email=$_POST['doctor_email'];
$doctor_bmdc=$_POST['doctor_bmdc'];
$doctor_phone=$_POST['doctor_phone'];

?>
       
<?PHP

require('fpdf.php');

$pdf = new FPDF();
$pdf->AddPage('P', 'A4');
$pdf->SetAutoPageBreak(true, 10);
$pdf->SetFont('Arial', '', 12);
$pdf->SetTopMargin(10);
$pdf->SetLeftMargin(10);
$pdf->SetRightMargin(10);


/* --- Text --- */
$pdf->SetFont('Arial', '', 40);
$pdf->Text(64, 28, 'e-Prescription');
/* --- Text --- */
$pdf->SetFontSize(14);
$pdf->Text(12, 65, 'Patient Name: '.$patient_name);
/* --- Text --- */
$pdf->Text(126, 65, 'Patient Age: '.$patient_age);
/* --- Text --- */
$pdf->Text(128, 95, 'Date: '.$patient_date);
/* --- Text --- */
$pdf->Text(13, 95, 'Patient Sex: '.$patient_sex);
/* --- Text --- */
$pdf->Text(40, 126, $patient_text1);


/* --- Text --- */
$pdf->SetFontSize(40);
$pdf->Text(17, 133, 'R');
/* --- Text --- */
$pdf->SetFontSize(32);
$pdf->Text(27, 143, 'X');
/* --- Text --- */
$pdf->SetFontSize(14);
$pdf->Text(5, 169, $patient_text2);
/* --- Text --- */
$pdf->Text(125, 243, 'Doctor Name: '.$doctor_name);
/* --- Text --- */
$pdf->Text(18, 243, 'Doctor Email: '.$doctor_email);
/* --- Text --- */
$pdf->SetFontSize(14);
$pdf->Text(125, 278, 'Doctor BMDC: '.$doctor_bmdc);
/* --- Text --- */
$pdf->SetFontSize(14);
$pdf->Text(18, 278, 'Doctor Phone: '.$doctor_phone);

/* --- Line --- */
$pdf->Line(10, 40, 200, 40);
/* --- Line --- */
$pdf->Line(10, 107, 200, 107);
/* --- Line --- */
$pdf->Line(10, 218, 200, 218);

$pdf->Output('created_pdf.pdf','I');
?>