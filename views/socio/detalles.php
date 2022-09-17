<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Detalles del socio "<?= $socio->nombre . ' ' . $socio->apellidos ?>" - <?= APP_TITLE ?></title>
    <link rel="stylesheet" type="text/css" href="/css/estilo.css">
</head>

<body>
    <h1>Detalles</h1>
    <?php include '../views/components/menu.php'; ?>

    <h2>Detalles del socio</h2>
    <?= empty($GLOBALS['success']) ? "" : "<p style='color:#060'>" . $GLOBALS['success'] . "</p>" ?>
    <?= empty($GLOBALS['error']) ? "" : "<p style='color:#600'>" . $GLOBALS['error'] . "</p>" ?>

    <h3><?= $socio->nombre . ' ' . $socio->apellidos ?></h3>

    <p><b>DNI:</b> <?= $socio->dni ?></p>
    <p><b>Nombre:</b> <?= $socio->nombre ?></p>
    <p><b>Apellidos:</b> <?= $socio->apellidos ?></p>
    <p><b>Fecha de nacimiento:</b> <?= date('d-m-Y', strtotime($socio->nacimiento)) ?></p>
    <p><b>Dirección:</b> <?= $socio->direccion ?></p>
    <p><b>Población:</b> <?= $socio->poblacion ?></p>
    <p><b>Código postal:</b> <?= $socio->cp ?></p>
    <p><b>Provincia:</b> <?= $socio->provincia ?></p>
    <p><b>Teléfono:</b> <?= $socio->telefono ?></p>
    <p><b>Email:</b> <?= $socio->email ?></p>
    <p><b>Fecha de alta:</b> <?= date('d-m-Y', strtotime($socio->alta)) ?></p>

    <h2>Préstamos pendientes</h2>

    <?php
    if ($prestamos) {
        echo '<ul>';
        foreach ($prestamos as $p) {
            echo "<li>";
            echo $p;
            echo " <a href='/prestamo/edit/$p->id'>Editar</a>";
            echo " <a href='/prestamo/return/$p->id'>Devolver</a>";
            echo "</li>";
        }
        echo '</ul>';
    } else {
        echo '<p>Este socio no tiene préstamos pendientes de devolución.</p>';
    }
    ?>

    <a href="/prestamo/create/<?= $socio->id ?>">Nuevo préstamo</a>
    <br><br>
    <a href="/socio/edit/<?= $socio->id ?>">Editar socio</a>
    <a href="/socio/delete/<?= $socio->id ?>">Borrar socio</a>
    <a href="/socio/list">Lista de socios</a>
</body>

</html>