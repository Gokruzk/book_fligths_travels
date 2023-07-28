<?php
include("../Config/conexion.php");

$origen = $_POST['lugar_origen'];
$destino = $_POST['lugar_destino'];
$fecha = $_POST['fecha_viaje'];
$hora = $_POST['hora_salida'];
$placa_bus = $_POST['placa_bus'];
$precio = $_POST['precio_viaje'];

$sql_placa = "SELECT * FROM Transporte WHERE placa='$placa_bus'";

$existe = mysqli_query($conexion, $sql_placa);
$resultado = mysqli_fetch_array($existe);


if ($resultado != null) {
    $sql = "INSERT INTO Viaje(lugar_origen, lugar_destino,fecha, hora, precio, placa) 
    VALUES ('$origen', '$destino', '$fecha', '$hora', '$precio', '$placa_bus')";

    $estado = mysqli_query($conexion, $sql);
    echo "La placa es", $estado;

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