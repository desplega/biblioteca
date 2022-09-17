<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Nuevo socio - <?= APP_TITLE ?></title>
    <link rel="stylesheet" type="text/css" href="/css/estilo.css">
</head>

<body>
    <h1>Nuevo socio</h1>
    <?php include '../views/components/menu.php'; ?>
    <?php include '../views/components/login.php'; ?>

    <h2>Nuevo socio</h2>
    <form method="post" action="/socio/store">
        <label>DNI</label>
        <input type="text" name="dni"><br>
        <label>Nombre</label>
        <input type="text" name="nombre"><br>
        <label>Apellidos</label>
        <input type="text" name="apellidos"><br>
        <label>Fecha de nacimiento</label>
        <input type="date" name="nacimiento"><br>
        <label>Correo electrónico</label>
        <input type="email" name="email"><br>
        <label>Dirección</label>
        <input type="text" name="direccion"><br>
        <label>Código postal</label>
        <input type="text" name="cp" maxlength="5"><br>
        <label>Población</label>
        <input type="text" name="poblacion"><br>
        <label>Provincia</label>
        <input type="text" name="provincia"><br>
        <label>Teléfono</label>
        <input type="text" name="telefono"><br>

        <input type="submit" name="guardar" value="Guardar">
    </form>
    <a href="/socio/list">Volver al listado</a>

</body>

</html>