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
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,700&display=swap&subset=latin-ext"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600&display=swap&subset=latin-ext"
        rel="stylesheet">

    <link href="../../CSS/bootstrap.css" rel="stylesheet">
    <link href="../../CSS/fontawesome-all.css" rel="stylesheet">
    <link href="../../CSS/swiper.css" rel="stylesheet">
    <link href="../../CSS/magnific-popup.css" rel="stylesheet">
    <link href="../../CSS/styles.css" rel="stylesheet">
    <link href="../../CSS/Estilos.css" rel="stylesheet">
    <link rel="stylesheet" href="../../CSS/estilos-admin.css">
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
                <label for="input" class="textLabel">Conductor:</label>
                <input required type="text" value=<?php echo $mostrar['nombre_responsable'] ?> placeholder="Nombre"
                    name="conductor" class="input">
            </div>

            <div style="margin: 50px;"></div>

            <div class="coolinput">
                <label for="input" class="textLabel">Placa del bus</label>
                <input readonly required type="text" title="Siga el patrón de placa, si tiene 3 dígitos anteponga el 0"
                    pattern="^([A-Z]{3})-[0-9]{4}$" placeholder="AAA-0000" value=<?php echo $mostrar['placa'] ?>
                    name="placa" class="input">
            </div>
        </div>

        <div class="boton"><button class="boton-b" type="submit">Editar</button></div>

    </div>
    </form>
    <?php
}
?>