<?php  

require('FPDF/fpdf.php'); 
         $name="Leo";
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
$pdf->Ln(58);
$pdf->Cell(355);
$pdf-> Cell(0,13,utf8_decode($nombre),0,0,'L');//nombre
$pdf->SetFont('Times','',10);
$pdf->Ln(15);
$pdf->Cell(355);
$pdf->Cell(0,10,utf8_decode($regimen),0,0,'L');//regimen
$pdf->SetFont('Times','',10);
$pdf->Ln(22);
$pdf->Cell(355);
$pdf->Cell(0,10,utf8_decode('Lopez Mateos #8'),0,0,'L');//direccion
$pdf->Ln(12);
$pdf->Cell(355);
$pdf->Cell(0,10,utf8_decode($cp),0,0,'L');//direccion
$pdf->SetFont('Times','',10);
$pdf->Ln(10);
$pdf->Cell(355);
$pdf->Cell(0,10,utf8_decode('4371073134'),0,0,'L');//telefono
$pdf->SetFont('Times','',10);
$pdf->Ln(12);
$pdf->Cell(355);
$pdf->Cell(0,10,utf8_decode('dzexion11@gmail.com'),0,0,'L');//correo
$pdf->SetFont('Times','',10);
$pdf->Ln(21);
$pdf->Cell(385);
$pdf->Cell(70,10,utf8_decode('300'),0,0,'R');//Deposito
$pdf->SetFont('Times','',10);
$pdf->Ln(13);
$pdf->Cell(385);
$pdf->Cell(70,10,utf8_decode('400'),0,0,'R');//Subtotal
$pdf->SetFont('Times','',10);
$pdf->Ln(25);
$pdf->Cell(385);
$pdf->Cell(70,10,utf8_decode('100'),0,0,'R');//Total factura
$pdf->SetFont('Times','',10);
$pdf->Ln(11);
$pdf->Cell(385);
$pdf->Cell(70,10,utf8_decode('100'),0,0,'R');//Total debido
$pdf->SetFont('Times','',10);
$pdf->Ln(11);
$pdf->Cell(385);
$pdf->Cell(70,10,utf8_decode('183.40'),0,0,'R');//Subtotal

//variable que controla el salto de linea de las ultimas partes
$saltoLN=386-35;
$fecha= date("d/m/Y");
//parte de los productos
$pdf->SetFont('Times','',10);
$pdf->Ln(35);
$pdf->Cell(45);
$pdf->Cell(70,10,utf8_decode($fecha),0,0,'L');//Fecha
$pdf->SetFont('Times','',10);
$pdf->Cell(45);
$pdf->Cell(70,10,utf8_decode('Tarjeta Grafica ASUS ROG'),0,0,'L');//Total debido
$pdf->SetFont('Times','',10);
$pdf->Cell(185);
$pdf->Cell(70,10,utf8_decode('183.40'),0,0,'L');//Subtotal


//parte baja de la factura subtotal,impuesto y total
$pdf->SetFont('Times','',10);
$pdf->Ln($saltoLN);
$pdf->Cell(385);
$pdf->Cell(70,10,utf8_decode('100'),0,0,'R');//Total factura
$pdf->SetFont('Times','',10);
$pdf->Ln(11);
$pdf->Cell(385);
$pdf->Cell(70,10,utf8_decode('100'),0,0,'R');//Total debido
$pdf->SetFont('Times','',10);
$pdf->Ln(12);
$pdf->Cell(385);
$pdf->Cell(70,10,utf8_decode('183.40'),0,0,'R');//Subtotal


//Loading data 
$pdf->SetTopMargin(20); $pdf->SetLeftMargin(20); $pdf->SetRightMargin(20); 




$pdf->Output(); 

?> 

