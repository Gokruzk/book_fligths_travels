<!DOCTYPE html>
<html lang="en" style="background-color: rgb(50, 42, 80)">

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    </meta>

    <?php
    if (isset($_GET['success']) && $_GET['success'] === 'true') {
        echo "<script>alert('Se agregó el bus correctamente');</script>";
    } elseif (isset($_GET['success']) && $_GET['success'] === 'false') {
        echo "<script>alert('No se pudo añadir el nuevo bus, intente de nuevo');</script>";
    }
    ?>

    <title>Agregar un nuevo bus</title>
</head>

<!-- - Agregar viaje (salida, destino, fecha, asientos disponibles, precio)
    - Editar viaje -->

<body>
    <a href="../../index.html">Inicio</a>

    <a href="../Controlador/handler.php?value=1">Regresar</a>

    <h1>Agregar nuevo viaje</h1>

    <form action="../Modelo/insertar_bus.php" method="post">
        <label for="">Nombre del conductor</label>

        <input type="text" placeholder="Nombre" name="conductor"></input>

        <label for="">Número de asientos</label>

        <input type="number" min="0" max="50" placeholder="asientos" name="numero-asientos"></input>

        <button type="submit">Agregar</button>
    </form>

    
</body>

</html>