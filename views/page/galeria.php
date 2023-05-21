<?php include_once __DIR__ . '/../templates/header-user.php' ?>

<div class="container my-5">
    <h2 class="nombre-seccion mb-5">Sabor visual: descubre nuestros platillos en imágenes</h2>

    <!-- Swiper -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <picture>
                    <source srcset="/build/img/1.avif" type="image/avif">
                    <source srcset="/build/img/1.webp" type="image/webp">
                    <img loading="lazy" src="/build/img/1.png" alt="Galeria 1" class="">
                </picture>
            </div>
            <div class="swiper-slide">
                <picture>
                    <source srcset="/build/img/2.avif" type="image/avif">
                    <source srcset="/build/img/2.webp" type="image/webp">
                    <img loading="lazy" src="/build/img/2.png" alt="Galeria 2" class="">
                </picture>
            </div>
            <div class="swiper-slide">
                <picture>
                    <source srcset="/build/img/3.avif" type="image/avif">
                    <source srcset="/build/img/3.webp" type="image/webp">
                    <img loading="lazy" src="/build/img/3.png" alt="Galeria 3" class="">
                </picture>
            </div>
            <div class="swiper-slide">
                <picture>
                    <source srcset="/build/img/4.avif" type="image/avif">
                    <source srcset="/build/img/4.webp" type="image/webp">
                    <img loading="lazy" src="/build/img/4.png" alt="Galeria 4" class="">
                </picture>
            </div>
            <div class="swiper-slide">
                <picture>
                    <source srcset="/build/img/5.avif" type="image/avif">
                    <source srcset="/build/img/5.webp" type="image/webp">
                    <img loading="lazy" src="/build/img/5.png" alt="Galeria 5" class="">
                </picture>
            </div>
            <div class="swiper-slide">
                <picture>
                    <source srcset="/build/img/6.avif" type="image/avif">
                    <source srcset="/build/img/6.webp" type="image/webp">
                    <img loading="lazy" src="/build/img/6.png" alt="Galeria 6" class="">
                </picture>
            </div>
            <div class="swiper-slide">
                <picture>
                    <source srcset="/build/img/7.avif" type="image/avif">
                    <source srcset="/build/img/7.webp" type="image/webp">
                    <img loading="lazy" src="/build/img/7.png" alt="Galeria 7" class="">
                </picture>
            </div>
            <div class="swiper-slide">
                <picture>
                    <source srcset="/build/img/8.avif" type="image/avif">
                    <source srcset="/build/img/8.webp" type="image/webp">
                    <img loading="lazy" src="/build/img/8.png" alt="Galeria 8" class="">
                </picture>
            </div>
            <div class="swiper-slide">
                <picture>
                    <source srcset="/build/img/9.avif" type="image/avif">
                    <source srcset="/build/img/9.webp" type="image/webp">
                    <img loading="lazy" src="/build/img/9.png" alt="Galeria 9" class="">
                </picture>
            </div>
            <div class="swiper-slide">
                <picture>
                    <source srcset="/build/img/10.avif" type="image/avif">
                    <source srcset="/build/img/10.webp" type="image/webp">
                    <img loading="lazy" src="/build/img/10.png" alt="Galeria 10" class="">
                </picture>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>

<?php
$script = "<script src='https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js'></script>";
$script .= "<script src='/build/js/swiper.js'></script>";
?>

<?php include_once __DIR__ . '/../templates/footer-user.php' ?>