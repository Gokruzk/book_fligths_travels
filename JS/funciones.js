const iniciarSesionLink = document.querySelector('a[href="#miModal"]');
const modal = document.getElementById('miModal');
const modalForm = document.querySelector('.form');

iniciarSesionLink.addEventListener('click', (event) => {
    event.preventDefault();

    // Agregar la clase 'mostrar' para animar la apertura del modal
    modal.classList.add('mostrar');

    modal.style.display = 'flex';
    modalForm.addEventListener('click', (event) => {
        event.stopPropagation();
    });
});

modal.addEventListener('click', () => {
    // Quitar la clase 'mostrar' para animar el cierre del modal
    modal.classList.remove('mostrar');

    // Esperar la duración de la animación antes de ocultar el modal
    setTimeout(() => {
        modal.style.display = 'none';
    }, 300); // Aquí, 300 es el tiempo de duración de la animación en milisegundos (0.3 segundos).
});

const registrarLink = document.querySelector('a[href="#miModalRegistro"]');
const modalRegistro = document.getElementById('miModalRegistro');
const modalFormRegistro = document.querySelector('.formRegistro');

registrarLink.addEventListener('click', (event) => {
    event.preventDefault();

    modal.classList.remove('mostrar');
    modalRegistro.classList.add('mostrar');
    modalRegistro.style.display = 'flex';
    modalFormRegistro.addEventListener('click', (event) => {
        event.stopPropagation();
    });
});

modalRegistro.addEventListener('click', () => {
    modalRegistro.classList.remove('mostrar');
    
    setTimeout(() => {
        modalRegistro.style.display = 'none';
    }, 300);
});