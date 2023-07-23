<!DOCTYPE html>
<html
    lang="en"
    style="background-color: rgb(50, 42, 80);"
>
<head>
    <meta charset="UTF-8"></meta>

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    ></meta>

    <title>Editar Viaje</title>
</head>

<!-- - Agregar viaje (salida, destino, fecha, asientos disponibles, precio)
	- Editar viaje -->

<body>
    <h1>Editar viaje</h1>

    <form action="">
        <label for="">Lugar de salida</label>

        <input
            type="text"
            placeholder="salida"
            name="lugar-salida"
        ></input>

        <label for="">Lugar de destino</label>

        <input
            type="text"
            placeholder="destino"
            name="lugar-destino"
        ></input>

        <label for="">Fecha de salida</label>

        <input
            type="datetime-local"
            name="fecha-salida"
        ></input>

        <label for="">Fecha de regreso</label>

        <input
            type="datetime-local"
            name="fecha-regreso"
        ></input>

        <label for="">Asientos disponibles</label>

        <input
            type="number"
            min="0"
            max="40"
            placeholder="asientos"
            name="numero-asientos"
        ></input>

        <label for="">Precio</label>

        <input
            type="text"
            pattern="^([$]{1})[1-9]{1,}|^([$]{1})[0-9]{1,}[.][0-9]{1,2}"
            placeholder="$0.00"
            onfocus="if(this.value=='') this.value='$';"
            name="precio-viaje"
        ></input>

        <button type="submit">Agregar</button>
    </form>
</body>
</html>