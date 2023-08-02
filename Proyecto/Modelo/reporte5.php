<?php 

include("../Vista/plantilla5.php");

include("../Config/conexion.php");
$sql= "SELECT lugar_origen, lugar_destino, fecha, hora, precio FROM viaje ORDER BY lugar_destino";


$resultado=mysqli_query($conexion, $sql);


//crear objeto 
$pdf= new PDF();
$pdf->AliasNbPages();

$pdf->AddPage();
$pdf->Ln();
$pdf->SetFont('Arial','I',8);
$pdf->Cell(20, 10, '', 0, 0, 'C');
$pdf->Cell(30, 10, 'L. DESTINO', 1, 0, 'C');
$pdf->Cell(30, 10, 'L. ORIGEN', 1, 0, 'C');
$pdf->Cell(30, 10, 'FECHA', 1, 0, 'C');
$pdf->Cell(30, 10, 'HORA', 1, 0, 'C');
$pdf->Cell(30, 10, 'PRECIO', 1, 0, 'C');


$pdf->Ln();

while($mostrar=mysqli_fetch_array($resultado))
{
    $pdf->Cell(20, 10, '',  0, 0, 'C');
    $pdf->Cell(30, 10, $mostrar ['lugar_destino'], 1, 0, 'C');
    $pdf->Cell(30, 10, $mostrar ['lugar_origen'], 1, 0, 'C');
    $pdf->Cell(30, 10, $mostrar ['fecha'], 1, 0, 'C');
    $pdf->Cell(30, 10, $mostrar ['hora'], 1, 0, 'C');
    $pdf->Cell(30, 10, $mostrar ['precio'], 1, 0, 'C');
   
    $pdf->Ln();
}

$pdf->Output('I','reporte5.pdf');
?>