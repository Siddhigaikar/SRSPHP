<?php
require 'vendor/autoload.php';

$pdf = new TCPDF();
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(0,10,'PDF WORKING',0,1);
$pdf->Output('test.pdf','D');
?>