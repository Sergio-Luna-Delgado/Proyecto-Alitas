<div class="campo">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" placeholder="Nombre del producto" name="nombre" value="<?php echo s($producto->nombre); ?>">
</div>
<span><?php if (isset($alertasInput['nombre'])) echo "* " . $alertasInput['nombre']; ?></span>

<div class="campo">
    <label for="categoria">Categoria:</label>
    <select name="categoria" id="categoria">
        <option <?php echo s($producto->categoria) === 'Alitas' ? 'selected' : ''; ?> value="Alitas">Alitas</option>
        <option <?php echo s($producto->categoria) === 'Boneless' ? 'selected' : ''; ?> value="Boneless">Boneless</option>
        <option <?php echo s($producto->categoria) === 'Papas' ? 'selected' : ''; ?> value="Papas">Papas</option>
        <option <?php echo s($producto->categoria) === 'Combos Legendarios' ? 'selected' : ''; ?> value="Combos Legendarios">Combos Legendarios</option>
    </select>
</div>

<div class="campo">
    <label for="descripcion">Descripción</label>
    <input type="text" id="descripcion" placeholder="Que ingredientes lleva ..." name="descripcion" value="<?php echo s($producto->descripcion); ?>">
</div>
<span><?php if (isset($alertasInput['descripcion'])) echo "* " . $alertasInput['descripcion']; ?></span>

<div class="campo">
    <label for="precio">Precio:</label>
    <input type="number" id="precio" placeholder="$" name="precio" step="0.01" value="<?php echo s($producto->precio); ?>">
</div>
<span><?php if (isset($alertasInput['precio'])) echo "* " . $alertasInput['precio']; ?></span>
<span><?php if (isset($alertasInput['precioNumero'])) echo "* " . $alertasInput['precioNumero']; ?></span>

<div class="campo">
    <label for="foto">Foto:</label>
    <input type="file" id="foto" name="foto" value="<?php echo s($producto->foto); ?>">
</div>
<span><?php if (isset($alertasInput['foto'])) echo "* " . $alertasInput['foto']; ?></span>
<span><?php if (isset($alertasInput['noFormato'])) echo "* " . $alertasInput['noFormato']; ?></span>

<?php if ($actualizar) : ?>
    <div class="campo mt-5">
        <img src="/pictures/<?php echo $producto->foto ?>" alt="Foto del producto">
    </div>
<?php endif ?>

<div class="campo">
    <label for="inventario">Inventario:</label>
    <input type="number" id="inventario" placeholder="Cantidad" name="inventario" value="<?php echo s($producto->inventario); ?>">
</div>
<span><?php if (isset($alertasInput['inventario'])) echo "* " . $alertasInput['inventario']; ?></span>
<span><?php if (isset($alertasInput['inventarioNumero'])) echo "* " . $alertasInput['inventarioNumero']; ?></span>

<?php if ($actualizar) : ?>
    <div class="campo">
        <input type="submit" value="Actualizar Producto" class="boton mt-5">
    </div>
<?php else : ?>
    <div class="campo">
        <input type="submit" value="Crear Producto" class="boton mt-5">
    </div>
<?php endif; ?>

<div class="campo">
    <div class="hrTexto">
        <span>O</span>
    </div>
</div>

<div class="campo">
    <a href="/admin/inventario">Regresar al listado del inventario</a>
</div>