<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Actualizar préstamo del ejemplar "<?= $prestamo->idejemplar ?>" - <?= APP_TITLE ?></title>
    <link rel="stylesheet" type="text/css" href="/css/estilo.css">
</head>

<body>
    <h1>Actualizar préstamo</h1>
    <?php include '../views/components/menu.php'; ?>
    <?php include '../views/components/login.php'; ?>

    <h2>Formulario de edición</h2>
    <?= empty($GLOBALS['success']) ? "" : "<p style='color:#060'>" . $GLOBALS['success'] . "</p>" ?>
    <?= empty($GLOBALS['error']) ? "" : "<p style='color:#600'>" . $GLOBALS['error'] . "</p>" ?>
    
    <p>Devolución del préstamo del ejemplar con ID <?=$prestamo->idejemplar?> del socio <?=$socio->nombre . ' ' . $socio->apellidos?></p>
    <form method="post" action="/prestamo/update">
        <input type="hidden" name="id" value="<?= $prestamo->id ?>">

        <label>Fecha límite</label>
        <input type="date" name="limite" value="<?= $prestamo->limite ?>"><br>

        <input type="submit" name="actualizar" value="Actualizar">
    </form>
    <a href="/socio/show/<?= $socio->id ?>">Atrás</a>
</body>

</html>