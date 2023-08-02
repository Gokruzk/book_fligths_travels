<?php
require("../../REPORT/fpdf.php");
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image("../../images/favicon.png",10,8,20);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(50,10,'TRANS CHIMBORAZO',2,0,'C');
    $this->Ln(10);
    $this->Cell(200,10,'LISTA DE CLIENTES Y CANTIDAD DE VIAJES RESERVADOS',2,0,'C');
    // Salto de línea
    $this->Ln(20);
    
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
?>