<?php include_once __DIR__ . '/../templates/header-user.php' ?>

<section class="container my-5">
    <div class="contendorPlatillo mb-5">
        <div>
            <h1 class="tituloDesktop"><?php echo $producto->nombre ?></h1>
            <p>Platillos disponibles: <span><?php echo $producto->inventario ?></span></p>
            <p class="fw-bold fs-1"><span>$<?php echo $producto->precio ?></span></p>
            <form method="post" class="formulario">
                <label for="cantidad">Selecciona la cantidad</label>
                <div class="campo">
                    <select name="cantidad" id="cantidad">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <span><?php if(isset($alertasInput['cantidad'])) echo "* " . $alertasInput['cantidad']; ?></span>
                <div class="campo my-5">
                    <input type="submit" value="Agregar al Carrito" class="boton w-100 px-md-0">
                </div>
            </form>
        </div>
        <div>
            <h1 class="tituloMobile"><?php echo $producto->nombre ?></h1>
            <img src="/../pictures/<?php echo $producto->foto ?>" alt="<?php echo $producto->nombre ?>">
        </div>
    </div>
    <hr>
    <div class="d-flex flex-column text-center">
        <h2 class="fs-1 fw-bold mt-5">Descripción del Platillo:</h2>
        <p class="fs-2"><?php echo $producto->descripcion ?></p>
    </div>
</section>

<?php include_once __DIR__ . '/../templates/footer-user.php' ?>