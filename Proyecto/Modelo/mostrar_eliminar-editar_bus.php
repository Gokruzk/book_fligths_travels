<?php
include("../Config/conexion.php");
$sql = "SELECT * FROM Transporte ";

$resultado = mysqli_query($conexion, $sql);

while ($mostrar = mysqli_fetch_array($resultado)) {
    ?>
    <tr>
        <td>
            <?php echo $mostrar['placa'] ?>
        </td>
        <td>
            <?php echo $mostrar['nombre_responsable'] ?>
        </td>


        <td> <a href="../Modelo/eliminar_bus.php?placa=<?php echo $mostrar['placa'] ?>">Eliminar</a> </td>
        <td> <a href="../Modelo/editar_bus.php?placa=<?php echo $mostrar['placa'] ?>">Editar</a> </td>

    </tr>
    <?php
}
?>