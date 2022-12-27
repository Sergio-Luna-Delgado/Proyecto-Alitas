<?php include_once __DIR__ . '/../templates/header-user.php' ?>

<section class="container">
    <h1 class="nombre-pagina"><?php echo $title ?></h1>

    <div class="table-responsive table-striped table-hover">
        <table class="table">
            <tr class="text-center fs-4">
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Fecha</th>
            </tr>
            <?php foreach ($pedidos as $pedido) : ?>
                <tr class="text-center fs-4">
                    <td><?php echo $pedido->producto; ?></td>
                    <td>$<?php echo $pedido->precio; ?></td>
                    <td><?php echo $pedido->cantidad; ?></td>
                    <td>$<?php echo $pedido->total; ?></td>
                    <td><?php echo $pedido->estatus; ?></td>
                    <td><?php echo $pedido->fecha; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</section>

<?php include_once __DIR__ . '/../templates/footer-user.php' ?>