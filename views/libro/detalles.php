<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Detalles del libro "<?= $libro->titulo ?>" - <?= APP_TITLE ?></title>

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
                <p class="font-weight-bold">Detalles del libro</p>
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
                    <p class="chart-title"><?= $libro->titulo ?></p>
                    <div>
                        <p><b>ISBN:</b> <?= $libro->isbn ?></p>
                        <p><b>Título:</b> <?= $libro->titulo ?></p>
                        <p><b>Editorial:</b> <?= $libro->editorial ?></p>
                        <p><b>Autor:</b> <?= $libro->autor ?></p>
                        <p><b>Idioma:</b> <?= $libro->idioma ?></p>
                        <p><b>Ediciones:</b> <?= $libro->ediciones ?></p>
                        <p><b>Edad Recomendada:</b> <?= $libro->edadrecomendada ?></p>
                    </div>
                </div>

                <div class="charts-card">
                    <p class="chart-title">Temas del libro</p>
                    <?php
                    if ($temas) {
                        echo '<ul>';
                        foreach ($temas as $tema) {
                            echo "<li>$tema</li>";
                        }
                        echo '</ul>';
                    } else {
                        echo '<p>No hay temas asociados a este libro.</p>';
                    }
                    ?>
                </div>


                <div class="charts-card">
                    <p class="chart-title">Ejemplares</p>
                    <?php
                    if ($ejemplares) {
                        echo '<ul>';
                        foreach ($ejemplares as $ejemplar) {
                            echo "<li>$ejemplar</li>";
                        }
                        echo '</ul>';
                    } else {
                        echo '<p>No hay ejemplares de este libro</p>';
                    }
                    ?>
                </div>

                <div class="charts-card">
                <?php
                    if (Login::isAdmin() || Login::hasPrivilege(500)) {
                        echo "<a class='nav-link' href='/libro/edit/$libro->id'>Editar libro</a> | ";
                        echo "<a class='nav-link' href='/libro/delete/$libro->id'>Borrar libro</a> | ";
                    }
                    ?>
                    <a class="nav-link" href="/libro/list">Lista de libros</a>
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