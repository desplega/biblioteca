<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Detalles del libro "<?= $libro->titulo ?>" - <?= APP_TITLE ?></title>
    <link rel="stylesheet" type="text/css" href="/css/estilo.css">
</head>

<body>
    <h1>Detalles</h1>
    <?php include '../views/components/menu.php'; ?>
    <?php include '../views/components/login.php'; ?>

    <h2>Detalles del libro</h2>
    <h3><?= $libro->titulo ?></h3>

    <p><b>ISBN:</b> <?= $libro->isbn ?></p>
    <p><b>Título:</b> <?= $libro->titulo ?></p>
    <p><b>Editorial:</b> <?= $libro->editorial ?></p>
    <p><b>Autor:</b> <?= $libro->autor ?></p>
    <p><b>Idioma:</b> <?= $libro->idioma ?></p>
    <p><b>Ediciones:</b> <?= $libro->ediciones ?></p>
    <p><b>Edad Recomendada:</b> <?= $libro->edadrecomendada ?></p>

    <h2>Temas del libro</h2>
    <?php
    if ($temas) {
        echo '<ul>';
        foreach ($temas as $tema) {
            echo "<li>$tema</li>";
        }
        echo '</ul>';
    } else {
        echo '<p>No hay temas asociados a este libro.</p>';
    }
    ?>

    <h2>Ejemplares</h2>
    <?php
    if ($ejemplares) {
        echo '<ul>';
        foreach ($ejemplares as $ejemplar) {
            echo "<li>$ejemplar</li>";
        }
        echo '</ul>';
    } else {
        echo '<p>No hay ejemplares de este libro</p>';
    }
    ?>

    <?php
    if (Login::isAdmin() || Login::hasPrivilege(500)) {
        echo "<a href='/libro/edit/$libro->id'>Editar libro</a>";
        echo "<a href='/libro/delete/$libro->id'>Borrar libro</a>";
    }
    ?>
    <a href="/libro/list">Lista de libros</a>
</body>

</html>