<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Nuevo ejemplar - <?= APP_TITLE ?></title>
    <link rel="stylesheet" type="text/css" href="/css/estilo.css">
</head>

<body>
    <h1>Nuevo ejemplar</h1>
    <?php include '../views/components/menu.php'; ?>

    <h2>Nuevo ejemplar</h2>
    <p>Vas a crear un nuevo ejemplar del libro <?= $libro->titulo ?></p>
    <form method="post" action="/ejemplar/store">
        <input type="hidden" name="idlibro" value="<?=$libro->id?>">
        <label>Año</label>
        <input type="number" name="anyo"><br>
        <label>Edición</label>
        <input type="number" name="edicion"><br>
        <label>Precio</label>
        <input type="number" min="0" step="0.01" name="precio"><br>

        <input type="submit" name="guardar" value="Guardar">
    </form>
    <a href="/libro/edit/<?=$libro->id?>">Volver a detalles de "<?=$libro->titulo?>"</a>

</body>

</html>