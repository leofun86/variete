<?php
    require('fpdf/fpdf.php');
    class PDF extends FPDF {
        function Header() {
            //Imagen en la cabecera
                //Ruta de imagen, margen izquierdo, margen derecho, ancho, altura, tipo de imagen, enlace
            $this->Image('assets/logo.png', 126, 7, 40, 0, '');
            /*
            $this->SetFont('Arial', 'B', 12);
            //Celda con salto de línea que comenzará a partir de los 80
            $this->Cell(0, 3, 'Leo Funes', 0, 1, 'C');
            $this->SetFont('Arial', 'B', 10);
            //Celda con salto de línea que comenzará a partir de los 80
            $this->Cell(0, 10, 'Aprendiendo conocimiento', 0, 1, 'C');
            */
            //10 saltos de línea
            $this->Ln(15);
        }

        function Footer() {
            $this->SetY(-18);
            $this->SetFont('Arial', 'I', 8);
            $this->AddLink();
            $this->Image('assets/imgFoot.png', 122, 200, 50, 0, '');
            $this->AliasNbPages();
            $this->SetFont('Arial', 'I', 8);
            $this->Cell(0, 10, utf8_decode('Página '.$this->PageNo().' de {nb}'), 0, 0, 'C');
        }
    }
?>