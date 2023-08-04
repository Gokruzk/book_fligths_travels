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
let validacion = true;

casilla1.addEventListener("blur", function () {
    if (!validarCedula(document.getElementById("cedula").value)) {
        alert("Número de cédula invalido.");
        validacion = false;
    }
});

casilla2.addEventListener("blur", function () {
    if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ']+$/u.test(document.getElementById("nombre").value)) {
        alert("El nombre no debe contener espacios, número o caracteres especiales.");
        validacion = false;
    }
});

casilla3.addEventListener("blur", function () {
    if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ']+$/u.test(document.getElementById("apellido").value)) {
        alert("El apellido no debe contener espacios, número o caracteres especiales.");
        validacion = false;
    }
});

casilla4.addEventListener("blur", function () {
    if (!/^\d{10}$/.test(document.getElementById("telefono").value)) {
        alert("El número de telefono debe estar conformado por números y contener 10 dígitos.");
        validacion = false;
    }
});

casilla5.addEventListener("blur", function () {
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(document.getElementById("correo").value)) {
        alert("Por favor ingrese correctamente el correo, Ejem: kevinT@gmail.com ");
        validacion = false;
    }
});

document.getElementById("registro").addEventListener("click", function (event) {
    event.preventDefault();

    let cedula = document.getElementById("cedula").value;
    let nombre = document.getElementById("nombre").value;
    let apellido = document.getElementById("apellido").value;
    let fechaNacimiento = document.getElementById("fechaNacimiento").value;
    let telefono = document.getElementById("telefono").value;
    let correo = document.getElementById("correo").value;
    let contra = document.getElementById("contra").value;
    let cargo = document.getElementById("cargo").value;

    if (cedula == "" || nombre == "" || apellido == "" || fechaNacimiento == "" || telefono == "" || correo == "" || contra == "") {
        alert("Por favor, rellene todos los campos.");
    } else {
        if (validacion) {
            const formData = new FormData();
            formData.append("cedula", cedula);
            formData.append("nombre", nombre);
            formData.append("apellido", apellido);
            formData.append("fechaNacimiento", fechaNacimiento);
            formData.append("telefono", telefono);
            formData.append("correo", correo);
            formData.append("contra", contra);
            formData.append("cargo", cargo);

            fetch("Proyecto/Modelo/registrar_usuario.php", {
                method: "POST",
                body: formData
            })
                .then(response => response.text())
                .then(data => {
                    console.log(data);
                    if (data === "exitoso") {
                        alert("Registro exitoso.");
                        const enviarSolicitudDespuesDeEspera = () => {
                            const formData = new FormData();
                            formData.append("user", correo);
                            formData.append("psw", contra);
                        
                            fetch("Proyecto/Modelo/login.php", {
                                method: "POST",
                                body: formData
                            })
                            .then(response => response.text())
                            .then(data => {
                                console.log(data);
                            })
                            .catch(error => {
                                console.error(error);
                            });
                        };

                        setTimeout(enviarSolicitudDespuesDeEspera, 5000);

                    } else if (data === "ya registrada") {
                        alert("Ya se encuentra registrado en el sistema.");
                    } else if (data === "error") {
                        alert("Error, por favor intento nuevamente más tarde.");
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        } else {
            alert("Por favor, rellene correctamente todos los campos.");
        }
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