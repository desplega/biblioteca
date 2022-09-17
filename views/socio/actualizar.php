<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Actualizar socio "<?= $socio->nombre . ' ' . $socio->apellidos ?>" - <?= APP_TITLE ?></title>
    <link rel="stylesheet" type="text/css" href="/css/estilo.css">
</head>

<body>
    <h1>Actualizar socio</h1>
    <h2><?= $socio->nombre . ' ' . $socio->apellidos ?></h2>
    <?php include '../views/components/menu.php'; ?>

    <h2>Formulario de edición</h2>
    <?= empty($GLOBALS['success']) ? "" : "<p style='color:#060'>" . $GLOBALS['success'] . "</p>" ?>
    <?= empty($GLOBALS['error']) ? "" : "<p style='color:#600'>" . $GLOBALS['error'] . "</p>" ?>

    <form method="post" action="/socio/update">
        <input type="hidden" name="id" value="<?= $socio->id ?>">

        <label>DNI</label>
        <input type="text" name="dni" value="<?= $socio->dni ?>"><br>
        <label>Nombre</label>
        <input type="text" name="nombre" value="<?= $socio->nombre ?>"><br>
        <label>Apellidos</label>
        <input type="text" name="apellidos" value="<?= $socio->apellidos ?>"><br>
        <label>Fecha de nacimiento</label>
        <input type="date" name="nacimiento" value="<?= $socio->nacimiento ?>"><br>
        <label>Correo electrónico</label>
        <input type="email" name="email" value="<?= $socio->email ?>"><br>
        <label>Dirección</label>
        <input type="text" name="direccion" value="<?= $socio->direccion ?>"><br>
        <label>Código postal</label>
        <input type="text" name="cp" maxlength="5" value="<?= $socio->cp ?>"><br>
        <label>Población</label>
        <input type="text" name="poblacion" value="<?= $socio->poblacion ?>"><br>
        <label>Provincia</label>
        <input type="text" name="provincia" value="<?= $socio->provincia ?>"><br>
        <label>Teléfono</label>
        <input type="text" name="telefono" value="<?= $socio->telefono ?>"><br>

        <input type="submit" name="actualizar" value="Actualizar">
    </form>
    <a href="/socio/show/<?= $socio->id ?>">Detalles</a>
    <a href="/socio/list">Volver al listado</a>
</body>

</html>