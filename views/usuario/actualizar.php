<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Actualizar usuario "<?= $usuario->nombre . ' ' . $usuario->apellido1 ?>" - <?= APP_TITLE ?></title>

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
                <p class="font-weight-bold">Actualizar usuario</p>
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
                    <p class="chart-title">Datos del libro</p>
                    <div>
                        <form method="post" action="/usuario/update">
                            <input type="hidden" name="id" value="<?= $usuario->id ?>">

                            <label>Usuario</label>
                            <input class="full-width" type="text" name="usuario" value="<?= $usuario->usuario ?>"><br>
                            <label>Contraseña</label>
                            <input class="full-width" type="password" name="clave" value="12345678" readonly><br>
                            <label>Nombre</label>
                            <input class="full-width" type="text" name="nombre" value="<?= $usuario->nombre ?>"><br>
                            <label>Primer apellido</label>
                            <input class="full-width" type="text" name="apellido1" value="<?= $usuario->apellido1 ?>"><br>
                            <label>Segundo apellido</label>
                            <input class="full-width" type="text" name="apellido2" value="<?= $usuario->apellido2 ?>"><br>
                            <label>Correo electrónico</label>
                            <input class="full-width" type="email" name="email" value="<?= $usuario->email ?>"><br>

                            <h3>Operaciones solo para el admin</h3>
                            <label>Privilegio</label>
                            <input class="full-width" type="number" min="0" max="9999" name="privilegio" value="<?= $usuario->privilegio ?>"><br>
                            <input type="checkbox" id="administrador" name="administrador" value="1" <?= $usuario->administrador ? "checked" : "" ?>>
                            <label for="administrador">Dar permisos de administrador</label><br>

                            <input type="submit" name="actualizar" value="Actualizar">
                        </form>
                    </div>
                </div>

                <div class="charts-card">
                    <a class="nav-link" href="/usuario/show/<?= $usuario->id ?>">Detalles</a> |
                    <a class="nav-link" href="/usuario/list">Volver al listado</a>
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