<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Nuevo tema - <?= APP_TITLE ?></title>
    <link rel="stylesheet" type="text/css" href="/css/estilo.css">
</head>

<body>
    <h1>Nuevo tema</h1>
    <?php include '../views/components/menu.php'; ?>

    <h2>Nuevo tema</h2>
    <form method="post" action="/tema/store">
        <label>Tema</label>
        <input type="text" name="tema"><br>
        <label>Descripción</label>
        <input type="text" name="descripcion"><br>

        <input type="submit" name="guardar" value="Guardar">
    </form>
    <a href="/tema/list">Volver al listado</a>

</body>

</html>