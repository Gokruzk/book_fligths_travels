<?php
include("../Config/conexion.php");
$id = $_REQUEST['id_viaje'];
$sql = "SELECT *
 FROM Viaje
 where id_viaje = $id";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../../CSS/estilos-admin.css">
</head>

<body>
    <a href="../../index.html">Inicio</a>
    <a href="../Controlador/handler.php?value=1">Regresar</a>
    <h1>Editar datos de un viaje</h1>
    <form action="../Modelo/actualizar_viaje.php" method="POST">

</body>

</html>
<?php
$resultado = mysqli_query($conexion, $sql);
while ($mostrar = mysqli_fetch_array($resultado)) {
    ?>
    <div class="contenedor">

        <div class="contenedor-inputs">
            <div class="coolinput">
                <label for="input" class="text">Id:</label>
                <input type="text" readonly value=<?php echo $mostrar['id_viaje'] ?> name="id_viaje" class="input"></input>
            </div>

            <div style="margin: 50px;"></div>

            <div class="coolinput">
                <label for="input" class="text">Lugar de origen:</label>
                <input required type="text" value=<?php echo $mostrar['lugar_origen'] ?> placeholder="Origen" name="lugar_origen"
                    class="input"></input>
            </div>

            <div style="margin: 50px;"></div>

            <div class="coolinput">
                <label for="input" class="text">Lugar de destino</label>
                <input required type="text" value=<?php echo $mostrar['lugar_destino'] ?> placeholder="Destino" class="input"
                    name="lugar_destino"></input>
            </div>

            <div style="margin: 50px;"></div>

            <div class="coolinput">
                <label for="input" class="text">Placa del bus asignado</label>
                <input required type="text" title="Siga el patrón de placa, si tiene 3 dígitos anteponga el 0"
                    pattern="^([A-Z]{3})-[0-9]{4}$" value=<?php echo $mostrar['placa'] ?> placeholder="Placa"
                    name="placa_bus" class="input"></input>
            </div>
        </div>
        <div class="contenedor-inputs">
            <div style="margin: 50px;"></div>

            <div class="coolinput">
                <label for="input" class="text">Fecha del viaje</label>
                <input required type="date" value=<?php echo $mostrar['fecha'] ?> name="fecha_viaje" class="input"></input>
            </div>

            <div style="margin: 50px;"></div>

            <div class="coolinput">
                <label for="input" class="text">Hora de salida</label>
                <input required type="time" value=<?php echo $mostrar['hora'] ?> name="hora_salida" class="input"></input>
            </div>

            <div style="margin: 50px;"></div>

            <div class="coolinput">
                <label for="input" class="text">Precio $</label>
                <input required type="number" value=<?php echo $mostrar['precio'] ?> min="1" step="0.01" class="input"
                    placeholder="0.00" name="precio_viaje" />
            </div>
        </div>

        <div class="boton"><button type="submit">Editar</button></div>
    </div>
    </form>
    <?php
}
?>