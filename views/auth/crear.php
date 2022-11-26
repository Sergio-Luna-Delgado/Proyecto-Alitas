<?php include_once __DIR__ . '/../templates/header-user.php' ?>

<section class="container my-5">
    <h1 class="nombre-pagina">Crea una cuenta para realizar tus ordenes y envios</h1>

    <div class="contenidoFlex">
        <!-- <picture>
            <source src="/build/img/AlitasLegendarias.avif" type="image/avif">
            <source src="/build/img/AlitasLegendarias.webp" type="image/webp">
            <img loading="lazy" src="/build/img/AlitasLegendarias.jpg" alt="Alitas Logo">
        </picture> -->

        <form action="/crear" method="post" class="formulario">
            
            <div class="campo">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" placeholder="Tu nombre" name="nombre" value="<?php echo s($usuario->nombre); ?>">
            </div>
            <span><?php if(isset($alertasInput['nombre'])) echo "* " . $alertasInput['nombre']; ?></span>

            <div class="campo">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" placeholder="Tu apellido" name="apellido" value="<?php echo s($usuario->apellido); ?>">
            </div>
            <span><?php if(isset($alertasInput['apellido'])) echo "* " . $alertasInput['apellido']; ?></span>

            <div class="campo">
                <label for="telefono">Teléfono:</label>
                <input type="number" id="telefono" placeholder="Tu telefono" name="telefono" value="<?php echo s($usuario->telefono); ?>">
            </div>
            <span><?php if(isset($alertasInput['telefono'])) echo "* " . $alertasInput['telefono']; ?></span>

            <div class="campo">
                <label for="email">Email:</label>
                <input type="email" id="email" placeholder="Tu Email" name="email" value="<?php echo s($usuario->email); ?>">
            </div>
            <span><?php if(isset($alertasInput['email'])) echo "* " . $alertasInput['email']; ?></span>
            <span><?php if(isset($alertasInput['nombreExiste'])) echo "* " . $alertasInput['nombreExiste']; ?></span>

            <div class="campo">
                <label for="password">Password:</label>
                <input type="password" id="password" placeholder="Tu Password" name="password">
            </div>
            <span><?php if(isset($alertasInput['password'])) echo "* " . $alertasInput['password']; ?></span>
            <span><?php if(isset($alertasInput['passwordCaracter'])) echo "* " . $alertasInput['passwordCaracter']; ?></span>

            <div class="campo">
                <label for="password2">Repite tu Password:</label>
                <input type="password" id="password2" placeholder="Reescribir tu Password" name="password2">
            </div>
            <span><?php if(isset($alertasInput['password2'])) echo "* " . $alertasInput['password2']; ?></span>
            <span><?php if(isset($alertasInput['passwordDiferentes'])) echo "* " . $alertasInput['passwordDiferentes']; ?></span>

            <div class="campo my-5">
                <input type="submit" value="Crear Cuenta" class="boton">
            </div>

            <div class="campo">
                <div class="hrTexto">
                    <span>O</span>
                </div>
            </div>

            <div class="campo">
                <a href="/login">¿Ya tienes una cuenta?</a>
            </div>
        </form>
    </div>

</section>

<?php include_once __DIR__ . '/../templates/footer-user.php' ?>