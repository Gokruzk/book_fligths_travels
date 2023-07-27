<?php
include("../Config/conexion.php");

$origen = $_POST['lugar_origen'];
$destino = $_POST['lugar_destino'];
$fecha = $_POST['fecha_viaje'];
$hora = $_POST['hora_salida'];
$placa = $_POST['placa_bus'];
$precio = $_POST['precio_viaje'];

$sql_placa = "SELECT * FROM Bus WHERE placa = $placa";

echo "La placa es ", $placa;

$existe = mysqli_query($conexion, $sql_placa);

if ($existe) {
    $sql = "INSERT INTO Viaje(lugar_origen, lugar_destino,fecha, hora, precio, placa) 
    VALUES ('$origen', '$destino', '$fecha', '$hora', '$precio', '$placa')";

    $estado = mysqli_query($conexion, $sql);

    if ($estado) {
        // Redirigir de vuelta a la página con el botón de enviar
        $return_url = isset($_POST['return_url']) ? $_POST['return_url'] : '../Vista/agregar_viaje.php';
        header("Location: " . $return_url . "?success=true");
        exit();
    } else {
        // Redirigir de vuelta a la página con el botón de enviar
        $return_url = isset($_POST['return_url']) ? $_POST['return_url'] : '../Vista/agregar_viaje.php';
        header("Location: " . $return_url . "?success=false");
        exit();
    }
} else {
    // Redirigir de vuelta a la página con el botón de enviar
    $return_url = isset($_POST['return_url']) ? $_POST['return_url'] : '../Vista/agregar_viaje.php';
    header("Location: " . $return_url . "?success=false");
    exit();
}


?>