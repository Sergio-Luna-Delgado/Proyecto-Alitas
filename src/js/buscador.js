document.addEventListener('DOMContentLoaded', function(){
    iniciarApp();
});

function iniciarApp(){
    buscarPorFecha();
    botonEstatus();
}

function buscarPorFecha(){
    const fechaInput = document.querySelector('#fecha');
    fechaInput.addEventListener('input', function(e){
        const fechaSeleccionada = e.target.value;
        window.location = `?fecha=${fechaSeleccionada}`;
    });
}

function botonEstatus(){
    const botonEstatus = document.querySelector('#botonEstatus');
    if(botonEstatus !== null){
        botonEstatus.addEventListener('click', function(e){
            const texto = e.target.textContent;
            if(texto === 'Pendiente'){
                botonEstatus.textContent = 'Terminado';
                botonEstatus.classList.remove('boton-Pendiente');
                botonEstatus.classList.add('boton-Terminado');
            } else {
                botonEstatus.textContent = 'Pendiente';
                botonEstatus.classList.remove('boton-Terminado');
                botonEstatus.classList.add('boton-Pendiente');
            }
        });
    }
}