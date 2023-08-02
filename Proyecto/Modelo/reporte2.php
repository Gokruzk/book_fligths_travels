<?php 

include("../Vista/plantilla2.php");

include("../Config/conexion.php");
$sql= "SELECT us.nombre, us.apellido, COUNT(re.id_reserva) as reserva from usuario as us inner join reserva as re WHERE us.id_cargo !=1  group by us.nombre, us.apellido";


$resultado=mysqli_query($conexion, $sql);


//crear objeto 
$pdf= new PDF();
$pdf->AliasNbPages();

$pdf->AddPage();
$pdf->Ln();
$pdf->SetFont('Arial','I',8);
$pdf->Cell(40, 10, 'NOMBRE', 1, 0, 'C');
$pdf->Cell(40, 10, 'APELLIDO', 1, 0, 'C');
$pdf->Cell(55, 10, 'CANTIDAD DE VIAJES RESERVADOS', 1, 0, 'C');
$pdf->Ln();

while($mostrar=mysqli_fetch_array($resultado))
{
    $pdf->Cell(40, 10, $mostrar ['nombre'], 1, 0, 'C');
    $pdf->Cell(40, 10, $mostrar ['apellido'], 1, 0, 'C');
    $pdf->Cell(55, 10, $mostrar ['reserva'], 1, 0, 'C');
   
    $pdf->Ln();
}

$pdf->Output('I','reporte2.pdf');
?>