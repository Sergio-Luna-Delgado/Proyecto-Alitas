<?php include_once __DIR__ . '/../templates/header-admin.php' ?>

<section class="container">
    <h1 class="nombre-pagina"><?php echo $title ?></h1>
    <p class="descripcion-pagina">Llena el siguiente formulario para poder crear un nuevo producto al menú</p>
    <div class="contenidoFlex">
        <form action="/admin/inventario/crear" method="post" class="formulario" enctype="multipart/form-data">
            <?php include_once __DIR__ . '/../templates/form-productos.php' ?>
        </form>
    </div>
</section>

<?php include_once __DIR__ . '/../templates/footer-admin.php' ?>