<header class="container-fluid p-0">
    <div class="home">
        <div class="left-mobile">
            <a data-bs-toggle="offcanvas" href="#offcanvasHome" role="button" aria-controls="offcanvasHome">
                <img src="/build/img/menu.svg" alt="menu">
                <a href="/">
                    <picture>
                        <source srcset="/build/img/Logo.avif" type="image/avif">
                        <source srcset="/build/img/Logo.webp" type="image/webp">
                        <img src="/build/img/Logo.png" alt="Logo">
                    </picture>
                </a>

            </a>
        </div>
        <div class="left-desktop">
            <a href="/">
                <picture>
                    <source srcset="/build/img/Logo.avif" type="image/avif">
                    <source srcset="/build/img/Logo.webp" type="image/webp">
                    <img src="/build/img/Logo.png" alt="Logo">
                </picture>
            </a>
            <a class="opcionesHeader" href="/?categoria=Alitas">Alitas</a>
            <a class="opcionesHeader" href="/?categoria=Boneless">Boneless</a>
            <a class="opcionesHeader" href="/?categoria=Papas">Papas</a>
            <a class="opcionesHeader" href="/?categoria=Combos Legendarios">Combos Legendarios</a>
        </div>
        <div class="right">
            <?php
            if (!isset($_SESSION)) {
                session_start();
            }
            if (!isset($_SESSION['login_user'])) :
            ?>
                <a href="/login" class="botonLink">Iniciar Sesión</a>
            <?php else : ?>
                <a class="botonLink dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['login_user_name']; ?></a>
                <ul class="dropdown-menu" aria-labelledby="opciones">
                    <li><a href="/carrito">Carrito de Compras</a></li>
                    <li><a href="/pedidos">Mis Pedidos</a></li>
                    <li><a href="/perfil">Mi Perfil</a></li>
                    <li>
                        <hr class="dropdown-divider text-black w-100">
                    </li>
                    <li><a href="/logout">Cerrar Sesión</a></li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</header>

<!-- Offcanvas con las etiquetas del menu -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasHome" aria-labelledby="offcanvasHomeLabel">
    <div class="offcanvas-header">
        <p id="offcanvasHomeLabel">Menú</p>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <a class="offcanva_menu" href="/?categoria=Alitas">Alitas</a>
        <a class="offcanva_menu" href="/?categoria=Boneless">Boneless</a>
        <a class="offcanva_menu" href="/?categoria=Papas">Papas</a>
        <a class="offcanva_menu" href="/?categoria=Combos Legendarios">Combos Legendarios</a>
    </div>
</div>