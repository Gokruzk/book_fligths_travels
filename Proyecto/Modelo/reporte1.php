<?php 

include("../Vista/plantilla1.php");

include("../Config/conexion.php");
$sql= "SELECT *FROM Cliente";

$resultado=mysqli_query($conexion, $sql);

//crear objeto 
$pdf= new PDF();
$pdf->AliasNbPages();

$pdf->AddPage();
$pdf->Ln();
$pdf->SetFont('Arial','I',8);
$pdf->Cell(45, 10, 'CEDULA', 1, 0, 'C');
$pdf->Cell(45, 10, 'NOMBRE', 1, 0, 'C');
$pdf->Cell(45, 10, 'APELLIDO', 1, 0, 'C');
$pdf->Cell(45, 10, 'FECHA DE NACIMIENTO', 1, 0, 'C');
$pdf->Cell(45, 10, 'CORREO', 1, 0, 'C');
$pdf->Cell(45, 10, 'TELEFONO', 1, 0, 'C');
$pdf->Ln();

while($mostrar=mysqli_fetch_array($resultado))
{
    $pdf->Cell(45, 10, $mostrar ['cedula'], 1, 0, 'C');
    $pdf->Cell(45, 10, $mostrar ['nombre'], 1, 0, 'C');
    $pdf->Cell(45, 10, $mostrar ['apellido'], 1, 0, 'C');
    $pdf->Cell(45, 10, $mostrar ['fecha_nacimiento'], 1, 0, 'C');
    $pdf->Cell(45, 10, $mostrar ['correo'], 1, 0, 'C');
    $pdf->Cell(45, 10, $mostrar['telefono'], 1, 0, 'C');
    $pdf->Ln();
}
$pdf->Output('I','reporte1.pdf');

?>