<?php
include("../Config/conexion.php");
$placa = $_REQUEST['placa'];
$sql = "SELECT *
 FROM Transporte 
 where placa = '$placa'";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/estilos-admin.css">
    <title>Document</title>
</head>

<body>
    <a href="../../index.html">Inicio</a>
    <a href="../Controlador/handler.php?value=1">Regresar</a>

    <h1>Editar datos de un bus</h1>

    <form action="../Modelo/actualizar_bus.php" method="POST">
</body>

</html>
<?php
$resultado = mysqli_query($conexion, $sql);
while ($mostrar = mysqli_fetch_array($resultado)) {
    ?>
    <div class="contenedor">

        <div class="contenedor-inputs">
            <div class="coolinput">
                <label for="input" class="text">Conductor:</label>
                <input required type="text" value=<?php echo $mostrar['nombre_responsable'] ?> placeholder="Nombre"
                    name="conductor" class="input">
            </div>

            <div style="margin: 50px;"></div>
            
            <div class="coolinput">
                <label for="input" class="text">Placa del bus</label>
                <input required type="text" title="Siga el patrón de placa, si tiene 3 dígitos anteponga el 0"
                    pattern="^([A-Z]{3})-[0-9]{4}$" placeholder="AAA-0000" value=<?php echo $mostrar['placa'] ?>
                    name="placa" class="input">
            </div>
        </div>

        <div class="boton"><button type="submit">Editar</button></div>

    </div>
    </form>
    <?php
}
?>