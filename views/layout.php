<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alitas Legendarias - <?php echo $title ?? '' ?></title>
    <meta name="description" content="E-commerce for the restaurant Alitas Legendarias">
    <link rel="icon" type="image/png" href="/build/img/Logo.png">
    <!--CSS - Bootstrap-->
    <link rel="preload" href="/build/css/bootstrap.min.css" as="style">
    <link rel="stylesheet" href="/build/css/bootstrap.min.css">
    <!-- Fonts Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <!--CSS -->
    <link rel="preload" href="/build/css/app.css" as="style">
    <link rel="stylesheet" href="/build/css/app.css">
    <?php if(isset($title)): ?>
        <?php if ($title == 'Galería') : ?>
            <!-- Swipper -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
        <?php endif; ?>
        <?php if ($title == 'Home') : ?>
            <!-- leaflet -->
            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
        <?php endif; ?>
    <?php endif; ?>
</head>

<body>

    <!-- En esta pequeña variable se encuentra TODO el despapaye -->
    <?php echo $contenido; ?>

    <?php
    if (!str_contains($_SERVER['PATH_INFO'] ?? '/', 'admin')) : ?>
        <div class="whatsapp">
            <div class="dropdown">
                <a href="" type="button" id="dropdownWhatsApp" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="/build/img/whatsapp.svg" alt="WhatsApp">
                </a>
                <div class="dropdown-menu border-3">
                    <form class="px-4 py-3 whatsapp-form">
                        <div class="mb-3 fs-3">
                            <label for="mensaje" class="form-label fw-bold">Escribe tu mensaje</label>
                            <textarea class="form-control fs-3 resize-none" id="mensaje" placeholder="Escribe tu mensaje">Hola, me gustaría realizar una orden</textarea>
                        </div>
                        <a href="https://api.whatsapp.com/send?phone=528116884646&text=Hola,%20me%20gustaría%20realizar%20una%20orden" target="_blank" class="boton fs-3 m-0">Enviar</a>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>


    <!--JS - Bootstrap-->
    <script src="/build/js/bootstrap.bundle.min.js"></script>
    <?php if ($title == 'Home') : ?>
        <!-- leaflet -->
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <?php endif; ?>
    <?php echo $script ?? ''; ?>
</body>

</html>