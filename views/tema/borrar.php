<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Confirmar borrado de "<?= $tema->tema ?>" - <?= APP_TITLE ?></title>
    <link rel="stylesheet" type="text/css" href="/css/estilo.css">
</head>

<body>
    <h1>Confirmar borrado</h1>
    <h2><?= $tema->tema ?></h2>
    <?php include '../views/components/menu.php'; ?>
    <?php include '../views/components/login.php'; ?>

    <h2>Formulario de confirmación</h2>

    <form method="post" action="/tema/destroy">
        <p style="display:inline">Confirmar el borrado del tema "<?= $tema->tema ?>"</p>

        <input type="hidden" name="id" value="<?= $tema->id ?>">
        <input type="submit" name="borrar" value="Borrar">
    </form>
    <a href="/tema/list">Volver al listado</a>
</body>

</html>