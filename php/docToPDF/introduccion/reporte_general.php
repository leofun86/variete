<?php
    include 'plantilla.php';

    $pdf = new PDF();
    $pdf->AddPage();    
    $pdf->SetFont('Arial', 'U', 18);
    if (isset($_POST['txt'])) { $pdf->Cell(0, 14, utf8_decode($_POST['txt']), 0, 1, 'C'); }
    else { $pdf->Cell(0, 14, 'Hola Mundo', 0, 1, 'C'); }
    $pdf->AddPage();    
    $pdf->SetFont('Arial', 'U', 18);
    if (isset($_POST['txt'])) { $pdf->Cell(0, 14, utf8_decode($_POST['txt']), 0, 1, 'C'); }
    else { $pdf->Cell(0, 14, 'Hola Mundo', 0, 1, 'C'); }
    $pdf->OutPut();

?>