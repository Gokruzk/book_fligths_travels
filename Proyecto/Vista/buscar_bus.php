<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/estilos-admin.css">


    <title>Datos de los buses</title>
</head>

<body>
    <a href="../../index.html">Inicio</a>
    <a href="../Controlador/handler.php?value=1">Regresar</a>

    <center>

        <h1>Buscar buses</h1>

        <form action="<?php echo $_SERVER['PHP_SELF'], "?value=11"; ?>" method="post">
            <div class="contenedor">

                <div class="contenedor-inputs">
                    <label for="" style="font-size: larger; padding-right: 20px">Buscar por:</label>

                    <select id="select-bus" class="form-select" style="width: 150px; font-size: larger;">
                        <option value="1">Placa del bus</option>
                        <option value="2">Conductor</option>
                    </select>

                </div>

                <div style="margin-top: 30px;" class="contenedor-inputs">
                    <div id="conductor-id" class="coolinput" style="display: none;">
                        <label for="input" class="text">Conductor:</label>
                        <input id="valor-conductor" type="text" placeholder="Nombre" name="conductor" class="input">
                    </div>

                    <div id="placa-id" class="coolinput">
                        <label for="input" class="text">Placa del bus</label>
                        <input required id="valor-placa" type="text"
                            title="Siga el patrón de placa, si tiene 3 dígitos anteponga el 0"
                            pattern="^([A-Z]{3})-[0-9]{4}$" placeholder="AAA-0000" name="placa" class="input">
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

                $conductor = $_POST['conductor'];
                $placa = $_POST['placa'];

                if (strlen($conductor) == 0) {
                    $sql = "SELECT * FROM Transporte WHERE placa='$placa'";
                } else if (strlen($placa) == 0) {
                    $sql = "SELECT * FROM Transporte WHERE nombre_responsable='$conductor'";
                }

                $resultado = mysqli_query($conexion, $sql);
                ?>

                <th>Placa</th>
                <th>Conductor</th>

                <?php

                $con = 0;
                while ($mostrar = mysqli_fetch_array($resultado)) {
                    ?>
                    <tr>
                        <td class="datos">
                            <?php echo $mostrar['placa'] ?>
                        </td>
                        <td class="datos">
                            <?php echo $mostrar['nombre_responsable'] ?>
                        </td>

                        <td class="icono"> <a href="../Modelo/editar_bus.php?placa=<?php echo $mostrar['placa'] ?>">
                                <img title="Editar bus" src="../../images/editar.png" alt=""></a> </td>

                        <td class="icono">
                            <a href="../Modelo/eliminar_bus.php?placa=<?php echo $mostrar['placa'] ?>">
                                <img title="Eliminar bus" src="../../images/eliminar.png" alt=""></a>
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
    <script src="../../JS/jquery-3.7.0.min.js"></script>
    <script src="../../JS/event-bus.js"></script>
</body>

</html>