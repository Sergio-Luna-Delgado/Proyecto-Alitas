<?php include_once __DIR__ . '/../templates/header-user.php' ?>

<section class="container my-5">
    <h1 class="nombre-pagina">Coloca tu correo para recuperar tu password</h1>
    <?php include_once __DIR__ . '/../templates/alertas.php'; ?>
    <div class="contenidoFlex">

        <form action="/olvide" method="post" class="formulario">

            <div class="campo">
                <label for="email">Email:</label>
                <input type="email" id="email" placeholder="Tu Email" name="email">
            </div>
            <span><?php if (isset($alertasInput['email'])) echo "* " . $alertasInput['email']; ?></span>
            <span><?php if (isset($alertasInput['NoEmail'])) echo "* " . $alertasInput['NoEmail']; ?></span>

            <div class="campo my-5">
                <input type="submit" value="Enviar Correo" class="boton">
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