function iniciarApp(){buscarPorFecha(),botonEstatus()}function buscarPorFecha(){document.querySelector("#fecha").addEventListener("input",(function(t){const e=t.target.value;window.location="?fecha="+e}))}function botonEstatus(){const t=document.querySelectorAll("#botonEstatus");null!==t&&t.forEach(t=>{t.addEventListener("click",(function(e){"Pendiente"===e.target.textContent?(t.textContent="Terminado",t.classList.remove("boton-Pendiente"),t.classList.add("boton-Terminado")):(t.textContent="Pendiente",t.classList.remove("boton-Terminado"),t.classList.add("boton-Pendiente"))}))})}async function eliminarOrden(t){if(confirm(`¿Estas seguro de eliminar el registro ${t}?`))try{const e="https://alitas-legendarias.herokuapp.com/admin/eliminar",n=new FormData;n.append("id",t);const o={method:"POST",body:n},a=await fetch(e,o),i=await a.json();alert(i.message),location.reload()}catch(t){console.log(t)}}document.addEventListener("DOMContentLoaded",(function(){iniciarApp()}));
//# sourceMappingURL=buscador.js.map
