document.addEventListener("DOMContentLoaded", function () {
    const fechaNacimientoInput = document.getElementById("fechaNacimiento");
    const fechaActual = new Date();
    const fechaMaxima = new Date(fechaActual.getFullYear() - 18, fechaActual.getMonth(), fechaActual.getDate());
    const maxFecha = fechaMaxima.toISOString().split("T")[0];
    fechaNacimientoInput.setAttribute("max", maxFecha);
});

const casilla1 = document.getElementById("cedula");
const casilla2 = document.getElementById("nombre");
const casilla3 = document.getElementById("apellido");
const casilla4 = document.getElementById("telefono");
const casilla5 = document.getElementById("correo");
let validacion;

function validarCampos() {
    if (document.getElementById("cedula").value === "") {
        alert("Por favor ingrese el número de cédula.");
        validacion = false;
        casilla1.focus();
    } else if (!validarCedula(document.getElementById("cedula").value)) {
        alert("Número de cédula inválido.");
        validacion = false;
        casilla1.focus();
    }

    if(document.getElementById("nombre").value === "") {
        alert("Por favor ingrese el nombre.");
        validacion = false;
    }else if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ']+$/u.test(document.getElementById("nombre").value)) {
        alert("El nombre no debe contener espacios, número o caracteres especiales.");
        validacion = false;
    }

    if(document.getElementById("apellido").value === "") {
        alert("Por favor ingrese el apellido.");
        validacion = false;
    }else if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ']+$/u.test(document.getElementById("apellido").value)) {
        alert("El apellido no debe contener espacios, número o caracteres especiales.");
        validacion = false;
    }

    if(document.getElementById("telefono").value === "") {
        alert("Por favor ingrese el número de telefono.");
        validacion = false;
    }else if (!/^\d{10}$/.test(document.getElementById("telefono").value)) {
        alert("El número de telefono debe estar conformado por números y contener 10 dígitos.");
        validacion = false;
    }

    if(document.getElementById("correo").value === "") {
        alert("Por favor ingrese el correo.");
        validacion = false;
    }else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(document.getElementById("correo").value)) {
        alert("Por favor ingrese correctamente el correo, Ejem: kevinT@gmail.com ");
        validacion = false;
    }
}

document.getElementById("registro").addEventListener("click", function (event) {
    event.preventDefault();

    validacion = true;
    validarCampos();

    if (validacion) {
        const formData = new FormData();
        formData.append("cedula", document.getElementById("cedula").value);
        formData.append("nombre", document.getElementById("nombre").value);
        formData.append("apellido", document.getElementById("apellido").value);
        formData.append("fechaNacimiento", document.getElementById("fechaNacimiento").value);
        formData.append("telefono", document.getElementById("telefono").value);
        formData.append("correo", document.getElementById("correo").value);
        formData.append("contra", document.getElementById("contra").value);
        formData.append("cargo", document.getElementById("cargo").value);

        fetch("Proyecto/Modelo/registrar_usuario.php", {
            method: "POST",
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                console.log(data);
                if (data === "exitoso") {
                    window.location.href = "Proyecto/Vista/user.php?value=" + document.getElementById("correo").value;

                } else if (data === "ya registrada") {
                    alert("Ya se encuentra registrado en el sistema.");
                    const modal = document.getElementById('miModal');
                    const modalRegistro = document.getElementById('miModalRegistro');

                    modalRegistro.classList.remove('mostrar');
                    modal.classList.add('mostrar');
                } else if (data === "error") {
                    alert("Error, por favor intento nuevamente más tarde.");
                }
            })
            .catch(error => {
                console.error(error);
            });
    }
});

function validarCedula(cedulaParametro) {
    if (cedulaParametro.length !== 10 || !/^\d{10}$/.test(cedulaParametro)) {
        return false;
    }

    let sum = 0;
    for (let i = 0; i < 9; i++) {
        let digit = parseInt(cedulaParametro[i]);
        let coef = (i % 2 === 0) ? 2 : 1;
        let product = digit * coef;
        sum += (product >= 10) ? (product - 9) : product;
    }

    let lastDigit = parseInt(cedulaParametro[9]);
    let calculatedDigit = (sum % 10 === 0) ? 0 : (10 - (sum % 10));

    if (lastDigit === calculatedDigit)
        return true;
    else {
        return false;
    }
}