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
    <?php if (count($pedidos) === 0) : ?>
        <h2 class='nombre-seccion text-center mt-5'>No hay pedidos en este día</h2>
    <?php else : 
        ?>
        <?php foreach ($pedidos as $pedido) : ?>
            <div class="pedidos">
                <h3>Datos del Cliente:</h3>
                <p>Numero de Pedido: <span><?php echo $pedido->id; ?></span></p>

                <div class="datosClientes">
                    <p>Hora: <span><?php echo $pedido->hora; ?></span></p>
                    <p>Cliente: <span><?php echo $pedido->usuario; ?></span></p>
                    <p>Email: <span><?php echo $pedido->email; ?></span></p>
                    <p>Telefono: <span><?php echo $pedido->telefono; ?></span></p>
                </div>

                <div class="table-responsive table-striped table-hover">
                    <h3 class="mb-3">Pedido(s):</h3>
                    <table class="table">
                        <tr class="text-center fs-4 logoRojo">
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                            <th></th>
                            <th></th>
                        </tr>

                        <!-- <php 
                            $total = $pedido->total;
                        ?> -->

                        <tr class="text-center fs-4">
                            <td><?php echo $pedido->producto; ?></td>
                            <td>$<?php echo $pedido->precio; ?></td>
                            <td><?php echo $pedido->cantidad; ?></td>
                            <td>$<?php echo $pedido->total; ?></td>
                            <td class="d-flex justify-content-center">
                                <button type="submit" class="boton-<?php echo $pedido->estatus; ?> m-0 mt-md-2" onclick="cambiarEstatus(<?php echo $pedido->id; ?>, '<?php echo $pedido->estatus; ?>')"><?php echo $pedido->estatus; ?></button>
                            </td>
                            <td class="d-flex justify-content-center">
                                <button type="submit" class="boton m-0 mt-md-2" onclick="eliminarOrden(<?php echo $pedido->id; ?>)">Eliminar</button>
                            </td>
                        </tr>

                    </table>
                </div>
                
                <!-- <p class="total">Total: <span>$<php echo $total; ?></span></p> -->
            </div>

        <?php endforeach; ?>

    <?php endif; ?>

</section>

<?php $script = "<script src='/build/js/app.js'></script>"; ?>
<?php $script .= "<script src='/build/js/buscador.js'></script>"; ?>

<?php include_once __DIR__ . '/../templates/footer-admin.php' ?>