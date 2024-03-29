let host = 'https://alitas-legendarias.herokuapp.com/';
// let host = 'http://localhost:3000/';

/* Se elimina el producto del inventario pero primero se muestra una alerta */
async function eliminarProducto(id) {
    if (confirm(`¿Estas seguro de eliminar el registro ${id}?`)) {
        try {
            /* Esta es la url que voy a consumir */
            const url = host + 'admin/inventario/eliminar';

            /* En jQuery esto equivale al data  */
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

/* Muestra una alerta si el usuario ha iniciado sesion primero */
async function validarComprar(id) {
    try {
        const url = host + 'validarUser';

        const datos = new FormData();
        datos.append('id', id);
        const opciones = {
            method: 'POST',
            body: datos
        }

        const resultado = await fetch(url, opciones);
        const respuesta = await resultado.json();

        if (respuesta.status == "error") {
            alert(respuesta.message);
            window.location.href = "/login";
        }
        else {
            window.location.href = "/platillo?id=" + id;
        }

    } catch (error) {
        console.log(error);
    }

    if (data.status == "error") {
        alert(data.message);
        window.location.href = "/login.php"
    }
    else {
        $('#detalles' + id).modal('show');
    }
}

/* Se elimina el producto del carrito pero primero se muestra una alerta */
async function eliminarProductoCarrito(id) {
    if (confirm(`¿Quieres quitar este platillo del carrito?`)) {
        try {
            const url = host + '/eliminarPlatillo';

            const datos = new FormData();
            datos.append('id', id);
            const opciones = {
                method: 'POST',
                body: datos
            }

            const resultado = await fetch(url, opciones);
            const respuesta = await resultado.json();

            alert(respuesta.message);
            location.reload();

        } catch (error) {
            console.log(error);
        }
    }
}

/* funcion de compra */
async function confirmarCompra() {
    /* hora locales de la maquina y no del server */
    const fecha = new Date();
    let hora = fecha.toLocaleTimeString();
    let dia = fecha.getFullYear() + '-' + ( fecha.getMonth() + 1 ) + '-' + fecha.getDate();
    
    if (confirm(`¿Deseas confirmar la compra?`)) {
        try {
            const url = host + 'comprar';

            const datos = new FormData();
            datos.append('hora', hora);
            datos.append('dia', dia);
            const opciones = {
                method: 'POST',
                body: datos
            }

            const resultado = await fetch(url, opciones);
            const respuesta = await resultado.json();

            alert(respuesta.message);
            window.location.href = "/pedidos";

        } catch (error) {
            console.log(error);
        }
    }
}

/* funcion para actualizar la contraseña del usuario */
async function actualizarPasword() {
    const passwordActual = document.querySelector('#passwordActual').value;
    const passwordNuevo = document.querySelector('#passwordNuevo').value;
    const passwordModal = document.querySelector('#passwordModal');
    const modal = bootstrap.Modal.getInstance(passwordModal)
    
    
    try {
        const url = host + 'password';

        const datos = new FormData();
        datos.append('passwordActual', passwordActual);
        datos.append('passwordNuevo', passwordNuevo);
        const opciones = {
            method: 'POST',
            body: datos
        }

        const resultado = await fetch(url, opciones);
        const respuesta = await resultado.json();

        alert(respuesta.message);
        if(respuesta.status === 'success') {
            modal.hide();
        }

    } catch (error) {
        console.log(error);
    }
}


/* Reporte Inventario */
async function reporteInventario() {
    // const reporteInventario = document.querySelector('#reporteInventario');
    
    try {
        const url = host + 'admin/reporte/inventario';

        // const datos = new FormData();
        // datos.append('passwordActual', passwordActual);
        // datos.append('passwordNuevo', passwordNuevo);
        // const opciones = {
        //     method: 'POST',
        //     body: datos
        // }

        const resultado = await fetch(url);
        // const respuesta = await resultado.json();

        // alert(respuesta.message);

    } catch (error) {
        console.log(error);
    }
}

const btnImprimir = document.querySelector('#btnImprimir'); 
if (btnImprimir) {
    btnImprimir.addEventListener('click', function() {
        const reporteBotones = document.querySelector('#reporteBotones');
        reporteBotones.classList.toggle('d-none');
        window.print();
        reporteBotones.classList.toggle('d-none');
    });
}