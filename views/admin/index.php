<?php include_once __DIR__ . '/../templates/header-admin.php' ?>

<section class="container">
    <h1 class="nombre-pagina"><?php echo $title ?></h1>
    <!-- <h2 class="nombre-seccion">Buscar Pedidos</h2> -->
    <div class="dashboard-total">
        <div class="dashboard-total__content">
            <div class="dashboard-total__left--verde">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-person-circle text-white" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
            </div>
            <div class="dashboard-total__right bg-body-secondary">
                <span class="fs-1 fw-bold"><?php echo $totales['users']; ?></span>
                <p>Usuarios</p>
            </div>
        </div>
        <div class="dashboard-total__content">
            <div class="dashboard-total__left--rojo">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-tag-fill text-white" viewBox="0 0 16 16">
                    <path d="M2 1a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l4.586-4.586a1 1 0 0 0 0-1.414l-7-7A1 1 0 0 0 6.586 1H2zm4 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                </svg>
            </div>
            <div class="dashboard-total__right bg-body-secondary">
                <span class="fs-1 fw-bold"><?php echo $totales['categories']; ?></span>
                <p>Categorias</p>
            </div>
        </div>
        <div class="dashboard-total__content">
            <div class="dashboard-total__left--azul">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-grid-fill text-white" viewBox="0 0 16 16">
                    <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm8 0A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3z" />
                </svg>
            </div>
            <div class="dashboard-total__right bg-body-secondary">
                <span class="fs-1 fw-bold"><?php echo $totales['products']; ?></span>
                <p>Productos</p>
            </div>
        </div>
        <div class="dashboard-total__content">
            <div class="dashboard-total__left--amarrillo">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-bag-check-fill text-white" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                </svg>
            </div>
            <div class="dashboard-total__right bg-body-secondary">
                <span class="fs-1 fw-bold"><?php echo $totales['sales']; ?></span>
                <p>Ventas</p>
            </div>
        </div>
    </div>

</section>

<!-- <php $script = "<script src='build/js/buscador.js'></script>"; ?> -->

<?php include_once __DIR__ . '/../templates/footer-admin.php' ?>