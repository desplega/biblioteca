<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login - <?= APP_TITLE ?></title>
    <link rel="stylesheet" type="text/css" href="/css/estilo.css">
</head>

<body>
    <h1>Acceso a la aplicación</h1>
    <?php include '../views/components/menu.php'; ?>
    <?php include '../views/components/login.php'; ?>

    <h2>Registro</h2>
    <form method="post" action="/login/login">
        <label>Usuario o email</label>
        <input type="text" name="usuario" required><br>
        <label>Contraseña</label>
        <input type="text" name="clave" required><br>

        <input type="submit" name="identificar" value="Identificarse">
    </form>
    <a href="/tema/list">Volver al listado</a>

</body>

</html>