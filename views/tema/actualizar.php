<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Actualizar tema "<?= $tema->tema ?>" - <?= APP_TITLE ?></title>
    <link rel="stylesheet" type="text/css" href="/css/estilo.css">
</head>

<body>
    <h1>Actualizar tema</h1>
    <h2><?= $tema->tema ?></h2>
    <?php include '../views/components/menu.php'; ?>
    <?php include '../views/components/login.php'; ?>

    <h2>Formulario de edición</h2>
    <?= empty($GLOBALS['success']) ? "" : "<p style='color:#060'>" . $GLOBALS['success'] . "</p>" ?>
    <?= empty($GLOBALS['error']) ? "" : "<p style='color:#600'>" . $GLOBALS['error'] . "</p>" ?>

    <form method="post" action="/tema/update">
        <input type="hidden" name="id" value="<?= $tema->id ?>">

        <label>Tema</label>
        <input type="text" name="tema" value="<?= $tema->tema ?>"><br>
        <label>Descripción</label>
        <input type="text" name="descripcion" value="<?= $tema->descripcion ?>"><br>

        <input type="submit" name="actualizar" value="Actualizar">
    </form>
    <a href="/tema/show/<?= $tema->id ?>">Detalles</a>
    <a href="/tema/list">Volver al listado</a>
</body>

</html>