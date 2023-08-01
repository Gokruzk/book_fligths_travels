<?php
include("../Config/conexion.php");
$id = $_GET['id_viaje'];
$sql = "SELECT v.id_viaje, v.lugar_origen, v.lugar_destino, v.fecha, v.hora, v.precio, b.nombre_responsable 
    FROM Viaje v
    inner join Transporte b
    on v.placa = b.placa WHERE id_viaje = $id";
$res = mysqli_query($conexion, $sql);
$viaje = $res->fetch_assoc();
?>
<fieldset>
    <?php echo "Partida: ";
    echo $viaje['lugar_origen'] ?>
    <br>
    <?php echo "Llegada:";
    echo $viaje['lugar_destino'] ?>
    <br>
    <?php echo "Fecha de Partida:" ?>
    <?php echo $viaje['fecha'] ?>
    <br>
    <?php echo "Precio: $" ?>
    <?php echo $viaje['precio'] ?>
    <br>
    <?php echo "Descripción" ?>
    <br>
    <?php echo "Foto Hola" ?>
    <br>
    <div class="card-body">
        <a href="../Controlador/handler.php?value=5&id_viaje=<?php echo $viaje['id_viaje']; ?>"
            class="btn btn-primary">Reservar</a>
    </div>
</fieldset>
<br> <br> <br>
<?php
?>