<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    if (isset($_GET['edit']) && $_GET['edit'] === 'true') {
        echo "<script>alert('Se editó el viaje correctamente');</script>";
    } else if (isset($_GET['edit'])) {

        echo "<script>alert('No se pudo realizar la actualización del viaje, intente de nuevo');</script>";

    }

    if (isset($_GET['del']) && $_GET['del'] === 'true') {
        echo "<script>alert('Se eliminó correctamente el viaje');</script>";
    } else if (isset($_GET['del'])) {
        echo "<script>alert('No se pudo eliminar el viaje, intente de nuevo');</script>";
    }
    ?>

    <link rel="stylesheet" href="../../CSS/estilos-admin.css">

    <title>Datos de los viajes</title>
</head>

<body>
    <a href="../../index.html">Inicio</a>

    <a href="../Controlador/handler.php?value=1">Regresar</a>

    <center>
        <h1>Datos de viajes</h1>

        <table>

            <th>ID</th>
            <th>Origen</th>
            <th>Destino</th>
            <th>Fecha</th>
            <th>Hora Salida</th>
            <th>Precio</th>
            <th>Conductor</th>
            <th>Placa del Bus</th>
            <?php include("../Modelo/mostrar_eliminar-editar_viaje.php"); ?>
        </table>
    </center>
</body>

</html>