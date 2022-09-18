<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Detalles del socio "<?= $socio->nombre . ' ' . $socio->apellidos ?>" - <?= APP_TITLE ?></title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/styles.css">
</head>

<body>
    <div class="grid-container">

        <?php
        include '../views/components/header.php';
        include '../views/components/sidebar.php';
        ?>

        <!-- Main -->
        <main class="main-container">
            <div class="main-title">
                <p class="font-weight-bold">Detalles del socio</p>
            </div>

            <?php
            if (!empty($GLOBALS['success']) || !empty($GLOBALS['error'])) {
            ?>
                <div class="main-cards">
                    <?php
                    if (!empty($GLOBALS['success'])) {
                    ?>
                        <div class="card card-green">
                            <div class="card-inner">
                                <p class="text-primary"><?= $GLOBALS['success-title'] ?? '¡BIEN!' ?></p>
                                <span class="material-icons-outlined text-green">done</span>
                            </div>
                            <span class="text-primary font-weight-bold"><?= $GLOBALS['success'] ?></span>
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    if (!empty($GLOBALS['error'])) {
                    ?>
                        <div class="card card-red">
                            <div class="card-inner">
                                <p class="text-primary"><?= $GLOBALS['success-title'] ?? '¡ERROR!' ?></p>
                                <span class="material-icons-outlined text-red">error</span>
                            </div>
                            <span class="text-primary font-weight-bold"><?= $GLOBALS['error'] ?></span>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            <?php
            }
            ?>

            <div class="charts">
                <div class="charts-card">
                    <p class="chart-title"><?= $socio->nombre . ' ' . $socio->apellidos ?></p>
                    <div>
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
                    </div>
                </div>

                <div class="charts-card">
                    <p class="chart-title">Préstamos pendientes</p>
                    <?php
                    if ($prestamos) {
                        echo '<ul>';
                        foreach ($prestamos as $p) {
                            echo "<li>";
                            echo $p;
                            echo " <a class='cursor-pointer' href='/prestamo/edit/$p->id'><span class='material-icons-outlined'>edit</span></a>";
                            echo " <a class='cursor-pointer' href='/prestamo/return/$p->id'><span class='material-icons-outlined'>keyboard_return</span></a>";
                            echo "</li>";
                        }
                        echo '</ul>';
                    } else {
                        echo '<p>Este socio no tiene préstamos pendientes de devolución.</p>';
                    }
                    ?>

                    <a class="cursor-pointer" href="/prestamo/create/<?= $socio->id ?>">Nuevo préstamo</a>
                </div>

                <div class="charts-card">
                    <a class="nav-link" href="/socio/edit/<?= $socio->id ?>">Editar socio</a> |
                    <a class="nav-link" href="/socio/delete/<?= $socio->id ?>">Borrar socio</a> |
                    <a class="nav-link" href="/socio/list">Lista de socios</a>
                </div>
            </div>

            <div class="footer-centered">
                <p>Aplicación Biblioteca <?= date('Y') ?></p>
                <p>Marcel@CIFO Sabadell</p>
            </div>
        </main>
        <!-- End Main -->

    </div>

    <!-- Custom JS -->
    <script src="/js/scripts.js"></script>
</body>

</html>