<header class="container-fluid p-0">
    <h1 class="tituloAdmin">Panel de Administración</h1>
    <div class="home">
        <div class="left-mobile">
            <a data-bs-toggle="offcanvas" href="#offcanvasAdmin" role="button" aria-controls="offcanvasAdmin">
            <img src="/build/img/menu.svg" alt="menu">
                <a href="/admin">
                    <picture>
                        <source srcset="/build/img/Logo.avif" type="image/avif">
                        <source srcset="/build/img/Logo.webp" type="image/webp">
                        <img src="/build/img/Logo.png" alt="Logo">
                    </picture>
                </a>
            </a>
        </div>
        <div class="left-desktop">
            <a href="/admin">
                <picture>
                    <source srcset="/build/img/Logo.avif" type="image/avif">
                    <source srcset="/build/img/Logo.webp" type="image/webp">
                    <img src="/build/img/Logo.png" alt="Logo">
                </picture>
            </a>
            <a class="opcionesHeader" href="/admin/ordenes">Inicio</a>
            <a class="opcionesHeader" href="/admin/ordenes">Ordenes</a>
            <a class="opcionesHeader" href="/admin/inventario">Inventario</a>
            <a class="opcionesHeader" href="/admin/reporte">Reporte de Ventas</a>
        </div>
        <div class="right">
            <a class="botonLink dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Opciones</a>
            <ul class="dropdown-menu" aria-labelledby="opciones">
                <!-- <li><a href="/docs/Manual_Usuario" target="__blank">Manual de Usuario</a></li> -->
                <!-- <li><a href="/docs/Manual_Tecnico" target="__blank">Manual Técnico</a></li> -->
                <!-- <li><a href="/cambiarPassword">Cambiar Contraseña</a></li> -->
                <li>
                    <hr class="dropdown-divider text-black w-100">
                </li>
                <li><a href="/logout" class="enlace_dropdown">Cerrar Sesión</a></li>
            </ul>
        </div>
    </div>
</header>

<!-- Offcanvas con los paneles del admin -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasAdmin" aria-labelledby="offcanvasAdminLabel">
    <div class="offcanvas-header">
        <p id="offcanvasAdminLabel">Paneles de Administración</p>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <a class="offcanva_menu" href="/admin">Inicio</a>
        <a class="offcanva_menu" href="/admin/ordenes">Ordenes</a>
        <a class="offcanva_menu" href="/admin/inventario">Inventario</a>
        <a class="offcanva_menu" href="/admin/reporte">Reporte de Ventas</a>
    </div>
</div>