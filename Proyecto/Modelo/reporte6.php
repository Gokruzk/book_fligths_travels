<?php
$id_reserva = $_GET['value'];

include("../Vista/plantilla6.php");
include("../Config/conexion.php");

$sql = "SELECT * FROM reserva R
INNER JOIN usuario U
ON R.cedula = U.cedula
INNER JOIN viaje V
ON R.id_viaje = V.id_viaje
WHERE R.id_reserva = '$id_reserva'";
$resultado = mysqli_query($conexion, $sql);

$sql1 = "SELECT * FROM reserva R
INNER JOIN asientos A
ON A.id_reserva = R.id_reserva
WHERE R.id_reserva = '$id_reserva'";
$resultado1 = mysqli_query($conexion, $sql1);

$asientos = '';
while ($mostrarAsientos = mysqli_fetch_array($resultado1)) {
    $asientos .= $mostrarAsientos['lugar'] . ', ';
}
$asientos = rtrim($asientos, ', ');

$pdf = new PDF();
$pdf->AliasNbPages();

$pdf->AddPage();
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(71, 5, 'Comprobante Nº ' . $id_reserva, 0, 0);

$pdf->SetFont('Arial', 'I', 10);
$pdf->Ln(10);
$mostrar = mysqli_fetch_array($resultado);
$pdf->Cell(0, 10, 'Fecha reserva: ' . $mostrar['fecha_reserva'], 0, 1);
$pdf->Cell(0, 10, 'Nombre: ' . $mostrar['nombre'] . ' ' . $mostrar['apellido'], 0, 1);
$pdf->Cell(0, 10, 'Cédula: ' . $mostrar['cedula'], 0, 1);
$pdf->Cell(0, 10, 'Correo: ' . $mostrar['correo'], 0, 1);
$pdf->Cell(0, 10, 'Teléfono: ' .$mostrar['telefono'], 0, 1);
$pdf->MultiCell(0, 10, 'Asientos: ' .$asientos, 0, 1);
$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(45, 10, 'PLACA DEL BUS', 1, 0, 'C');
$pdf->Cell(45, 10, 'LUGAR ORIGEN', 1, 0, 'C');
$pdf->Cell(45, 10, 'LUGAR DESTINO', 1, 0, 'C');
$pdf->Cell(30, 10, 'FECHA', 1, 0, 'C');
$pdf->Cell(25, 10, 'HORA', 1, 0, 'C');
$pdf->Ln();

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(45, 10, $mostrar['placa'], 1, 0, 'C');
$pdf->Cell(45, 10, $mostrar['lugar_origen'], 1, 0, 'C');
$pdf->Cell(45, 10, $mostrar['lugar_destino'], 1, 0, 'C');
$pdf->Cell(30, 10, $mostrar['fecha'], 1, 0, 'C');
$pdf->Cell(25, 10, $mostrar['hora'], 1, 0, 'C');
$pdf->Ln();

$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 8);

$precioTotal = $mostrar['precio_total'];
$cantidadAdul = $mostrar['cantidad_adul'];
$cantidadNi = $mostrar['cantidad_ni'];

$precioAdul = ($precioTotal / ($cantidadAdul + ($cantidadNi * 0.5)));
$precioNi = $precioAdul * 0.5;

$precioToAdul = $precioAdul * $cantidadAdul;
$precioToNi = $precioNi * $cantidadNi;

if($cantidadAdul > 1) {
    $pdf->Cell(0, 10, 'Precio por ' .$cantidadAdul .' adultos: $' .$precioToAdul, 0, 1, 'R');
    $pdf->Cell(0, 10, 'Precio por ' .$cantidadNi .' niños: $' .$precioToNi, 0, 1, 'R');
}else {
    $pdf->Cell(0, 10, 'Precio por ' .$cantidadAdul .' adulto: $' .$precioToAdul, 0, 1, 'R');
    $pdf->Cell(0, 10, 'Precio por ' .$cantidadNi .' niño: $' .$precioToNi, 0, 1, 'R');
}

$pdf->SetTextColor(255, 0, 0);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'Total a pagar: $' . $mostrar['precio_total'], 0, 1, 'R');
$pdf->SetTextColor(0, 0, 0);

$pdf->Output('I', 'comprobante.pdf');
?>