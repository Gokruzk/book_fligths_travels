<?php
include("../Config/conexion.php");

$sql = "SELECT v.id_viaje, v.lugar_origen, v.lugar_destino, v.fecha, v.hora, v.precio, b.nombre_responsable 
        FROM viaje V
        inner join bus B
        on V.id_bus = B.id_bus ";

$resultado = mysqli_query($conexion, $sql);

while ($mostrar = mysqli_fetch_array($resultado)) {
    ?>
    <fieldset>
        <?php echo "Partida:"?>
        <?php echo $mostrar['lugar_origen'] ?>
        <br>
        <?php echo "Llegada:"?>
        <?php echo $mostrar['lugar_destino'] ?>
        <br>
        <?php echo "Fecha de Partida:"?>
        <?php echo $mostrar['fecha'] ?>
        <br>
        <?php echo "Precio: $"?>
        <?php echo  $mostrar['precio'] ?>
        <br>
        <?php echo "Descripción" ?>
        <br>
        <?php echo "Foto Hola" ?>
        <br>
        <div class="card-body">
            <a href="../Controlador/handler.php?value=5" class="btn btn-primary">Reservar</a>
        </div>
    </fieldset>
    <br> <br> <br>
    <?php
}
?>