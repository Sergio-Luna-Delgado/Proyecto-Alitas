document.addEventListener('DOMContentLoaded', function () {
    iniciarApp();
});

function iniciarApp() {
    buscarPorFecha();
}

function buscarPorFecha() {
    const fechaInput = document.querySelector('#fecha');
    fechaInput.addEventListener('input', function (e) {
        const fechaSeleccionada = e.target.value;
        window.location = `?fecha=${fechaSeleccionada}`;
    });
}

// function botonEstatus() {
//     const botonEstatus = document.querySelectorAll('#botonEstatus');
//     /* Evita errores aunque no es necesario el if */
//     if (botonEstatus !== null) {
//         botonEstatus.forEach(boton => {
//             boton.addEventListener('click', function (e) {
//                 const texto = e.target.textContent;
//                 if (texto === 'Pendiente') {
//                     boton.textContent = 'Terminado';
//                     boton.classList.remove('boton-Pendiente');
//                     boton.classList.add('boton-Terminado');

//                     cambiarEstatus()

//                 } else {
//                     boton.textContent = 'Pendiente';
//                     boton.classList.remove('boton-Terminado');
//                     boton.classList.add('boton-Pendiente');
//                 }
//             });
//         });
//     }
// }

async function cambiarEstatus(id, estatus) {

    estatus === 'Pendiente' ? estatus = 'Terminado' : estatus = 'Pendiente';

    try {
        const url = host + 'admin/estatus';

        const datos = new FormData();
        datos.append('id', id);
        datos.append('estatus', estatus);
        const opciones = {
            method: 'POST',
            body: datos
        }

        /* El await espera hasta que descargue todo y detiene la ejecucion de todo lo que este abajo */
        const resultado = await fetch(url, opciones);
        const respuesta = await resultado.json();

        alert(respuesta.message);
        location.reload();

    } catch (error) {
        console.log(error);
    }
}

/* Se elimina la orden pero primero se muestra una alerta */
async function eliminarOrden(id) {
    if (confirm(`¿Estas seguro de eliminar el registro ${id}?`)) {
        try {
            const url = host + 'admin/eliminar';

            const datos = new FormData();
            datos.append('id', id);
            const opciones = {
                method: 'POST',
                body: datos
            }

            /* El await espera hasta que descargue todo y detiene la ejecucion de todo lo que este abajo */
            const resultado = await fetch(url, opciones);
            const respuesta = await resultado.json();

            alert(respuesta.message);
            location.reload();

        } catch (error) {
            console.log(error);
        }
    }
}