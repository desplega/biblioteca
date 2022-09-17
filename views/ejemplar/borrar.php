<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Confirmar borrado de "<?= $ejemplar->id ?>" - <?= APP_TITLE ?></title>
    <link rel="stylesheet" type="text/css" href="/css/estilo.css">
</head>

<body>
    <h1>Borrado de ejemplar</h1>
    <?php include '../views/components/menu.php'; ?>

    <h2>Confirmar borrado</h2>
    <p>Estás a punto de borrar el ejemplar con ID <?= $ejemplar->id ?> del libro "<?= $libro->titulo ?>".</p>
    <p>Se trata de un ejemplar de la edición número <?= $ejemplar->edicion ?> del año <?= $ejemplar->anyo ?>, que ha costado <?= $ejemplar->precio ?>€.</p>

    <form method="post" action="/ejemplar/destroy">
        <p style="display:inline">Confirmar el borrado del ejemplar</p>

        <input type="hidden" name="id" value="<?= $ejemplar->id ?>">
        <input type="hidden" name="idlibro" value="<?= $libro->id ?>">
        <input type="submit" name="borrar" value="Borrar">
    </form>
    <a href="/libro/edit/<?= $libro->id ?>">Atrás</a>
</body>

</html>