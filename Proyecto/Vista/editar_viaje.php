<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    if (isset($_GET['edit']) && $_GET['edit'] === 'true') {
        echo "<script>alert('Se editó el bus correctamente');</script>";
    } else if (isset($_GET['edit'])) {

        echo "<script>alert('No se pudo realizar la actualización del bus, intente de nuevo');</script>";

    }

    if (isset($_GET['del']) && $_GET['del'] === 'true') {
        echo "<script>alert('Se eliminó correctamente el viaje');</script>";
    } else if (isset($_GET['del'])) {
        echo "<script>alert('No se pudo eliminar el viaje, intente de nuevo');</script>";
    }
    ?>

    <title>Datos de los usuarios</title>
</head>

<body>
    <a href="../../index.html">Inicio</a>

    <a href="../Controlador/handler.php?value=1">Regresar</a>

    <center>
        <h1>Datos de viajes</h1>
    </center>
    <center>
        <table border="1" style="text-align: center;">
    </center>
    <td>ID</td>
    <td>Origen</td>
    <td>Destino</td>
    <td>Fecha</td>
    <td>Hora Salida</td>
    <td>Precio</td>
    <td>Conductor</td>
    <td>Placa del Bus</td>
    <?php include("../Modelo/mostrar_eliminar-editar_viaje.php"); ?>
    </table>
</body>

</html>