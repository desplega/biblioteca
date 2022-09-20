<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Nuevo préstamo - <?= APP_TITLE ?></title>

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
                <p class="font-weight-bold">Nuevo préstamo</p>
            </div>

            <div class="charts">
                <div class="charts-card">
                    <p class="chart-title">Nuevo préstamo a <?= $socio->nombre . ' ' . $socio->apellidos ?></p>
                    <div>
                        <form method="post" action="/prestamo/store">
                            <input class="full-width" type="hidden" name="idsocio" value="<?= $socio->id ?>">
                            <label for="idejemplar">Introduce el ID del ejemplar</label>
                            <input class="full-width" type="text" name="idejemplar"><br>

                            <input type="submit" name="guardar" value="Guardar">
                        </form>
                    </div>
                </div>

                <div class="charts-card">
                    <a class="nav-link" href="/socio/<?= isset($back_to_show) ? ('show/' . $socio->id) : 'list' ?>">Atrás</a>
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