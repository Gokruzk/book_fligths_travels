<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../CSS/estilos-admin.css">

    <title>Datos de los viajes</title>
</head>

<body>
    <a href="../../index.html">Inicio</a>
    <a href="../Controlador/handler.php?value=1">Regresar</a>

    <center>
        <h1>Buscar viajes</h1>

        <form action="<?php echo $_SERVER['PHP_SELF'], "?value=12"; ?>" method="post">
            <div class="contenedor">

                <div class="contenedor-inputs">
                    <label for="" style="font-size: larger; padding-right: 20px">Buscar por:</label>

                    <select id="select-viaje" class="form-select" style="width: 150px; font-size: larger;">
                        <option value="0">ID</option>
                        <option value="1">Origen</option>
                        <option value="2">Destino</option>
                        <option value="3">Fecha de viaje</option>
                        <option value="4">Hora de salida</option>
                        <option value="5">Precio</option>
                        <option value="6">Placa del bus</option>
                        <option value="7">Nombre del conductor</option>
                    </select>

                </div>

                <div style="margin-top: 30px;" class="contenedor-inputs">
                    <div id="id-id" class="coolinput">
                        <label for="input" class="text">ID:</label>
                        <input id="valor-id" required type="text" placeholder="ID" name="id" class="input"></input>
                    </div>

                    <div id="origen-id" class="coolinput" style="display: none;">
                        <label for="input" class="text">Lugar de origen:</label>
                        <input id="valor-origen" type="text" placeholder="Origen" name="lugar_origen"
                            class="input"></input>
                    </div>

                    <div id="conductor-id" class="coolinput" style="display: none;">
                        <label for="input" class="text">Nombre del conductor:</label>
                        <input id="valor-conductor" type="text" placeholder="Conductor" name="conductor"
                            class="input"></input>
                    </div>

                    <div id="destino-id" class="coolinput" style="display: none;">
                        <label for="input" class="text">Lugar de destino</label>
                        <input id="valor-destino" type="text" placeholder="Destino" class="input"
                            name="lugar_destino"></input>
                    </div>

                    <div id="placa-id" class="coolinput" style="display: none;">
                        <label for="input" class="text">Placa del bus asignado</label>
                        <input id="valor-placa" type="text"
                            title="Siga el patrón de placa, si tiene 3 dígitos anteponga el 0"
                            pattern="^([A-Z]{3})-[0-9]{4}$" placeholder="Placa" name="placa_bus" class="input"></input>
                    </div>

                    <div id="fecha-id" class="coolinput" style="display: none;">
                        <label for="input" class="text">Fecha del viaje</label>
                        <input id="valor-fecha" type="date" name="fecha_viaje" class="input"></input>
                    </div>

                    <div id="hora-id" class="coolinput" style="display: none;">
                        <label for="input" class="text">Hora de salida</label>
                        <input id="valor-hora" type="time" name="hora_salida" class="input"></input>
                    </div>

                    <div id="precio-id" class="coolinput" style="display: none;">
                        <label for="input" class="text">Precio $</label>
                        <input id="valor-precio" type="number" min="1" step="0.01" class="input" placeholder="0.00"
                            name="precio_viaje" />
                    </div>
                </div>
            </div>

            <div style="margin-top: 40px; margin-bottom: 40px;" class="boton"><button class="boton-b"
                    type="submit">Buscar</button></div>
        </form>

        <table id="tabla">
            <?php
            if (($_SERVER["REQUEST_METHOD"] == "POST")) {
                include("../Config/conexion.php");

                $id = $_POST['id'];
                $origen = $_POST['lugar_origen'];
                $destino = $_POST['lugar_destino'];
                $placa = $_POST['placa_bus'];
                $fecha = $_POST['fecha_viaje'];
                $hora = $_POST['hora_salida'];
                $precio = $_POST['precio_viaje'];
                $conductor = $_POST['conductor'];

                if (strlen($id) > 0) {
                    $sql = "SELECT * FROM Viaje WHERE id_viaje='$id'";
                } else if (strlen($origen) > 0) {
                    $sql = "SELECT * FROM Viaje WHERE lugar_origen='$origen'";
                } else if (strlen($destino) > 0) {
                    $sql = "SELECT * FROM Viaje WHERE lugar_destino='$destino'";
                } else if (strlen($placa) > 0) {
                    $sql = "SELECT * FROM Viaje WHERE placa='$placa'";
                } else if (strlen($fecha) > 0) {
                    $sql = "SELECT * FROM Viaje WHERE fecha='$fecha'";
                } else if (strlen($hora) > 0) {
                    $sql = "SELECT * FROM Viaje WHERE hora='$hora'";
                } else if (strlen($precio) > 0) {
                    $sql = "SELECT * FROM Viaje WHERE precio='$precio'";
                } else if (strlen($conductor) > 0) {
                    $sql = "SELECT * FROM Viaje V
                    INNER JOIN Transporte T
                    on V.placa = T.placa
                     WHERE T.nombre_responsable='$conductor'";
                }

                $resultado = mysqli_query($conexion, $sql);
                ?>

                <th>ID</th>
                <th>Origen</th>
                <th>Destino</th>
                <th>Fecha</th>
                <th>Hora Salida</th>
                <th>Precio</th>
                <th>Placa del Bus</th>
                <th>Conductor</th>

                <?php

                $con = 0;
                while ($mostrar = mysqli_fetch_array($resultado)) {
                    ?>
                    <tr>
                        <td class="datos">
                            <?php echo $mostrar['id_viaje'] ?>
                        </td>
                        <td class="datos">
                            <?php echo $mostrar['lugar_origen'] ?>
                        </td>
                        <td class="datos">
                            <?php echo $mostrar['lugar_destino'] ?>
                        </td>
                        <td class="datos">
                            <?php echo $mostrar['fecha'] ?>
                        </td>
                        <td class="datos">
                            <?php echo $mostrar['hora'] ?>
                        </td>
                        <td class="datos">
                            <?php echo $mostrar['precio'] ?>
                        </td>
                        <td class="datos">
                            <?php echo $mostrar['placa'] ?>
                        </td>
                        <td class="datos">
                            <?php echo $mostrar['nombre_responsable'] ?>
                        </td>

                        <td class="icono">
                            <a href="../Modelo/editar_viaje.php?id_viaje=<?php echo $mostrar['id_viaje'] ?>"><img
                                    title="Editar bus" src="../../images/editar.png" alt="">
                            </a>
                        </td>
                        <td class="icono">
                            <a href="../Modelo/eliminar_viaje.php?id_viaje=<?php echo $mostrar['id_viaje'] ?>"><img
                                    title="Eliminar bus" src="../../images/eliminar.png" alt="">
                            </a>
                        </td>

                    </tr>
                    <?php
                    $con++;
                }

                if ($con == 0) {
                    ?>
                    <h1 id="estado" style="display: block;">No se encuentran coincidencias</h1>
                    <script>document.getElementById("tabla").style.display = "none"</script>
                    <?php
                }
            }
            ?>
        </table>
    </center>
    <script src="../../JS/event-viaje.js"></script>
</body>

</html>