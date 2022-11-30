<?php include_once __DIR__ . '/../templates/header-user.php' ?>

<section class="container">

    <h1 class="nombre-pagina"><?php echo $title ?></h1>

    <?php if (isset($_SESSION['carrito'])) : ?>
        <div class="table-responsive">
            <table class="table">
                <tr class="text-center fs-4">
                    <th>Nombre</th>
                    <th>Foto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th></th>
                </tr>
                <?php
                if (!isset($_SESSION)) {
                    session_start();
                }
                $articulos = $_SESSION['carrito'];
                foreach ($articulos as $articulo) : ?>
                    <tr class="text-center fs-4">
                        <td>
                            <?php echo $articulo['nombre']; ?>
                        </td>
                        <td>
                            <img src="/pictures/<?php echo $articulo['foto']; ?>" alt="<?php echo $articulo['foto']; ?>" width="150" height="100">
                        </td>
                        <td>
                            <?php echo $articulo['precio']; ?>
                        </td>
                        <td>
                            <?php echo $articulo['cantidad']; ?>
                        </td>
                        <td>
                            <?php echo $articulo['total']; ?>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center"><button type="submit" class="boton m-0 mt-md-2" onclick="eliminarProductoCarrito(<?php echo $articulo['id']; ?>)">Eliminar</button></div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php
        $suma = 0;
        foreach ($articulos as $articulo) {
            $suma = $suma + $articulo['total'];
        }
        ?>
        <form id="formularioComprar" class="formulario mt-5">
            <div class="campo">
                <label for="total_compra">Total de la compra:</label>
                <input type="text" name="total_compra" id="total_compra" readonly value="$<?php echo $suma; ?>">
            </div>
            <!-- <input type="submit" class="boton mt-3" value="Confirmar Compra"> -->
        </form>
        <button type="submit" class="boton mt-3" onclick="confirmarCompra()">Confirmar Compra</button>
    <?php else : ?>
        <p class="descripcion-pagina">El carrito esta vacio</p>
        <div class="d-flex justify-content-center"><img src="/build/img/cart.gif" alt="error" class="w-75"></div>
    <?php endif; ?>
</section>

<?php $script = "<script src='/build/js/app.js'></script>"; ?>

<?php include_once __DIR__ . '/../templates/footer-user.php' ?>