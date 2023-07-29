<!DOCTYPE html>
<html lang="en"">

<head>
  <meta charset=" UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php
if (isset($_GET['success']) && $_GET['success'] === 'true') {
  echo "<script>alert('Se agregó el nuevo viaje correctamente');</script>";
} else if (isset($_GET['success']) && $_GET['success'] === 'false') {
  echo "<script>alert('No se pudo añadir el nuevo viaje, intente de nuevo');</script>";
}
?>

<link rel="stylesheet" href="../../CSS/estilos-admin.css">

<title>Agregar Viaje</title>
</head>

<!-- - Agregar viaje (salida, destino, fecha, asientos disponibles, precio)
  - Editar viaje -->

<body>
  <a href="../../index.html">Inicio</a>

  <a href="../Controlador/handler.php?value=1">Regresar</a>

  <h1>Agregar nuevo viaje</h1>


  <form action="../Modelo/insertar_viaje.php" method="post">

    <div class="contenedor">

      <div class="contenedor-inputs">
        <div class="coolinput">
          <label for="input" class="text">Lugar de origen:</label>
          <input type="text" placeholder="Origen" name="lugar_origen" class="input"></input>
        </div>

        <div style="margin: 50px;"></div>

        <div class="coolinput">
          <label for="input" class="text">Lugar de destino</label>
          <input type="text" placeholder="Destino" class="input" name="lugar_destino"></input>
        </div>

        <div style="margin: 50px;"></div>

        <div class="coolinput">
          <label for="input" class="text">Placa del bus asignado</label>
          <input type="text" title="Siga el patrón de placa, si tiene 3 dígitos anteponga el 0"
            pattern="^([A-Z]{3})-[0-9]{4}$" placeholder="Placa" name="placa_bus" class="input"></input>
        </div>

        <div style="margin: 50px;"></div>

        <div class="coolinput">
          <label for="input" class="text">Fecha del viaje</label>
          <input type="date" name="fecha_viaje" class="input"></input>
        </div>

        <div style="margin: 50px;"></div>

        <div class="coolinput">
          <label for="input" class="text">Hora de salida</label>
          <input type="time" name="hora_salida" class="input"></input>
        </div>

        <div style="margin: 50px;"></div>

        <div class="coolinput">
          <label for="input" class="text">Precio $</label>
          <input type="number" min="1" step="0.01" class="input" placeholder="0.00" name="precio_viaje" />
        </div>
      </div>

      <div class="boton"><button type="submit">Agregar</button></div>

    </div>


  </form>
</body>

</html>