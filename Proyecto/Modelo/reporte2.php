<?php 

include("../Vista/plantilla2.php");

include("../Config/conexion.php");
$sql= "SELECT * FROM usuario INNER JOIN reserva";

$resultado=mysqli_query($conexion, $sql);


//crear objeto 
$pdf= new PDF();
$pdf->AliasNbPages();

$pdf->AddPage();
$pdf->Ln();
$pdf->SetFont('Arial','I',8);
$pdf->Cell(40, 10, 'NOMBRE', 1, 0, 'C');
$pdf->Cell(40, 10, 'APELLIDO', 1, 0, 'C');
$pdf->Cell(45, 10, 'VIAJE RESERVADO', 1, 0, 'C');
$pdf->Ln();

while($mostrar=mysqli_fetch_array($resultado))
{
    $pdf->Cell(40, 10, $mostrar ['nombre'], 1, 0, 'C');
    $pdf->Cell(40, 10, $mostrar ['apellido'], 1, 0, 'C');
    $pdf->Cell(45, 10, $mostrar ['reservado'], 1, 0, 'C');
   
    $pdf->Ln();
}

$pdf->Output('I','reporte2.pdf');
?>