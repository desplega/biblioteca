<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Detalles del tema "<?= $tema->tema ?>" - <?= APP_TITLE ?></title>
    <link rel="stylesheet" type="text/css" href="/css/estilo.css">
</head>

<body>
    <h1>Detalles</h1>
    <?php include '../views/components/menu.php'; ?>
    <?php include '../views/components/login.php'; ?>

    <h2>Detalles del tema</h2>
    <h3><?= $tema->tema ?></h3>

    <p><b>Tema:</b> <?= $tema->tema ?></p>
    <p><b>Descripción:</b> <?= $tema->descripcion ?></p>

    <a href="/tema/edit/<?= $tema->id ?>">Editar tema</a>
    <a href="/tema/delete/<?= $tema->id ?>">Borrar tema</a>
    <a href="/tema/list">Lista de temas</a>
</body>

</html>