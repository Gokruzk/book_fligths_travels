document.addEventListener("DOMContentLoaded", function () {
    const fechaNacimientoInput = document.getElementById("fechaNacimiento");
    const fechaActual = new Date();
    const fechaMaxima = new Date(fechaActual.getFullYear() - 18, fechaActual.getMonth(), fechaActual.getDate());
    const maxFecha = fechaMaxima.toISOString().split("T")[0];
    fechaNacimientoInput.setAttribute("max", maxFecha);
});

let validacion;
const casilla = document.querySelectorAll('.input-registro');

function validarCampos() {
    if (document.getElementById("cedula").value === "") {
        alert("Por favor ingrese el número de cédula.");
        casilla[0].classList.add('activo-error');
        validacion = false;
    } else if (!validarCedula(document.getElementById("cedula").value)) {
        alert("Número de cédula inválido.");
        casilla[0].classList.add('activo-error');
        validacion = false;
    }

    if(document.getElementById("nombre").value === "") {
        alert("Por favor ingrese el nombre.");
        casilla[1].classList.add('activo-error');
        validacion = false;
    }else if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ']+$/u.test(document.getElementById("nombre").value)) {
        alert("El nombre no debe contener espacios, número o caracteres especiales.");
        casilla[1].classList.add('activo-error');
        validacion = false;
    }

    if(document.getElementById("apellido").value === "") {
        alert("Por favor ingrese el apellido.");
        casilla[2].classList.add('activo-error');
        validacion = false;
    }else if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ']+$/u.test(document.getElementById("apellido").value)) {
        alert("El apellido no debe contener espacios, número o caracteres especiales.");
        casilla[2].classList.add('activo-error');
        validacion = false;
    }

    if(document.getElementById("fechaNacimiento").value === "") {
        alert("Por favor seleccione una fecha de nacimiento.");
        casilla[3].classList.add('activo-error');
        validacion = false;
    }

    if(document.getElementById("telefono").value === "") {
        alert("Por favor ingrese el número de telefono.");
        casilla[4].classList.add('activo-error');
        validacion = false;
    }else if (!/^\d{10}$/.test(document.getElementById("telefono").value)) {
        alert("El número de telefono debe estar conformado por números y contener 10 dígitos.");
        casilla[4].classList.add('activo-error');
        validacion = false;
    }

    if(document.getElementById("correo").value === "") {
        alert("Por favor ingrese el correo.");
        casilla[5].classList.add('activo-error');
        validacion = false;
    }else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(document.getElementById("correo").value)) {
        alert("Por favor ingrese correctamente el correo, Ejem: kevinT@gmail.com ");
        casilla[5].classList.add('activo-error');
        validacion = false;
    }

    if(document.getElementById("contra").value === "") {
        alert("Por favor ingrese una contraseña.");
        casilla[6].classList.add('activo-error');
        validacion = false;
    }
}

document.getElementById("registro").addEventListener("click", function (event) {
    event.preventDefault();

    casilla[0].classList.remove('activo-error');
    casilla[1].classList.remove('activo-error');
    casilla[2].classList.remove('activo-error');
    casilla[3].classList.remove('activo-error');
    casilla[4].classList.remove('activo-error');
    casilla[5].classList.remove('activo-error');
    casilla[6].classList.remove('activo-error');

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