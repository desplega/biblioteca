<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Nuevo usuario - <?= APP_TITLE ?></title>
    <link rel="stylesheet" type="text/css" href="/css/estilo.css">
</head>

<body>
    <h1>Nuevo usuario</h1>
    <?php include '../views/components/menu.php'; ?>
    <?php include '../views/components/login.php'; ?>

    <h2>Nuevo usuario</h2>
    <form method="post" action="/usuario/store">
        <label>Usuario</label>
        <input type="text" name="usuario"><br>
        <label>Contraseña</label>
        <input type="password" name="clave"><br>
        <label>Nombre</label>
        <input type="text" name="nombre"><br>
        <label>Primer apellido</label>
        <input type="text" name="apellido1"><br>
        <label>Segundo apellido</label>
        <input type="text" name="apellido2"><br>
        <label>Correo electrónico</label>
        <input type="email" name="email"><br>

        <h3>Operaciones solo para el admin</h3>
        <label>Privilegio</label>
        <input type="number" min="0" max="9999" name="privilegio" value="0"><br>
        <input type="checkbox" id="administrador" name="administrador">

        <label for="administrador">Dar permisos de administrador</label><br>
        <input type="submit" name="guardar" value="Guardar">
    </form>
    <a href="/usuario/list">Volver al listado</a>

</body>

</html>