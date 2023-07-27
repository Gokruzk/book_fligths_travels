<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar viaje</title>
</head>

<body>
    <a href="../../index.html">Inicio</a>]
    <a href="../Controlador/handler.php?value=3">Regresar</a>
    <h1>Descripción y reserva de viaje seleccionado</h1>

    <?php
        // Capturar el ID del viaje desde el parámetro en la URL
        $id_viaje = $_GET['id_viaje'] ?? '';

        // Verificar si se recibió el ID del viaje en la URL
        if (empty($id_viaje)) {
            echo "Error: No se proporcionó el ID del viaje.";
            exit();
        }

    ?>

    <form action="../Modelo/reservar.php" method="post">

    <?php include("../Modelo/mostrar_viaje_reserva.php"); ?>

        <label for="cedula">Número de cédula del cliente:</label>
        <input type="text" id="cedula" name="cedula" required>
        <br>
        <label for="fecha_reserva">Fecha de reserva:</label>
        <input type="date" id="fecha_reserva" name="fecha_reserva" required>
        <br>
        <label for="cantidad_adul">Cantidad de adultos:</label>
        <input type="number" id="cantidad_adul" name="cantidad_adul" min="1" required>
        <br>
        <label for="cantidad_ni">Cantidad de niños:</label>
        <input type="number" id="cantidad_ni" name="cantidad_ni" min="0" required>
        <br>
        <input type="submit" value="Reservar">
    </form>
</body>

</html>