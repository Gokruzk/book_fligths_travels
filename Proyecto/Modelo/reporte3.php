<?php 

include("../Vista/plantilla3.php");

include("../Config/conexion.php");
$sql= "SELECT fecha_reserva,(cantidad_adul+cantidad_ni) as cantidad, cedula, precio_total FROM reserva";


$resultado=mysqli_query($conexion, $sql);


//crear objeto 
$pdf= new PDF();
$pdf->AliasNbPages();

$pdf->AddPage();
$pdf->Ln();
$pdf->SetFont('Arial','I',8);
$pdf->Cell(15, 10, '', 0, 0, 'C');
$pdf->Cell(50, 10, 'CLIENTE', 1, 0, 'C');
$pdf->Cell(40, 10, 'FECHA', 1, 0, 'C');
$pdf->Cell(40, 10, 'CANT. PERSONAS', 1, 0, 'C');

$pdf->Cell(40, 10, 'PRECIO TOTAL', 1, 0, 'C');


$pdf->Ln();

while($mostrar=mysqli_fetch_array($resultado))
{
    $pdf->Cell(15, 10, '', 0, 0, 'C');
    $pdf->Cell(50, 10, $mostrar ['cedula'], 1, 0, 'C');
    $pdf->Cell(40, 10, $mostrar ['fecha_reserva'], 1, 0, 'C');
    $pdf->Cell(40, 10, $mostrar ['cantidad'], 1, 0, 'C');
    
   
    $pdf->Cell(40, 10, $mostrar ['precio_total'], 1, 0, 'C');
   
    $pdf->Ln();
}

$pdf->Output('I','reporte3.pdf');
?>