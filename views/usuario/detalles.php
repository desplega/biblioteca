<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Detalles del usuario "<?= $usuario->nombre . ' ' . $usuario->apellido1 ?>" - <?= APP_TITLE ?></title>
    <link rel="stylesheet" type="text/css" href="/css/estilo.css">
</head>

<body>
    <h1>Detalles</h1>
    <?php include '../views/components/menu.php'; ?>
    <?php include '../views/components/login.php'; ?>

    <h2>Detalles del usuario</h2>
    <?= empty($GLOBALS['success']) ? "" : "<p style='color:#060'>" . $GLOBALS['success'] . "</p>" ?>
    <?= empty($GLOBALS['error']) ? "" : "<p style='color:#600'>" . $GLOBALS['error'] . "</p>" ?>

    <h3><?= $usuario->nombre . ' ' . $usuario->apellido1 ?></h3>

    <p><b>Usuario:</b> <?= $usuario->usuario ?></p>
    <p><b>Clave:</b> ********</p>
    <p><b>Nombre:</b> <?= $usuario->nombre ?></p>
    <p><b>Apellido 1:</b> <?= $usuario->apellido1 ?></p>
    <p><b>Apellido 2:</b> <?= $usuario->apellido2 ?></p>
    <p><b>Privilegio:</b> <?= $usuario->privilegio ?></p>
    <p><b>Administrador:</b> <?= $usuario->administrador ? 'Sí' : 'No' ?></p>
    <p><b>Correo electrónico:</b> <?= $usuario->email ?></p>

    <?php
    if (Login::isAdmin()) {
    ?>
        <a href="/usuario/edit/<?= $usuario->id ?>">Editar usuario</a>
        <a href="/usuario/delete/<?= $usuario->id ?>">Borrar usuario</a>
        <a href="/usuario/list">Lista de usuarios</a>
    <?php
    }
    ?>
</body>

</html>