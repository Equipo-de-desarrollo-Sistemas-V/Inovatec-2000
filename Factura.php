<?php  

require('FPDF/fpdf.php'); 
         $name="leo";
         $id="12";
         $fullname="Leobardo";
         class PDF extends FPDF

{ 

function Footer() 
{ 

$this->SetY(-27); 
$this->SetFont('Arial','I',8); 

$this->Cell(0,10,'This certificate has been ©  © produced by thetutor',0,0,'R'); 
} 
} 

$pdf = new FPDF('P','pt','A4'); 
$nombre=$_POST["nombreDenominación"];
$regimen=$_POST["regimenFiscal"];
$cp=$_POST["codigoPostal"];
$uso=$_POST["usoComprobante"];
$pdf->AddPage(); 
//  Print the edge of
$pdf->Image("Facturas/FacturaImg.png", 20, 20, 540); 
$pdf->SetFont('Times','',10);
$pdf->Ln(45);
$pdf->Cell(530,10,'Leobardo Daniel Miramontes Murillo',0   ,1,'R');
//Loading data 
$pdf->SetTopMargin(20); $pdf->SetLeftMargin(20); $pdf->SetRightMargin(20); 




$pdf->Output(); 

?> 

