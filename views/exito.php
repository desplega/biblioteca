<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Bien - <?= APP_TITLE ?></title>

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
        include 'components/header.php';
        include 'components/sidebar.php';
        ?>

        <!-- Main -->
        <main class="main-container">
            <div class="main-title">
                <p class="font-weight-bold">La operación solicitada se ha realizado correctamente</p>
            </div>

            <div class="main-cards">
                <div class="card card-green">
                    <div class="card-inner">
                        <p class="text-primary"><?= $GLOBALS['success-title'] ?? '¡BIEN!' ?></p>
                        <span class="material-icons-outlined text-green">done</span>
                    </div>
                    <span class="text-primary font-weight-bold"><?= $mensaje ?></span>
                </div>
            </div>

            <div class="charts">
                <div class="charts-card">
                    <a class="nav-link" href="/">Volver al inicio</a>
                </div>
            </div>

            <?php
            include 'components/footer.php';
            ?>
        </main>
        <!-- End Main -->

    </div>

    <!-- Custom JS -->
    <script src="/js/scripts.js"></script>
</body>

</html>