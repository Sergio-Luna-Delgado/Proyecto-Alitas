<?php include_once __DIR__ . '/../templates/header-user.php' ?>

<section class="container my-5">
    <h1><?php echo $producto->nombre ?></h1>
    <img src="/../pictures/<?php echo $producto->foto ?>" alt="<?php echo $producto->nombre ?>" class="w-50">
    <p class="fs-2">$<?php echo $producto->precio ?></p>
    <p class="fs-2"><?php echo $producto->descripcion ?></p>
</section>

<?php include_once __DIR__ . '/../templates/footer-user.php' ?>