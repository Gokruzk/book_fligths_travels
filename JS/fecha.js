// Crear un objeto Date con la fecha actual
var fecha = new Date();

// Obtener los componentes de la fecha (año, mes y día)
var anio = fecha.getFullYear();
var mes = fecha.getMonth() + 1; // Los meses en JavaScript comienzan desde 0 (enero) hasta 11 (diciembre)
var dia = fecha.getDate();

// Formatear la fecha en el formato "yyyy-MM-dd"
var fechaActualTexto = anio + "-" + (mes < 10 ? "0" : "") + mes + "-" + (dia < 10 ? "0" : "") + dia;

// Asignar la fecha al campo de entrada
document.getElementById("fecha").value = fechaActualTexto;

// Asignar la fecha actual como el valor mínimo del campo de entrada
document.getElementById("fecha").min = fechaActualTexto;
