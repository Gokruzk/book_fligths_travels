$(document).ready(function () {
  // Obtener referencia al elemento select
  const selectElement = $("#select-viaje");

  // Agregar el evento de cambio
  selectElement.on("change", mostrarInput);

  // Función para mostrar el mensaje correspondiente
  function mostrarInput() {
    const elementos = [
      { el: $("#id-id"), val: $("#valor-id"), req: true },
      { el: $("#origen-id"), val: $("#valor-origen"), req: true },
      { el: $("#destino-id"), val: $("#valor-destino"), req: true },
      { el: $("#fecha-id"), val: $("#valor-fecha"), req: true },
      { el: $("#hora-id"), val: $("#valor-hora"), req: true },
      { el: $("#precio-id"), val: $("#valor-precio"), req: true },
      { el: $("#placa-id"), val: $("#valor-placa"), req: true },
      { el: $("#conductor-id"), val: $("#valor-conductor"), req: true },
    ];

    const opcionSeleccionada = selectElement.val();

    elementos.forEach((elemento, index) => {
      const showElement = index === parseInt(opcionSeleccionada, 10);
      elemento.el.toggle(showElement);
      elemento.val
        .val(showElement ? "" : "")
        .prop("required", showElement && elemento.req);
    });
  }
});
