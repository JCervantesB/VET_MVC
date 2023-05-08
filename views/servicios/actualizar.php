<h1 class="nombre-pagina">Actualizar Servico</h1>
<p class="descripcion-pagina">Modifica los valores del formulario</p>
<?php
include_once __DIR__ . '/../templates/alertas.php'; ?>

<form  method="POST" class="formulario">
    <?php include_once __DIR__ . '/formulario.php'; ?>

    <div class="paginacion">
        <input type="submit" value="Actualizar" class="boton">
        <a href="/servicios" class="boton">Cancelar</a>
    </div>
</form>