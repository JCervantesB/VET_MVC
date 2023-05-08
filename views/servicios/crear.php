<h1 class="nombre-pagina">Crear Servicio</h1>
<p class="descripcion-pagina">Llena todos los campos para agregar nuevos servicios</p>
<?php //include_once __DIR__ . '/../templates/barra.php'; 
include_once __DIR__ . '/../templates/alertas.php'; ?>

<form action="/servicios/crear" method="POST" class="formulario">
    <?php include_once __DIR__ . '/formulario.php'; ?>

    <div class="paginacion">
        <input type="submit" value="Guardar" class="boton">
        <a href="/admin" class="boton">Cancelar</a>
    </div>
</form>
