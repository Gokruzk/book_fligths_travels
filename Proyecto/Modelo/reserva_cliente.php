<?php
include("../Config/conexion.php");

$cedulaCliente = $_POST['cedula_cliente'];

$sql = "SELECT *
        FROM cliente";

$resultado = mysqli_query($conexion, $sql);

while ($mostrar = mysqli_fetch_array($resultado)) {
    ?>
    <tr>
        <td>
            <?php echo $mostrar['cedula'] ?>
        </td>
        <td>
            <?php echo $mostrar['nombre'] ?>
        </td>
        <td>
            <?php echo $mostrar['apellido'] ?>
        </td>
        <td>
            <?php echo $mostrar['fecha_nacimiento'] ?>
        </td>
        <td>
            <?php echo $mostrar['correo'] ?>
        </td>
        <td>
            <?php echo $mostrar['telefono'] ?>
        </td>
    </tr>
    <?php
}
?>