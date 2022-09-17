<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Confirmar borrado de "<?= $socio->nombre . ' ' . $socio->apellidos ?>" - <?= APP_TITLE ?></title>
    <link rel="stylesheet" type="text/css" href="/css/estilo.css">
</head>

<body>
    <h1>Confirmar borrado</h1>
    <h2><?= $socio->nombre . ' ' . $socio->apellidos ?></h2>
    <?php include '../views/components/menu.php'; ?>
    <?php include '../views/components/login.php'; ?>

    <h2>Formulario de confirmación</h2>

    <form method="post" action="/socio/destroy">
        <p style="display:inline">Confirmar el borrado del socio "<?= $socio->nombre . ' ' . $socio->apellidos ?>"</p>

        <input type="hidden" name="id" value="<?= $socio->id ?>">
        <input type="submit" name="borrar" value="Borrar">
    </form>
    <a href="/socio/list">Volver al listado</a>
</body>

</html>