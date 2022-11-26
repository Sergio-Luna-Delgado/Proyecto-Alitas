<?php include_once __DIR__ . '/../templates/header-admin.php' ?>

<section class="container">
    <h1 class="nombre-pagina"><?php echo $title ?></h1>
    <p class="descripcion-pagina">Actualiza la informacion del producto en el siguiente formulario</p>
    <div class="contenidoFlex">
        <form method="post" class="formulario" enctype="multipart/form-data">
            <?php include_once __DIR__ . '/../templates/form-productos.php' ?>
        </form>
    </div>
</section>

<?php include_once __DIR__ . '/../templates/footer-admin.php' ?>