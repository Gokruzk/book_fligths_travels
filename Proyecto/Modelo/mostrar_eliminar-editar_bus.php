<?php
include("../Config/conexion.php");
$sql = "SELECT *
FROM bus ";

$resultado = mysqli_query($conexion, $sql);

while ($mostrar = mysqli_fetch_array($resultado)) {
    ?>
    <tr>
        <td>
            <?php echo $mostrar['id_bus'] ?>
        </td>
        <td>
            <?php echo $mostrar['nombre_responsable'] ?>
        </td>
        <td>
            <?php echo $mostrar['placa'] ?>
        </td>

        <td> <a href="../Modelo/eliminar_bus.php?id_bus=<?php echo $mostrar['id_bus'] ?>">Eliminar</a> </td>
        <td> <a href="../Modelo/editar_bus.php?id_bus=<?php echo $mostrar['id_bus'] ?>">Editar</a> </td>

    </tr>
    <?php
}
?>