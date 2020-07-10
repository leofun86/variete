<?php
    include 'plantilla.php';
    require 'conexion.php';

    $pdf = new PDF('L');
    $pdf->AddPage();
    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'B', 18);    
    $pdf->Cell(0, 10, utf8_decode('Lista de productos'), 0, 1, 'C');
    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'BU', 12);    
    $pdf->Cell(40, 10, utf8_decode('Código'), 1, 0, 'C');
    $pdf->Cell(160, 10, 'Producto', 'RBT', 0, 'C');
    $pdf->Cell(40, 10, 'Precio', 'RBT', 1, 'C');
    
    $pdf->SetFont('Arial', '', 9);

    if (isset($_GET['id_cat'])) {
        $cat=$_GET['id_cat'];
        $result_prods = $mysqli->query("SELECT p.CodigoP, p.NombreP, p.Precio, c.IdCategoria FROM productos AS p INNER JOIN categorias AS c ON p.IdCategoria = c.IdCategoria WHERE c.IdCategoria = $cat");
        while($reg = $result_prods->fetch_array(MYSQLI_BOTH)) {
            $pdf->Cell(40, 14, utf8_decode($reg['CodigoP']), 'LBR', 0, 'C');
            $pdf->Cell(160, 14, utf8_decode($reg['NombreP']), 'BR', 0, 'C');
            $pdf->Cell(40, 14, utf8_decode($reg['Precio']), 'BR', 1, 'C');
        }
    }
    $pdf->OutPut();
?>