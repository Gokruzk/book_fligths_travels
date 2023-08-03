<?php
include("../Config/conexion.php");
$sql = "SELECT * FROM Transporte ";

$resultado = mysqli_query($conexion, $sql);

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
                <img class="EditarEliminar" title="Editar bus" src="../../images/editar.png" alt=""></a> </td>

        <td class="icono">
            <a class="eliminarBus" style="cursor: pointer;" name="<?php echo $mostrar['placa'] ?>">
                <img class="EditarEliminar" title="Eliminar bus" src="../../images/eliminar.png" alt="">
            </a>
        </td>
    </tr>
    <?php
}
?>