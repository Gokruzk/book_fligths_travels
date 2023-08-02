<?php 

include("../Vista/plantilla4.php");

include("../Config/conexion.php");
$sql= "SELECT vi.lugar_origen, vi.lugar_destino, vi.fecha, vi.hora, vi.precio, COUNT(re.id_reserva) as cantidad FROM reserva as re INNER JOIN viaje as vi ON re.id_viaje=vi.id_viaje GROUP BY vi.lugar_origen, vi.lugar_destino, vi.fecha, vi.hora, vi.precio";


$resultado=mysqli_query($conexion, $sql);


//crear objeto 
$pdf= new PDF();
$pdf->AliasNbPages();

$pdf->AddPage();
$pdf->Ln();
$pdf->SetFont('Arial','I',8);
$pdf->Cell(30, 10, 'L. ORIGEN', 1, 0, 'C');
$pdf->Cell(30, 10, 'L. DESTINO', 1, 0, 'C');
$pdf->Cell(30, 10, 'FECHA', 1, 0, 'C');
$pdf->Cell(30, 10, 'HORA', 1, 0, 'C');
$pdf->Cell(30, 10, 'PRECIO', 1, 0, 'C');
$pdf->Cell(30, 10, 'C. RESERVAS', 1, 0, 'C');


$pdf->Ln();

while($mostrar=mysqli_fetch_array($resultado))
{
    $pdf->Cell(30, 10, $mostrar ['lugar_origen'], 1, 0, 'C');
    $pdf->Cell(30, 10, $mostrar ['lugar_destino'], 1, 0, 'C');
    $pdf->Cell(30, 10, $mostrar ['fecha'], 1, 0, 'C');
    $pdf->Cell(30, 10, $mostrar ['hora'], 1, 0, 'C');
    $pdf->Cell(30, 10, $mostrar ['precio'], 1, 0, 'C');
    $pdf->Cell(30, 10, $mostrar ['cantidad'], 1, 0, 'C');
   
    $pdf->Ln();
}

$pdf->Output('I','reporte3.pdf');
?>