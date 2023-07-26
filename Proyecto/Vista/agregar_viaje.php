<!DOCTYPE html>
<html lang="en" style="background-color: rgb(50, 42, 80)">

<head>
  <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
  </meta>

  <?php
  if (isset($_GET['success']) && $_GET['success'] === 'true') {
    echo "<script>alert('Se agregó el nuevo viaje correctamente');</script>";
  } elseif (isset($_GET['success']) && $_GET['success'] === 'false') {
    echo "<script>alert('No se pudo añadir el nuevo viaje, intente de nuevo');</script>";
  }
  ?>

  <title>Agregar Viaje</title>
</head>

<!-- - Agregar viaje (salida, destino, fecha, asientos disponibles, precio)
  - Editar viaje -->

<body>
  <a href="../../index.html">Inicio</a>

  <a href="../Controlador/handler.php?value=1">Regresar</a>

  <h1>Agregar nuevo viaje</h1>

  <form action="../Modelo/insertar_viaje.php" method="post">
    <label for="">Lugar de salida</label>

    <input type="text" placeholder="salida" name="lugar-salida"></input>

    <label for="">Lugar de destino</label>

    <input type="text" placeholder="destino" name="lugar-destino"></input>

    <label for="">Fecha del viaje</label>

    <input type="date" name="fecha-viaje"></input>

    <label for="">Hora de salida</label>

    <input type="time" name="hora-salida"></input>


    <label for="">Código bus asignado</label>
    <input type="text" placeholder="bus" name="codigo-bus"></input>

    <label for="">Precio</label>

    <input type="text" pattern="^([$]{1})[1-9]{1,}|^([$]{1})[0-9]{1,}[.][0-9]{1,2}" placeholder="$0.00"
      onfocus="if(this.value=='') this.value='$';" name="precio-viaje"></input>

    <button type="submit">Agregar</button>
  </form>
</body>

</html>