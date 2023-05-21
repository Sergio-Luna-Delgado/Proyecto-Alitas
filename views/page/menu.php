<?php include_once __DIR__ . '/../templates/header-user.php' ?>

<?php foreach ($categorias as $categoria) : ?>
    <section class="container my-5">
        <h1 class="nombre-seccion mb-5"><?php echo $categoria->categoria; ?></h1>
        <div class="gridCards">
            <?php foreach ($productos as $producto) : ?>
                <?php if ($producto->categoria == $categoria->categoria) : ?>
                    <div class="card carta-wCategoriath">
                        <img src="/../pictures/<?php echo $producto->foto ?>" class="card-img-top carta-height" alt="<?php echo $producto->nombre ?>">
                        <div class="card-body">
                            <h3 class="card-title fw-bold"><?php echo $producto->nombre ?></h3>
                            <p class="card-text text-danger fs-3">$<?php echo $producto->precio ?></p>
                            <button type="button" onclick="validarComprar(<?php echo $producto->id ?>)" class="boton w-100" id="btnDetalles">Ver Platillo</button </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>
<?php endforeach; ?>


<?php $script = "<script src='/build/js/app.js'></script>"; ?>

<?php include_once __DIR__ . '/../templates/footer-user.php' ?>