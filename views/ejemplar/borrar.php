<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Confirmar borrado de "<?= $ejemplar->id ?>" - <?= APP_TITLE ?></title>

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
                <p class="font-weight-bold">Borrado de ejemplar</p>
            </div>

            <div class="main-cards">
                <div class="card card-orange">
                    <div class="card-inner">
                        <p class="text-primary"><?= $GLOBALS['success-title'] ?? '¡AVISO!' ?></p>
                        <span class="material-icons-outlined text-orange">warning</span>
                    </div>
                    <span class="text-primary font-weight-bold">
                        <p>Estás a punto de borrar el ejemplar con ID <?= $ejemplar->id ?> del libro "<?= $libro->titulo ?>".</p>
                        <p>Se trata de un ejemplar de la edición número <?= $ejemplar->edicion ?> del año <?= $ejemplar->anyo ?>, que ha costado <?= $ejemplar->precio ?>€.</p>

                        <form method="post" action="/ejemplar/destroy">
                            <p>Confirmar el borrado del ejemplar</p>

                            <input type="hidden" name="id" value="<?= $ejemplar->id ?>">
                            <input type="hidden" name="idlibro" value="<?= $libro->id ?>">
                            <input type="submit" name="borrar" value="Borrar">
                        </form>
                    </span>
                </div>
            </div>

            <div class="charts">
                <div class="charts-card">
                    <a class="nav-link" href="/libro/edit/<?= $libro->id ?>">Atrás</a>
                </div>
            </div>

            <?php
            include '../views/components/footer.php';
            ?>
        </main>
        <!-- End Main -->

    </div>

    <!-- Custom JS -->
    <script src="/js/scripts.js"></script>
</body>

</html>