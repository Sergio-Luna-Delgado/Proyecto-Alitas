async function eliminarProducto(a){if(confirm(`¿Estas seguro de eliminar el registro ${a}?`))try{const o="https://alitas-legendarias.herokuapp.com/admin/inventario/eliminar",t=new FormData;t.append("id",a);const e={method:"POST",body:t},i=await fetch(o,e),n=await i.json();alert(n.message),location.reload()}catch(a){console.log(a)}}async function validarComprar(a){try{const o="https://alitas-legendarias.herokuapp.com/validarUser",t=new FormData;t.append("id",a);const e={method:"POST",body:t},i=await fetch(o,e),n=await i.json();"error"==n.status?(alert(n.message),window.location.href="/login"):window.location.href="/platillo?id="+a}catch(a){console.log(a)}"error"==data.status?(alert(data.message),window.location.href="/login.php"):$("#detalles"+a).modal("show")}
//# sourceMappingURL=app.js.map
