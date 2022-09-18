<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Nuevo ejemplar - <?= APP_TITLE ?></title>

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
                <p class="font-weight-bold">Nuevo ejemplar</p>
            </div>

            <div class="charts">
                <div class="charts-card">
                    <p class="chart-title">Vas a crear un nuevo ejemplar del libro <?= $libro->titulo ?></p>
                    <div>
                        <form method="post" action="/ejemplar/store">
                            <input type="hidden" name="idlibro" value="<?= $libro->id ?>">
                            <label>Año</label>
                            <input class="full-width" type="number" name="anyo"><br>
                            <label>Edición</label>
                            <input class="full-width" type="number" name="edicion"><br>
                            <label>Precio</label>
                            <input class="full-width" type="number" min="0" step="0.01" name="precio"><br>

                            <input type="submit" name="guardar" value="Guardar">
                        </form>
                    </div>
                </div>

                <div class="charts-card">
                    <a class="nav-link" href="/libro/list">Volver al listado</a>
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