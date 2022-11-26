// document.addEventListener('DOMContentLoaded', function(){
//     iniciarApp();
// });

// function iniciarApp(){
// eliminarProducto();
// }

/* Se elimina el producto pero primero se muestra una alerta */
async function eliminarProducto(id) {
    if (confirm(`¿Estas seguro de eliminar el registro ${id}?`)) {
        try {
            /* Esta es la url que voy a consumir */
            // const url = 'http://localhost:3000/admin/inventario/eliminar';
            const url = 'https://damp-everglades-80146.herokuapp.com/admin/inventario/eliminar';

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

async function validarComprar(id){

    try {
        // const url = 'http://localhost:3000/validarUser';
        const url = 'https://damp-everglades-80146.herokuapp.com/validarUser';

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