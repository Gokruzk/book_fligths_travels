<?php
include("../Config/conexion.php");
$id = $_REQUEST['id_bus'];
$sql = "SELECT *
 FROM bus 
 where id_bus = $id";
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
    <form action="../Modelo/actualizar_bus.php" method="POST">
        <?php include("../Vista/tabla_bus.php"); ?>
    </form>
</body>

</html>
<?php
$resultado = mysqli_query($conexion, $sql);
while ($mostrar = mysqli_fetch_array($resultado)) {
    ?>
    <tr>
        <td> <input style="border: 0;" value=<?php echo $mostrar['id_bus'] ?> name="id_bus"> </td>
        <td><input type="text" value=<?php echo $mostrar['nombre_responsable'] ?> name="nombre_responsable"> </td>
        <td><input type="text" value=<?php echo $mostrar['placa'] ?> name="placa"> </td>

        <td> <input type="submit" value="Editar"></td>
    </tr>
    <?php
}
?>