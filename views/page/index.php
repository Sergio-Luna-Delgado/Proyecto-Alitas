<?php include_once __DIR__ . '/../templates/header-user.php' ?>

<?php if (empty($categoria)) : ?>
    <!-- Carrusel -->
    <section class="container-fluid p-0">
        <div id="Carousel_Menu" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="5000">
                    <picture>
                        <source srcset="build/img/carrusel1.avif" type="image/avif">
                        <source srcset="build/img/carrusel1.webp" type="image/webp">
                        <img class="carrusel-foto" src="build/img/carrusel1.jpg" alt="carrusel 1">
                    </picture>
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <picture>
                        <source srcset="build/img/carrusel2.avif" type="image/avif">
                        <source srcset="build/img/carrusel2.webp" type="image/webp">
                        <img class="carrusel-foto" src="build/img/carrusel2.jpg" alt="carrusel 2">
                    </picture>
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <picture>
                        <source srcset="build/img/carrusel3.avif" type="image/avif">
                        <source srcset="build/img/carrusel3.webp" type="image/webp">
                        <img class="carrusel-foto" src="build/img/carrusel3.jpg" alt="carrusel 3">
                    </picture>
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <picture>
                        <source srcset="build/img/nosotros.avif" type="image/avif">
                        <source srcset="build/img/nosotros.webp" type="image/webp">
                        <img class="carrusel-foto" src="build/img/nosotros.jpg" alt="carrusel 4">
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

    <!-- Bienvenida -->
    <section class="container my-10">
        <h1 class="logoRojo text-center fw-bold display-3 text-uppercase lh-base">Bienvenidos al lugar donde las alitas se vuelven leyendas</h1>
        <p class="text-center fs-3 lh-lg">Somos un restaurante familiar ubicado en la encantadora zona de Santa Catarina, donde el sabor y la calidad se unen para ofrecerte una experiencia culinaria inolvidable. Nos especializamos en la venta de alitas y boneless, preparados con pasión y cuidado para satisfacer hasta el paladar más exigente.</p>
    </section>

    <!-- Mapa -->
    <section class="container my-10">
        <h2 class="nombre-seccion mb-5">Sigue el Sendero del Sabor</h2>
        <div id="mapa" class="" style="height: 45rem;"></div>
    </section>

    <!-- Menú x2 -->
    <section class="container my-10">
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
        <h2 class="nombre-seccion mb-5">Descubre Nuestro Festín Culinario</h2>
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

    <!-- Sobre nosotros -->
    <section class="container my-10">
        <h2 class="nombre-seccion mb-5">Descubre la Leyenda: Quiénes Somos</h2>
        <div class="row align-items-center">
            <div class="col-md-6">
                <picture>
                    <source srcset="/build/img/nosotros.avif" type="image/avif">
                    <source srcset="/build/img/nosotros.webp" type="image/webp">
                    <img loading="lazy" src="/build/img/nosotros.jpg" alt="nosotros" class="img-fluid">
                </picture>
            </div>
            <div class="col-md-6">
                <p class="fs-3 text-justify lh-lg">
                    Somos un restaurante familiar que se especializa en la venta de alitas y boneless en la zona de Santa Catarina. Desde nuestro inicio en el 2020, nos hemos esforzado en ofrecer a nuestros clientes una experiencia única y deliciosa con nuestro menú especializado en alitas de pollo y boneless, preparadas con nuestra mezcla secreta de especias y salsas caseras.
                </p>
                <a href="/nosotros" class="boton fs-3 w-100">Leer Más</a>
            </div>
        </div>
    </section>

    <!-- Galería -->
    <section class="container my-10">
        <h2 class="nombre-seccion mb-5">Delicias Visualmente Apetitosas</h2>
        <div class="row"> <!-- align-items-center -->
            <div class="col-md-4">
                <picture>
                    <source srcset="/build/img/1.avif" type="image/avif">
                    <source srcset="/build/img/1.webp" type="image/webp">
                    <img loading="lazy" src="/build/img/1.png" alt="Galeria 1" class="img-fluid">
                </picture>
            </div>
            <div class="col-md-4">
                <picture>
                    <source srcset="/build/img/2.avif" type="image/avif">
                    <source srcset="/build/img/2.webp" type="image/webp">
                    <img loading="lazy" src="/build/img/2.png" alt="Galeria 2" class="img-fluid">
                </picture>
            </div>
            <div class="col-md-4">
                <picture>
                    <source srcset="/build/img/4.avif" type="image/avif">
                    <source srcset="/build/img/4.webp" type="image/webp">
                    <img loading="lazy" src="/build/img/4.png" alt="Galeria 4" class="img-fluid">
                </picture>
            </div>
        </div>
        <a href="/galeria" class="boton fs-3 mt-5 d-inline-block w-100">Ver Más</a>
    </section>

    <!-- Testimoniales -->
    <section class="container my-10">
        <h2 class="nombre-seccion mb-5">Experiencias Legendarias: Lo que Dicen Nuestros Clientes</h2>
        <div id="Carousel_Testimoniales" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#Carousel_Testimoniales" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#Carousel_Testimoniales" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#Carousel_Testimoniales" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-item active">
                    <div class="testimonio">
                        <div class="testimonio-body">
                            Quiero agradecer a Alitas Legendarias por brindarme una experiencia gastronómica inigualable. Sus alitas son simplemente deliciosas, con una variedad de sabores que me dejaron sin palabras. El ambiente acogedor y el servicio amable hicieron que mi visita fuera aún más memorable. ¡Definitivamente volveré por más!
                        </div>
                        <blockquote class="testimonio-footer">
                            <h3 class="testimonio-h3">- María García</h3>
                        </blockquote>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="testimonio">
                        <div class="testimonio-body">
                            Alitas Legendarias es mi lugar favorito para disfrutar de las mejores alitas. Cada vez que visito el restaurante, soy recibido con una atención excepcional y un ambiente vibrante. Las alitas son irresistibles: crujientes por fuera y jugosas por dentro, con una variedad de salsas que satisfacen todos los gustos. ¡Recomiendo Alitas Legendarias a todos los amantes de las alitas!
                        </div>
                        <blockquote class="testimonio-footer">
                            <h3 class="testimonio-h3">- Juan Morales</h3>
                        </blockquote>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="testimonio">
                        <div class="testimonio-body">
                        Como amante de las alitas, puedo decir con confianza que Alitas Legendarias superó todas mis expectativas. La calidad de los ingredientes y el cuidado en la preparación se reflejan en cada bocado. Además, el personal es amigable y atento, siempre dispuesto a recomendarme nuevas combinaciones de sabores. No puedo esperar para regresar y probar más.
                        </div>
                        <blockquote class="testimonio-footer">
                            <h3 class="testimonio-h3">- Alejandra López</h3>
                        </blockquote>
                    </div>
                </div>
            </div>
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

<?php
$script = "<script src='/build/js/app.js'></script>";
$script .= "<script src='/build/js/mapa.js'></script>";
?>

<?php include_once __DIR__ . '/../templates/footer-user.php' ?>