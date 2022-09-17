<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Nuevo préstamo - <?= APP_TITLE ?></title>
    <link rel="stylesheet" type="text/css" href="/css/estilo.css">
</head>

<body>
    <h1>Nuevo préstamo</h1>
    <?php include '../views/components/menu.php'; ?>

    <h2>Nuevo préstamo a <?= $socio->nombre . ' ' . $socio->apellidos ?></h2>
    <form method="post" action="/prestamo/store">
        <input type="hidden" name="idsocio" value="<?= $socio->id ?>">
        <label for="idejemplar">Introduce el ID del ejemplar</label>
        <input type="text" name="idejemplar"><br>

        <input type="submit" name="guardar" value="Guardar">
    </form>
    <?php
    if (isset($back_to_show))
        echo "<a href='/socio/show/$socio->id'>Atrás</a>";
    else
        echo "<a href='/socio/list'>Atrás</a>";
    ?>
</body>

</html>