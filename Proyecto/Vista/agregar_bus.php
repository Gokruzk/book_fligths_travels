<!DOCTYPE html>
<html lang="en">

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

    <link rel="stylesheet" href="../../CSS/estilos-admin.css">

    <title>Agregar</title>
</head>

<!-- - Agregar viaje (salida, destino, fecha, asientos disponibles, precio)
    - Editar viaje -->

<body>
    <a href="../../index.html">Inicio</a>

    <a href="../Controlador/handler.php?value=1">Regresar</a>

    <h1>Agregar un nuevo bus</h1>

    <form action="../Modelo/insertar_bus.php" method="post">

        <div class="contenedor">

            <div class="contenedor-inputs">
                <div class="coolinput">
                    <label for="input" class="text">Conductor:</label>
                    <input required type="text" placeholder="Nombre" name="conductor" class="input">
                </div>
                <div style="margin: 50px;"></div>
                <div class="coolinput">
                    <label for="input" class="text">Placa del bus</label>
                    <input required type="text" title="Siga el patrón de placa, si tiene 3 dígitos anteponga el 0"
                        pattern="^([A-Z]{3})-[0-9]{4}$" placeholder="AAA-0000" name="placa" class="input">
                </div>
            </div>

            <div class="boton"><button class="boton-b" type="submit">Agregar</button></div>

        </div>
    </form>
</body>

</html>