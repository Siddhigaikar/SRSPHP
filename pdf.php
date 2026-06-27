<?php
require 'vendor/autoload.php';
include 'db.php';

session_start();

if(!isset($_SESSION["user_id"])){
    header("location:login.php");
    exit();
}

$result = $conn->query("SELECT * FROM courses");

$pdf = new TCPDF();
$pdf->AddPage();

/* Title */
$pdf->SetFont('helvetica', 'B', 16);
$pdf->Cell(0, 10, 'Course Report', 0, 1, 'C');

/* Date */
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(0, 10, 'Generated on: ' . date('Y-m-d H:i:s'), 0, 1, 'R');

$pdf->Ln(5);

/* Table Header */
$html = '
<table border="1" cellpadding="6">
<tr style="background-color:#f2f2f2;">
    <th><b>ID</b></th>
    <th><b>Course Name</b></th>
    <th><b>Description</b></th>
    <th><b>Duration</b></th>
</tr>';

/* Table Data */
while($row = $result->fetch_assoc()){
    $html .= '
    <tr>
        <td>'.$row['id'].'</td>
        <td>'.$row['course_name'].'</td>
        <td>'.$row['description'].'</td>
        <td>'.$row['duration'].'</td>
    </tr>';
}

$html .= '</table>';

/* Output PDF */
$pdf->SetFont('helvetica', '', 12);
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('courses_report.pdf', 'D');
?>