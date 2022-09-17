<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Confirmar borrado de "<?= $libro->titulo ?>" - <?= APP_TITLE ?></title>
    <link rel="stylesheet" type="text/css" href="/css/estilo.css">
</head>

<body>
    <h1>Confirmar borrado</h1>
    <h2><?= $libro->titulo ?></h2>
    <?php include '../views/components/menu.php'; ?>

    <h2>Formulario de confirmación</h2>

    <form method="post" action="/libro/destroy">
        <p style="display:inline">Confirmar el borrado del libro "<?= $libro->titulo ?>"</p>

        <input type="hidden" name="id" value="<?= $libro->id ?>">
        <input type="submit" name="borrar" value="Borrar">
    </form>
    <a href="/libro/list">Volver al listado</a>
</body>

</html>