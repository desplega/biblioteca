<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Nuevo libro - <?= APP_TITLE ?></title>
    <link rel="stylesheet" type="text/css" href="/css/estilo.css">
</head>

<body>
    <h1>Nuevo libro</h1>
    <?php include '../views/components/menu.php'; ?>

    <h2>Nuevo libro</h2>
    <form method="post" action="/libro/store">
        <label>ISBN</label>
        <input type="text" name="isbn"><br>
        <label>Título</label>
        <input type="text" name="titulo"><br>
        <label>Editorial</label>
        <input type="text" name="editorial"><br>
        <label>Autor</label>
        <input type="text" name="autor"><br>
        <label>Idioma</label>
        <input type="text" name="idioma"><br>
        <label>Ediciones</label>
        <input type="number" min="0" name="ediciones"><br>
        <label>Edad</label>
        <input type="number" min="0" max="99" name="edadrecomendada"><br>
        <input type="submit" name="guardar" value="Guardar">
    </form>
    <a href="/libro/list">Volver al listado</a>

</body>

</html>