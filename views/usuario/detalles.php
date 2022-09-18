<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Detalles del usuario "<?= $usuario->nombre . ' ' . $usuario->apellido1 ?>" - <?= APP_TITLE ?></title>

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
                <p class="font-weight-bold">Detalles del usuario</p>
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
                    <p class="chart-title"><?= $usuario->nombre . ' ' . $usuario->apellido1 ?></p>
                    <div>
                        <p><b>Usuario:</b> <?= $usuario->usuario ?></p>
                        <p><b>Clave:</b> ********</p>
                        <p><b>Nombre:</b> <?= $usuario->nombre ?></p>
                        <p><b>Apellido 1:</b> <?= $usuario->apellido1 ?></p>
                        <p><b>Apellido 2:</b> <?= $usuario->apellido2 ?></p>
                        <p><b>Privilegio:</b> <?= $usuario->privilegio ?></p>
                        <p><b>Administrador:</b> <?= $usuario->administrador ? 'Sí' : 'No' ?></p>
                        <p><b>Correo electrónico:</b> <?= $usuario->email ?></p>
                    </div>
                </div>

                <?php
                if (Login::isAdmin()) {
                ?>
                    <div class="charts-card">
                        <a class="nav-link" href="/usuario/edit/<?= $usuario->id ?>">Editar usuario</a> |
                        <a class="nav-link" href="/usuario/delete/<?= $usuario->id ?>">Borrar usuario</a> |
                        <a class="nav-link" href="/usuario/list">Lista de usuarios</a>
                    </div>
                <?php
                }
                ?>

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