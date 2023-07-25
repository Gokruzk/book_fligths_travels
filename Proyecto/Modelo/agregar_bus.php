<?php
include("../Config/conexion.php");

$nombre = $_POST['conductor'];
$asientos = $_POST['numero-asientos'];


$sql = "INSERT into bus(nombre_responsable,capacidad) values('$nombre', '$asientos')";
mysqli_query($conexion, $sql);

header("Location: ../Vista/agregar_bus.html");
exit()

?>