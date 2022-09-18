<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Nuevo libro - <?= APP_TITLE ?></title>

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
                <p class="font-weight-bold">Nuevo libro</p>
            </div>

            <div class="charts">
                <div class="charts-card">
                    <p class="chart-title">Datos del libro</p>
                    <div>
                        <form method="post" action="/libro/store">
                            <label>ISBN</label>
                            <input class="full-width" type="text" name="isbn"><br>
                            <label>Título</label>
                            <input class="full-width" type="text" name="titulo"><br>
                            <label>Editorial</label>
                            <input class="full-width" type="text" name="editorial"><br>
                            <label>Autor</label>
                            <input class="full-width" type="text" name="autor"><br>
                            <label>Idioma</label>
                            <input class="full-width" type="text" name="idioma"><br>
                            <label>Ediciones</label>
                            <input class="full-width" type="number" min="0" name="ediciones"><br>
                            <label>Edad</label>
                            <input class="full-width" type="number" min="0" max="99" name="edadrecomendada"><br>
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