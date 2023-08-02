<?php
include("../Config/conexion.php");

$cedula = $_POST['cedula'];
$fecha_reserva = $_POST['fecha_reserva'];
$cantidad_adul = $_POST['cantidad_adul'];
$cantidad_ni = $_POST['cantidad_ni'];
$idViaje = $_GET['id_viaje'];

$sql = "SELECT precio FROM viaje where id_viaje ='$idViaje'";
$resultado = mysqli_query($conexion, $sql);

$fila = mysqli_fetch_assoc($resultado);
$precio = $fila['precio'];

$total = $precio * $cantidad_adul + $precio * $cantidad_ni / 2;


$sql = "INSERT INTO Reserva (fecha_reserva, cantidad_adul, cantidad_ni, cedula, id_viaje, precio_total) 
        VALUES ('$fecha_reserva', $cantidad_adul, $cantidad_ni, '$cedula', $idViaje, $total)";

$regresar = mysqli_query($conexion, $sql);


$sql = "SELECT id_reserva FROM reserva ORDER BY id_reserva DESC LIMIT 1;";
$resultado = mysqli_query($conexion, $sql);

$fila = mysqli_fetch_assoc($resultado);
$idReserva = $fila['id_reserva'];

$puestos = $cantidad_adul + $cantidad_ni;

/* echo "La resreva es: ", $idReserva, " el otro valor es ", $puestos, " el viaje es ", $idViaje; */

$sql = "SELECT count(id_asiento) as LIBRES FROM asientos WHERE id_reserva IS NULL and id_viaje = $idViaje;";
$resultado = mysqli_query($conexion, $sql);

$fila = mysqli_fetch_assoc($resultado);
$libres = $fila['LIBRES'];


if ($libres >= $puestos) {
    $sql = "UPDATE asientos SET id_reserva=$idReserva
    WHERE id_reserva IS NULL and id_viaje = $idViaje 
    LIMIT $puestos";

    $regresar = mysqli_query($conexion, $sql);
    if ($regresar) {
        header("location: ../Vista/viajes_list.php?ced=$cedula&estado=ok");
    } else
        header("location: ../Vista/viajes_list.php?ced=$cedula&estado=error");
} else {
    header("location: ../Vista/viajes_list.php?ced=$cedula&estado=full");

}


?>