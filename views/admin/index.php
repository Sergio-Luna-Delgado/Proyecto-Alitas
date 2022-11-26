<?php include_once __DIR__ . '/../templates/header-admin.php' ?>

<section class="container">
    <h1 class="nombre-pagina"><?php echo $title ?></h1>
    <h2 class="nombre-seccion">Buscar Pedidos</h2>
    <div>
        <form class="formulario">
            <div class="campo">
                <label for="fecha">Fecha</label>
                <input type="date" id="fecha" name="fecha" value="<?php echo $fecha; ?>">
            </div>
        </form>
    </div>
    <?php
    if (count($pedidos) === 0) {
        echo "<h2 class='nombre-seccion text-center mt-5'>No hay pedidos en este día</h2>";
    }
    ?>

    <div id="pedidos-admin">
        <ul class="pedidos">
            <?php
            $idOrden = 0;
            foreach ($pedidos as $key => $pedido) :
                if ($idpedido !== $pedido->id) :
                    $total = 0;
            ?>
                    <li>
                        <h3>Datos del Cliente:</h3>
                        <p>Numero de Pedido: <span><?php echo $pedido->id; ?></span></p>
                        <div class="datosClientes">
                            <p>Hora: <span><?php echo $pedido->hora; ?></span></p>
                            <p>Cliente: <span><?php echo $pedido->usuario; ?></span></p>
                            <p>Email: <span><?php echo $pedido->email; ?></span></p>
                            <p>Telefono: <span><?php echo $pedido->telefono; ?></span></p>
                        </div>
                        <h3>Pedido(s)</h3>
                    </li>
                <?php
                    $idpedido = $pedido->id;
                endif;
                $total += $pedido->precio;
                ?>
                <div class="table-responsive">
                    <table class="table">
                        <tr class="text-center fs-4">
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr class="text-center fs-4">
                            <td><?php echo $pedido->nombre; ?></td>
                            <td>$<?php echo $pedido->precio; ?></td>
                            <td><?php echo $pedido->cantidad; ?></td>
                            <td>$<?php echo $pedido->total; ?></td>
                            <td class="d-flex justify-content-center">
                                <button id="botonEstatus" class="boton-<?php echo $pedido->estatus; ?>"><?php echo $pedido->estatus; ?></button> <!-- pasar id input hidden y una accion input hidden-->
                            </td>
                            <td class="d-flex justify-content-center">
                                <form action="/api/eliminar" method="post">
                                    <input type="hidden" name="id" value="<?php echo $pedido->id; ?>">
                                    <input type="submit" value="Eliminar" class="boton m-0">
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
                <p class="total">Total: <span>$<?php echo $total; ?></span></p>


            <?php endforeach; ?>
        </ul>
    </div>

</section>

<?php $script = "<script src='build/js/buscador.js'></script>"; ?>

<?php include_once __DIR__ . '/../templates/footer-admin.php' ?>