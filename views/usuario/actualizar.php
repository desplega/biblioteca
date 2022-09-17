<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Actualizar usuario "<?= $usuario->nombre . ' ' . $usuario->apellido1 ?>" - <?= APP_TITLE ?></title>
    <link rel="stylesheet" type="text/css" href="/css/estilo.css">
</head>

<body>
    <h1>Actualizar usuario</h1>
    <h2><?= $usuario->nombre . ' ' . $usuario->apellido1 ?></h2>
    <?php include '../views/components/menu.php'; ?>
    <?php include '../views/components/login.php'; ?>

    <h2>Formulario de edición</h2>
    <?= empty($GLOBALS['success']) ? "" : "<p style='color:#060'>" . $GLOBALS['success'] . "</p>" ?>
    <?= empty($GLOBALS['error']) ? "" : "<p style='color:#600'>" . $GLOBALS['error'] . "</p>" ?>

    <form method="post" action="/usuario/update">
        <input type="hidden" name="id" value="<?= $usuario->id ?>">

        <label>Usuario</label>
        <input type="text" name="usuario" value="<?= $usuario->usuario ?>"><br>
        <label>Contraseña</label>
        <input type="password" name="clave" value="12345678" readonly><br>
        <label>Nombre</label>
        <input type="text" name="nombre" value="<?= $usuario->nombre ?>"><br>
        <label>Primer apellido</label>
        <input type="text" name="apellido1" value="<?= $usuario->apellido1 ?>"><br>
        <label>Segundo apellido</label>
        <input type="text" name="apellido2" value="<?= $usuario->apellido2 ?>"><br>
        <label>Correo electrónico</label>
        <input type="email" name="email" value="<?= $usuario->email ?>"><br>

        <h3>Operaciones solo para el admin</h3>
        <label>Privilegio</label>
        <input type="number" min="0" max="9999" name="privilegio" value="<?= $usuario->privilegio ?>"><br>
        <input type="checkbox" id="administrador" name="administrador" value="1" <?= $usuario->administrador ? "checked" : ""?>>
        <label for="administrador">Dar permisos de administrador</label><br>

        <input type="submit" name="actualizar" value="Actualizar">
    </form>
    <a href="/usuario/show/<?= $usuario->id ?>">Detalles</a>
    <a href="/usuario/list">Volver al listado</a>
</body>

</html>