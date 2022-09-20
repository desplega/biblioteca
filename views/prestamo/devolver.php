<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Confirmar devolución del ejemplar "<?= $prestamo->idejemplar ?>" - <?= APP_TITLE ?></title>

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
                <p class="font-weight-bold">Confirmar devolución</p>
            </div>

            <div class="main-cards">
                <div class="card card-blue">
                    <div class="card-inner">
                        <p class="text-primary"><?= $GLOBALS['success-title'] ?? 'CONFIRMACIÓN' ?></p>
                        <span class="material-icons-outlined text-blue">warning</span>
                    </div>
                    <span class="text-primary font-weight-bold">
                        <form method="post" action="/prestamo/mark">
                            <p>Marcar el préstamo del ejemplar con ID <?= $prestamo->idejemplar ?> como devuelto.</p>

                            <input type="hidden" name="idprestamo" value="<?= $prestamo->id ?>">
                            <input type="submit" name="devolver" value="Devolver">
                        </form>
                    </span>
                </div>
            </div>

            <div class="charts">
                <div class="charts-card">
                    <a class="nav-link" href="/socio/show/<?= $prestamo->idsocio ?>">Atrás</a>
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