<?php
require('pdfgen/fpdf.php');

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Welcome to Online Prescription Generator');
$pdf->Output();
?>