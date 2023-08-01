$(document).ready(function () {
  // Obtener referencia al elemento select
  const selectElement = $("#select-bus");

  // Agregar el evento de cambio
  selectElement.on("change", mostrarInput);

  // Función para mostrar el mensaje correspondiente
  function mostrarInput() {
    const elementos = [
      { el: $("#placa-id"), val: $("#valor-placa"), req: true },
      { el: $("#conductor-id"), val: $("#valor-conductor"), req: true },
    ];

    const opcionSeleccionada = selectElement.val();

    elementos.forEach((elemento, index) => {
      const showElement = index + 1 === parseInt(opcionSeleccionada, 10);
      elemento.el.toggle(showElement);
      elemento.val
        .val(showElement ? "" : "")
        .prop("required", showElement && elemento.req);
    });
  }
});
