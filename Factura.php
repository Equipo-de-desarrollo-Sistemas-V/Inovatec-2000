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
//pruebas item=a%3A2%3A%7Bi%3A0%3Ba%3A2%3A%7Bi%3A0%3Bs%3A4%3A"3050"%3Bi%3A1%3Bs%3A3%3A"820"%3B%7Di%3A1%3Ba%3A2%3A%7Bi%3A0%3Bs%3A1%3A"3"%3Bi%3A1%3Bs%3A1%3A"2"%3B%7D%7D
$pdf = new FPDF('P','pt','A4'); 
$arre=$_GET["item"];
$array_para_recibir_via_url = urldecode($arre);
$matriz_completa = unserialize($array_para_recibir_via_url);

$nombre=$_POST["nombreDenominación"];
$regimen=$_POST["regimenFiscal"];
$cp=$_POST["codigoPostal"];
$uso=$_POST["usoComprobante"];
$direccion=$_POST["direccion"];
$correo=$_POST["email"];
$telefono=$_POST["telefono"];


//datos articulo
/*$articulo=$_POST["art"];
$cantidad=$_POST["can"];
$precio=$_POST["pre"];
$total=$_POST["tot"];*/

//datos de bd
$serverName='inovatecserver.database.windows.net';
$connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
$conn_sis=sqlsrv_connect($serverName, $connectionInfo);
$numPro=count($matriz_completa);
//echo '<script>alert("'.$numPro.'")</script>';
$totDeCompra=0;
for($i=0;$i<$numPro-1;$i=$i+2) {
    $idProd=$matriz_completa[$i];                        //id del producto
    $cantiProd=$matriz_completa[$i+1];                     //cantidad que se va a comprar
    //echo'<script>alert("'.$idProd.'")</script>';
    //echo'<script>alert("'.$cantiProd.'")</script>';
    $query= "SELECT nombre, precio_ven,descuento
    FROM Productos 
    where id_producto ='".$idProd."'";
    $resultado=sqlsrv_query($conn_sis, $query);
    $row = sqlsrv_fetch_array($resultado);
    $nomProd=$row['nombre'];                      //nombre del prodcuto
    $precio=substr($row['precio_ven'],0,-2);      //precio de venta
    $descuento=$row['descuento'];                                 // descuento en pesos
    $subT=$precio*((int)$cantiProd);                //subtotal a pagar por producto
    $totProd=$subT-$descuento;                    //
    $totDeCompra+=$totProd;
}
//echo'<script>alert("'.$totDeCompra.'")</script>';
//formula iva
$precionfinal=$totDeCompra;
$antesImpuestos=($precionfinal*1)/1.16;
$antesImpuestosFormateado = number_format($antesImpuestos, 2, '.', '');
$pdf->AddPage();

//  Print the edge of

$pdf->Image("Facturas/FacturaImg.png", 20, 20, 540);
$pdf->SetFont('Times','',10);
$pdf->Ln(65);
$pdf->Cell(388);
$pdf-> Cell(0,13,utf8_decode($nombre),0,0,'L');//nombre
$pdf->SetFont('Times','',10);
$pdf->Ln(15);
$pdf->Cell(388);
$pdf->Cell(0,10,utf8_decode($regimen),0,0,'L');//regimen
$pdf->SetFont('Times','',10);
$pdf->Ln(22);
$pdf->Cell(388);
$pdf->Cell(0,10,utf8_decode($direccion),0,0,'L');//direccion
$pdf->Ln(12);
$pdf->Cell(388);
$pdf->Cell(0,10,utf8_decode($cp),0,0,'L');//direccion
$pdf->SetFont('Times','',10);
$pdf->Ln(10);
$pdf->Cell(388);
$pdf->Cell(0,10,utf8_decode($telefono),0,0,'L');//telefono
$pdf->SetFont('Times','',10);
$pdf->Ln(12);
$pdf->Cell(388);
$pdf->Cell(0,10,utf8_decode($correo),0,0,'L');//correo
$pdf->SetFont('Times','',10);
$pdf->Ln(23);
$pdf->Cell(385);
$pdf->Cell(70,10,utf8_decode($precionfinal),0,0,'R');//Deposito
$pdf->SetFont('Times','',10);
$pdf->Ln(13);
$pdf->Cell(385);

$pdf->Cell(70,10,utf8_decode($antesImpuestosFormateado),0,0,'R');//Subtotal
$pdf->SetFont('Times','',10);
$pdf->Ln(25);
$pdf->Cell(385);
$pdf->Cell(70,10,utf8_decode($precionfinal),0,0,'R');//Total factura
$pdf->SetFont('Times','',10);
$pdf->Ln(11);
$pdf->Cell(385);
$pdf->Cell(70,10,utf8_decode('0.00'),0,0,'R');//Total debido
$pdf->SetFont('Times','',10);
$pdf->Ln(11);
$pdf->Cell(385);
$pdf->Cell(70,10,utf8_decode($precionfinal),0,0,'R');//Subtotal
$saltoLN=398-38;
$fecha= date("d/m/Y");
$pdf->Ln(38);
//parte de los productos
for($i=0;$i<$numPro-1;$i=$i+2) {
    $idProd=$matriz_completa[$i];                        //id del producto
    $cantiProd=$matriz_completa[$i+1];                     //cantidad que se va a comprar
    //echo'<script>alert("'.$idProd.'")</script>';
    //echo'<script>alert("'.$cantiProd.'")</script>';
    $query= "SELECT nombre, precio_ven,descuento
    FROM Productos 
    where id_producto ='".$idProd."'";
    $resultado=sqlsrv_query($conn_sis, $query);
    $row = sqlsrv_fetch_array($resultado);
    $nomProd=$row['nombre'];                      //nombre del prodcuto
    $precio=substr($row['precio_ven'],0,-2);      //precio de venta
    $descuento=$row['descuento'];                                 // descuento en pesos
    $subT=$precio*((int)$cantiProd);                //subtotal a pagar por producto
    $totProd=$subT-$descuento;
    $pdf->SetFont('Times','',10);
    
    $pdf->Cell(5);
    $pdf->Cell(70,10,utf8_decode($fecha),0,0,'L');//Fecha
    $pdf->SetFont('Times','',10);
    $pdf->Cell(23);
    $pdf->Cell(50,10,utf8_decode($cantiProd),0,0,'L');//Fecha
    $pdf->SetFont('Times','',10);
    $pdf->Cell(.1);
    $pdf->Cell(60,10,utf8_decode($nomProd),0,0,'L');//Total debido
    $pdf->SetFont('Times','',10);
    $pdf->Cell(185);
    $pdf->Cell(70,10,utf8_decode($subT),0,0,'L');//Subtotal
    $pdf->Ln(15);
    $saltoLN-=15; 
}
//variable que controla el salto de linea de las ultimas partes



//parte baja de la factura subtotal,impuesto y total
$pdf->SetFont('Times','',10);
$pdf->Ln($saltoLN);
$pdf->Cell(385);
$pdf->Cell(70,10,utf8_decode($antesImpuestosFormateado),0,0,'R');//Subtotal
$pdf->SetFont('Times','',10);
$pdf->Ln(11);
$pdf->Cell(385);
$impuestos= number_format(($precionfinal-$antesImpuestos), 2, '.', '');
$pdf->Cell(70,10,utf8_decode($impuestos),0,0,'R');//Impuestos
$pdf->SetFont('Times','',10);
$pdf->Ln(12);
$pdf->Cell(385);
$pdf->Cell(70,10,utf8_decode($precionfinal),0,0,'R');//Total
$pdf->Output();   
/*







//Loading data 
$pdf->SetTopMargin(20); $pdf->SetLeftMargin(20); $pdf->SetRightMargin(20); */






?> 

