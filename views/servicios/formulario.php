<div class="campo">
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" placeholder="Nombre Servicio" name="nombre" value="<?php echo $servicio->nombre; ?>">
</div>

<div class="campo">
    <label for="precio">Precio</label>
    <input type="number" id="precio" step="0.01" min="0" placeholder="Precio Servicio" name="precio" value="<?php echo $servicio->precio; ?>">
</div>
