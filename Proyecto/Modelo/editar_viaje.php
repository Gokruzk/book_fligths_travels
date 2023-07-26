<?php
include("../Config/conexion.php");
$id = $_REQUEST['id_viaje'];
$sql = "SELECT *
 FROM viaje 
 where id_viaje = $id";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="../../index.html">Inicio</a>

    <a href="../Controlador/handler.php?value=1">Regresar</a>
    <form action="../Modelo/actualizar_viaje.php" method="POST">
        <?php include("../Vista/tabla_viaje.php"); ?>
    </form>
</body>

</html>
<?php
$resultado = mysqli_query($conexion, $sql);
while ($mostrar = mysqli_fetch_array($resultado)) {
    ?>
    <tr>
        <td> <input type="hidden" value=<?php echo $mostrar['id_viaje'] ?> name="id_viaje"> </td>
        <td><input type="text" value=<?php echo $mostrar['origen'] ?> name="lugar_origen"> </td>
        <td><input type="text" value=<?php echo $mostrar['destino'] ?> name="lugar_destino"> </td>
        <td><input type="date" value=<?php echo $mostrar['fecha'] ?> name="fecha_viaje"> </td>
        <td><input type="time" value=<?php echo $mostrar['hora'] ?> name="hora_salida"> </td>
        <td><input type="text" pattern="^([$]{1})[1-9]{1}[0,9]{0,}|^([$]{1})[1-9]{1}[0,9]{0,}[.][0-9]{1,2}"
                placeholder="$0.00" onfocus="if(this.value=='') this.value='$';" value=<?php echo "$", $mostrar['precio'] ?>
                name="precio_viaje"> </td>
        <td><input type="text" value=<?php echo $mostrar['id_bus'] ?> name="codigo_bus"> </td>
        <td> <input type="submit" value="Editar"></td>
    </tr>
    <?php
}
?>