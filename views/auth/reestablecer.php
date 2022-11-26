<?php include_once __DIR__ . '/../templates/header-user.php' ?>

<section class="container my-5 contenidoFlex">
    <h1 class="nombre-pagina">Recuperar Password</h1>
    <p class="descripcion-pagina">Coloca tu nuevo password a continuación</p>
    <?php include_once __DIR__ . '/../templates/alertas.php'; ?>
    <?php if ($mostrar) : ?>
        <!-- El formulario no tiene action ya que al momento de enviar por POST se pierde el token en la url -->
        <form method="post" class="formulario">
            <div class="campo">
                <label for="password">Password:</label>
                <input type="password" id="password" placeholder="Tu nuevo password" name="password">
            </div>
            <span><?php if(isset($alertasInput['password'])) echo "* " . $alertasInput['password']; ?></span>
            <span><?php if(isset($alertasInput['passwordCaracter'])) echo "* " . $alertasInput['passwordCaracter']; ?></span>

            <div class="campo">
                <label for="password2">Repite tu Password:</label>
                <input type="password" id="password2" placeholder="Reescribir tu Password" name="password2">
            </div>
            <span><?php if(isset($alertasInput['password2'])) echo "* " . $alertasInput['password2']; ?></span>
            <span><?php if(isset($alertasInput['passwordDiferentes'])) echo "* " . $alertasInput['passwordDiferentes']; ?></span>
            
            <div class="campo">
                <input type="submit" value="Guardar Password" class="boton">
            </div>
        </form>
    <?php endif; ?>
</section>

<?php include_once __DIR__ . '/../templates/footer-user.php' ?>