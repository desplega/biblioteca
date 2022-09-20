<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Actualizar socio "<?= $socio->nombre . ' ' . $socio->apellidos ?>" - <?= APP_TITLE ?></title>

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
                <p class="font-weight-bold">Actualizar socio</p>
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
                    <p class="chart-title">Datos del socio <?= $socio->nombre . ' ' . $socio->apellidos ?></p>
                    <div>
                        <form method="post" action="/socio/update">
                            <input type="hidden" name="id" value="<?= $socio->id ?>">

                            <label>DNI</label>
                            <input class="full-width" type="text" name="dni" value="<?= $socio->dni ?>"><br>
                            <label>Nombre</label>
                            <input class="full-width" type="text" name="nombre" value="<?= $socio->nombre ?>"><br>
                            <label>Apellidos</label>
                            <input class="full-width" type="text" name="apellidos" value="<?= $socio->apellidos ?>"><br>
                            <label>Fecha de nacimiento</label>
                            <input class="full-width" type="date" name="nacimiento" value="<?= $socio->nacimiento ?>"><br>
                            <label>Correo electrónico</label>
                            <input class="full-width" type="email" name="email" value="<?= $socio->email ?>"><br>
                            <label>Dirección</label>
                            <input class="full-width" type="text" name="direccion" value="<?= $socio->direccion ?>"><br>
                            <label>Código postal</label>
                            <input class="full-width" type="text" name="cp" maxlength="5" value="<?= $socio->cp ?>"><br>
                            <label>Población</label>
                            <input class="full-width" type="text" name="poblacion" value="<?= $socio->poblacion ?>"><br>
                            <label>Provincia</label>
                            <input class="full-width" type="text" name="provincia" value="<?= $socio->provincia ?>"><br>
                            <label>Teléfono</label>
                            <input class="full-width" type="text" name="telefono" value="<?= $socio->telefono ?>"><br>

                            <input type="submit" name="actualizar" value="Actualizar">
                        </form>
                    </div>
                </div>

                <div class="charts-card">
                    <a class="nav-link" href="/socio/show/<?= $socio->id ?>">Detalles</a> | 
                    <a class="nav-link" href="/socio/list">Volver al listado</a>
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