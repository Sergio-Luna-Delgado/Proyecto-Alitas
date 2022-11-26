<?php include_once __DIR__ . '/../templates/header-user.php' ?>

<section class="container my-5">
    <div class="contenidoFlex">
        <picture>
            <source src="/build/img/AlitasLegendarias.avif" type="image/avif">
            <source src="/build/img/AlitasLegendarias.webp" type="image/webp">
            <img loading="lazy" src="/build/img/AlitasLegendarias.jpg" alt="Alitas Logo">
        </picture>
        <form action="/login" method="post" class="formulario">

            <div class="campo">
                <label for="email">Email:</label>
                <input type="email" id="email" placeholder="Tu Email" name="email" value="<?php echo s($auth->email); ?>">
            </div>
            <span><?php if (isset($alertasInput['email'])) echo "* " . $alertasInput['email']; ?></span>
            <span><?php if (isset($alertasInput['NoEmail'])) echo "* " . $alertasInput['NoEmail']; ?></span>
            <span><?php if (isset($alertasInput['noUsuario'])) echo "* " . $alertasInput['noUsuario']; ?></span>

            <div class="campo">
                <label for="password">Password:</label>
                <input type="password" id="password" placeholder="Tu Password" name="password">
            </div>
            <span><?php if(isset($alertasInput['password'])) echo "* " . $alertasInput['password']; ?></span>
            <span><?php if(isset($alertasInput['noPassword'])) echo "* " . $alertasInput['noPassword']; ?></span>

            <div class="campo my-5">
                <input type="submit" value="Iniciar Sesión" class="boton">
            </div>

            <div class="campo">
                <!-- <a href="/olvide">¿Olvidaste tu password?</a> -->
            </div>

            <div class="campo">
                <div class="hrTexto">
                    <span>O</span>
                </div>
            </div>

            <div class="campo">
                <a href="/crear">Crear una cuenta</a>
            </div>

        </form>
    </div>
</section>

<?php include_once __DIR__ . '/../templates/footer-user.php' ?>