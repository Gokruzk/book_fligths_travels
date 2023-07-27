<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reservar Viaje</title>
</head>

<body>
    <a href="../../index.html">Inicio</a>
    <a href="../Controlador/handler.php?value=1">Regresar</a>

    <center>
        <h1>Datos de viajes</h1>
    </center>
    <center>
        <table border="1">
    </center>
    <td>ID</td>
    <td>Origen</td>
    <td>Destino</td>
    <td>Fecha</td>
    <td>Hora Salida</td>
    <td>Precio</td>
    <td>Conductor</td>
    <td>Reserva</td>
    <?php include("../Modelo/mostrar_reservar.php"); ?>
    </table>
</body>

</html>