<?php include_once __DIR__ . '/../templates/header-user.php' ?>

<section class="container my-5">
    <h1 class="nombre-pagina"><?php echo $title ?></h1>
    <p class="descripcion-pagina">Puedes actualizazr tus datos o cambiar la contraseña si lo deseas</p>

    <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

    <div class="contenidoFlex">

        <form action="/perfil" method="post" class="formulario">

            <div class="campo">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" placeholder="Tu nombre" name="nombre" value="<?php echo s($usuario->nombre); ?>">
            </div>
            <span><?php if (isset($alertasInput['nombre'])) echo "* " . $alertasInput['nombre']; ?></span>

            <div class="campo">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" placeholder="Tu apellido" name="apellido" value="<?php echo s($usuario->apellido); ?>">
            </div>
            <span><?php if (isset($alertasInput['apellido'])) echo "* " . $alertasInput['apellido']; ?></span>

            <div class="campo">
                <label for="telefono">Teléfono:</label>
                <input type="number" id="telefono" placeholder="Tu telefono" name="telefono" value="<?php echo s($usuario->telefono); ?>">
            </div>
            <span><?php if (isset($alertasInput['telefono'])) echo "* " . $alertasInput['telefono']; ?></span>

            <div class="campo">
                <label for="email">Email:</label>
                <input type="email" id="email" placeholder="Tu Email" name="email" value="<?php echo s($usuario->email); ?>">
            </div>
            <span><?php if (isset($alertasInput['email'])) echo "* " . $alertasInput['email']; ?></span>
            <span><?php if (isset($alertasInput['nombreExiste'])) echo "* " . $alertasInput['nombreExiste']; ?></span>

            <div class="campo my-5">
                <input type="submit" value="Guardar Cambios" class="boton">
            </div>

            <div class="campo">
                <div class="hrTexto">
                    <span>O</span>
                </div>
            </div>

            <div class="campo">
                <!-- Button trigger modal -->
                <a href="#" data-bs-toggle="modal" data-bs-target="#passwordModal">Cambiar Contraseña</a>

                <!-- Modal -->
                <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-3 fw-bold" id="passwordModalLabel">Escribe tu password actual y despues escribe el nuevo password</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="formulario">
                                    <div class="campo">
                                        <label for="passwordActual">Actual:</label>
                                        <input type="password" id="passwordActual" placeholder="Tu actual password" name="passwordActual">
                                    </div>
                                    <span><?php if (isset($alertasInput['password'])) echo "* " . $alertasInput['password']; ?></span>
                                    <span><?php if (isset($alertasInput['passwordCaracter'])) echo "* " . $alertasInput['passwordCaracter']; ?></span>
                                    <div class="campo">
                                        <label for="passwordNuevo">Nuevo:</label>
                                        <input type="password" id="passwordNuevo" placeholder="Tu nuevo password" name="passwordNuevo">
                                    </div>
                                    <span><?php if (isset($alertasInput['password2'])) echo "* " . $alertasInput['password2']; ?></span>
                                    <span><?php if (isset($alertasInput['passwordDiferentes'])) echo "* " . $alertasInput['passwordDiferentes']; ?></span>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="boton" onclick="actualizarPasword()">Guardar Cambios</button> <!-- agregar onclick > fetch > ruta api > api  -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</section>

<?php $script = "<script src='/build/js/app.js'></script>"; ?>

<?php include_once __DIR__ . '/../templates/footer-user.php' ?>