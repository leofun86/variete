<?php
    require('fpdf/fpdf.php');
    if (isset($_POST['txt'])) {
        $txt = $_POST['txt'];    
        //Nueva instancia de la clase FPDF
            //Orientación: P -> Vertical ; L -> Horizontal
            //Unidades de medida: mm -> milímetros ; cm -> centímetros ; in -> pulgadas 
            //Formato de página: letter -> carta ; A4 -> oficio
                //Personalizado -> array(altura, ancho)
        //Ejemplo: new FPDF('L', 'mm', 'a4')
        $pdf = new FPDF();
        //Nueva página al documento
            //Orientación de página: P || L
            //Formato de página: letter, a4, etc || personalizado
            //Rotación de página: 0, 90, 180, 360
        //Ejemplo: AddPage('L', 'letter', 0)
        $pdf->AddPage();
        //Fuente, Grosor (B->bold; I->italic; U->underline), Tamaño
            //Excluyente invocar este método antes de imprimir texto
        $pdf->SetFont('Arial', 'BU', 18);
        //Creación de celda
            //Ancho: 0->refiere al ancho total
            //Alto
            //Contenido
            //Borde: 1->si; 0->no
                //Por dirección: L->Borde izquierdo; R->""derecho; etc
            //Salto de línea: 1->si ; 0->no
            //Alineación: C->Centrado, L->Izquierda, D->Derecha
        $pdf->Cell(0, 12, $txt, 'LR', 1, 'C');
        $pdf->Cell(80, 12, $txt, 0, 0, 'C');
        $pdf->Cell(80, 12, $txt, 0, 1, 'C');
        //Creación de PDF
            //Destino: I->Navegador; D->Descarga; F->Descarga en un fichero local
                //Por defecto utiliza el valor I
            //Nombre de documento: por defecto doc.pdf
        $pdf->OutPut('D', 'primer_docu.pdf');
    } else {
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'U', 18);
        $pdf->Cell(0, 14, 'Hola Mundo', 'LR', 1, 'C', 1);
        $pdf->OutPut();
    }
?>