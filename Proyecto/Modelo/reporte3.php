<?php

include("../Vista/plantilla3.php");

include("../Config/conexion.php");
$sql = "SELECT r.fecha_reserva,(r.cantidad_adul+ r.cantidad_ni) as cantidad, r.cedula, r.precio_total, v.lugar_destino 
        FROM reserva as r 
        INNER JOIN viaje as v 
        on r.id_viaje = v.id_viaje";


$resultado = mysqli_query($conexion, $sql);


//crear objeto 
$pdf = new PDF();
$pdf->AliasNbPages();

$pdf->AddPage();
$pdf->Ln();
$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(20, 10, '', 0, 0, 'C');
$pdf->Cell(30, 10, 'CLIENTE', 1, 0, 'C');
$pdf->Cell(30, 10, 'DESTINO', 1, 0, 'C');
$pdf->Cell(30, 10, 'FECHA', 1, 0, 'C');
$pdf->Cell(30, 10, 'CANT. PERSONAS', 1, 0, 'C');
$pdf->Cell(30, 10, 'PRECIO TOTAL', 1, 0, 'C');


$pdf->Ln();

while ($mostrar = mysqli_fetch_array($resultado)) {
    $pdf->Cell(20, 10, '', 0, 0, 'C');
    $pdf->Cell(30, 10, $mostrar['cedula'], 1, 0, 'C');
    $pdf->Cell(30, 10, $mostrar['lugar_destino'], 1, 0, 'C');
    $pdf->Cell(30, 10, $mostrar['fecha_reserva'], 1, 0, 'C');
    $pdf->Cell(30, 10, $mostrar['cantidad'], 1, 0, 'C');
    $pdf->Cell(30, 10, $mostrar['precio_total'], 1, 0, 'C');

    $pdf->Ln();
}
$pdf->Output('I','reporte3.pdf');
?>