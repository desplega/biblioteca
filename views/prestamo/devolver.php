<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Confirmar devolución del ejemplar "<?= $prestamo->idejemplar ?>" - <?= APP_TITLE ?></title>
    <link rel="stylesheet" type="text/css" href="/css/estilo.css">
</head>

<body>
    <h1>Confirmar devolución</h1>
    <?php include '../views/components/menu.php'; ?>
    <?php include '../views/components/login.php'; ?>

    <h2>Confirmar devolución del ejemplar con ID <?= $prestamo->idejemplar?></h2>

    <form method="post" action="/prestamo/mark">
        <p style="display:inline">Marcar el préstamo del ejemplar con ID <?= $prestamo->idejemplar ?> como devuelto.</p>

        <input type="hidden" name="idprestamo" value="<?= $prestamo->id ?>">
        <input type="submit" name="devolver" value="Devolver">
    </form>
    <a href="/socio/show/<?=$prestamo->idsocio?>">Atrás</a>
</body>

</html>