<?php
    include 'plantilla.php';
    require 'conexion.php';

    $pdf = new PDF('L');
    $pdf->AddPage();
    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'B', 18);    
    $pdf->Cell(0, 10, utf8_decode('Lista de productos'), 0, 1, 'C');
    $pdf->Ln(2);
    $pdf->SetFillColor(205,209,226);
    $pdf->SetFont('Arial', 'BU', 12);    
    $pdf->Cell(48, 10, utf8_decode('Código'), 'LT', 0, 'C', 1);
    $pdf->Cell(180, 10, 'Producto', 'LTR', 0, 'C', 1);
    $pdf->Cell(48, 10, 'Precio', 'TR', 1, 'C', 1);
    $pdf->SetFillColor(226, 227, 235);
    $pdf->SetFont('Arial', '', 9);
    if (isset($_GET['id_cat'])) {
        $cat=$_GET['id_cat'];
        $result_prods = $mysqli->query("SELECT p.CodigoP, p.NombreP, p.Precio, c.IdCategoria FROM productos AS p INNER JOIN categorias AS c ON p.IdCategoria = c.IdCategoria WHERE c.IdCategoria = $cat");
        while($reg = $result_prods->fetch_array(MYSQLI_BOTH)) {
            $pdf->Cell(48, 14, utf8_decode($reg['CodigoP']), 1, 0, 'C', 1);
            $pdf->Cell(180, 14, utf8_decode($reg['NombreP']), 'TB', 0, 'C', 1);
            $pdf->Cell(48, 14, utf8_decode($reg['Precio']), 1, 1, 'C', 1);
        }
    }
    $pdf->OutPut();
?>