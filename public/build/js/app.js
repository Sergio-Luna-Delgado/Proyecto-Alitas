async function eliminarProducto(a){if(confirm(`¿Estas seguro de eliminar el registro ${a}?`))try{const o="https://damp-everglades-80146.herokuapp.com/admin/inventario/eliminar",e=new FormData;e.append("id",a);const t={method:"POST",body:e},r=await fetch(o,t),n=await r.json();alert(n.message),location.reload()}catch(a){console.log(a)}}async function validarComprar(a){try{const o="https://damp-everglades-80146.herokuapp.com/validarUser",e=new FormData;e.append("id",a);const t={method:"POST",body:e},r=await fetch(o,t),n=await r.json();"error"==n.status?(alert(n.message),window.location.href="/login"):window.location.href="/platillo?id="+a}catch(a){console.log(a)}"error"==data.status?(alert(data.message),window.location.href="/login.php"):$("#detalles"+a).modal("show")}
//# sourceMappingURL=app.js.map
