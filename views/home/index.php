<?php include_once __DIR__ . '/../templates/header-user.php' ?>

<?php if (empty($categoria)) : ?>
    <section class="container-fluid p-0">
        <div id="Carousel_Menu" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <picture>
                        <source src="build/img/carrusel1.avif" type="image/avif">
                        <source src="build/img/carrusel1.webp" type="image/webp">
                        <img loading="lazy" class="carrusel-foto" src="build/img/carrusel1.jpg" alt="carrusel 1">
                    </picture>
                </div>
                <div class="carousel-item">
                    <picture>
                        <source src="build/img/carrusel2.avif" type="image/avif">
                        <source src="build/img/carrusel2.webp" type="image/webp">
                        <img loading="lazy" class="carrusel-foto" src="build/img/carrusel2.jpg" alt="carrusel 2">
                    </picture>
                </div>
                <div class="carousel-item">
                    <picture>
                        <source src="build/img/carrusel3.avif" type="image/avif">
                        <source src="build/img/carrusel3.webp" type="image/webp">
                        <img loading="lazy" class="carrusel-foto" src="build/img/carrusel3.jpg" alt="carrusel 3">
                    </picture>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#Carousel_Menu" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#Carousel_Menu" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section class="container my-5">
        <h2 class="nombre-seccion mb-5">¿Tienes antojo de algo legendario?</h2>
        <div class="gridCards">
            <?php foreach ($cartasLike as $cartaLike) : ?>
                <div class="card carta-width">
                    <img src="/../pictures/<?php echo $cartaLike->foto ?>" class="card-img-top carta-height" alt="<?php echo $cartaLike->nombre ?>">
                    <div class="card-body">
                        <h3 class="card-title fw-bold"><?php echo $cartaLike->nombre ?></h3>
                        <p class="card-text text-danger fs-3">$<?php echo $cartaLike->precio ?></p>
                        <button type="button" onclick="validarComprar(<?php echo $cartaLike->id ?>)" class="boton w-100" id="btnDetalles">Ver Platillo</button </div>
                    </div>
                </div>
            <?php endforeach; ?>
    </section>

    <section class="container my-5">
        <h2 class="nombre-seccion mb-5">Descubre nuestros nuevos productos</h2>
        <div class="gridCards">
            <?php foreach ($cartasId as $cartaId) : ?>
                    <div class="card carta-width">
                        <img src="/../pictures/<?php echo $cartaId->foto ?>" class="card-img-top carta-height" alt="<?php echo $cartaId->nombre ?>">
                        <div class="card-body">
                            <h3 class="card-title fw-bold"><?php echo $cartaId->nombre ?></h3>
                            <p class="card-text text-danger fs-3">$<?php echo $cartaId->precio ?></p>
                            <button type="button" onclick="validarComprar(<?php echo $cartaId->id ?>)" class="boton w-100" id="btnDetalles">Ver Platillo</button </div>
                        </div>
                    </div>
            <?php endforeach; ?>
        </div>
    </section>

<?php else : ?>
    <section class="container my-5">
        <h1 class="nombre-seccion mb-5"><?php echo $categoria ?></h1>
        <div class="gridCards">
            <?php foreach ($cartasCategoria as $cartaCategoria) : ?>
                    <div class="card carta-wCategoriath">
                        <img src="/../pictures/<?php echo $cartaCategoria->foto ?>" class="card-img-top carta-height" alt="<?php echo $cartaCategoria->nombre ?>">
                        <div class="card-body">
                            <h3 class="card-title fw-bold"><?php echo $cartaCategoria->nombre ?></h3>
                            <p class="card-text text-danger fs-3">$<?php echo $cartaCategoria->precio ?></p>
                            <button type="button" onclick="validarComprar(<?php echo $cartaCategoria->id ?>)" class="boton w-100" id="btnDetalles">Ver Platillo</button </div>
                        </div>
                    </div>
            <?php endforeach; ?>
        </div>
    </section>
<?php endif; ?>

<?php $script = "<script src='/build/js/app.js'></script>"; ?>

<?php include_once __DIR__ . '/../templates/footer-user.php' ?>