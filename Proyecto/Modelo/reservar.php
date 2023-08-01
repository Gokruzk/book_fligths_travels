<?php
include("../Config/conexion.php");

$cedula = $_POST['cedula'];
$fecha_reserva = $_POST['fecha_reserva'];
$cantidad_adul = $_POST['cantidad_adul'];
$cantidad_ni = $_POST['cantidad_ni'];
$id_viaje = $_GET['id_viaje'];

// // Verificar si el número de cédula del cliente existe
// $check_cedula_query = "SELECT * FROM Cliente WHERE cedula = '$cedula'";
// $cedula_result = $conn->query($check_cedula_query);

// if ($cedula_result->num_rows == 0) {
//     echo "<script>alert('El número de cédula del cliente no existe. Por favor, verifique.');</script>";
//     echo "<script>window.location.href = 'formulario_reserva.html';</script>";
//     exit();
// } //ful chat gpt

$sql = "INSERT INTO Reserva (fecha_reserva, cantidad_adul, cantidad_ni, cedula, id_viaje) 
        VALUES ('$fecha_reserva', $cantidad_adul, $cantidad_ni, '$cedula', $id_viaje)";

$regresar = mysqli_query($conexion, $sql);
if ($regresar) {
    header("location: ../Vista/viajes_list.php?ced=$cedula");
    ?>
    <script>alert("Reservado")</script>
    <?php
} else
    echo "error al reservar";
?>