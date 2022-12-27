<?php include_once __DIR__ . '/../templates/header-admin.php' ?>

<section class="container">
    <h1 class="nombre-pagina"><?php echo $title ?></h1>

    <div class="inventario-header my-5">
        <div>
            <a href="/admin/inventario/crear" class="boton-Pendiente">Crear Nuevo Producto</a>
        </div>
        <div>
            <form action="/admin/inventario" method="post" class="formulario-buscador">
                <input type="text" name="producto" id="producto" placeholder="Escribe algun producto" value="<?php echo $productoBuscador ?? ''; ?>">
                <input type="submit" value="Buscar" class="boton">
            </form>
        </div>
    </div>
    <?php if (!empty($productos)) : ?>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <tr class="text-center fs-4">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Foto</th>
                    <th>Inventario</th>
                </tr>
                <?php foreach ($productos as $producto) : ?>
                    <tr class="text-center fs-4">
                        <td>
                            <?php echo $producto->id; ?>
                        </td>
                        <td>
                            <?php echo $producto->nombre; ?>
                        </td>
                        <td>
                            <?php echo $producto->categoria; ?>
                        </td>
                        <td>
                            <?php echo $producto->descripcion; ?>
                        </td>
                        <td>$<?php echo $producto->precio; ?></td>
                        <td>
                            <img src="/pictures/<?php echo $producto->foto; ?>" alt="<?php echo $producto->foto; ?>" width="150" height="100">
                        </td>
                        <td>
                            <?php echo $producto->inventario; ?>
                        </td>
                        <td class="d-flex justify-content-center">
                            <a href="/admin/inventario/actualizar?id=<?php echo $producto->id; ?>" class="boton-Pendiente">Actualizar</a>
                        </td>
                        <td class="d-flex justify-content-center">
                            <button type="submit" class="boton m-0 mt-md-2" onclick="eliminarProducto(<?php echo $producto->id; ?>)" >Eliminar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <?php else : ?>
        <h2 class='nombre-seccion text-center mt-5'>No hay ningun producto en el inventario</h2>
    <?php endif; ?>
</section>

<?php $script = "<script src='/build/js/app.js'></script>"; ?>

<?php include_once __DIR__ . '/../templates/footer-admin.php' ?>