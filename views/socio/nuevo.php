<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Nuevo socio - <?= APP_TITLE ?></title>

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
                <p class="font-weight-bold">Nuevo socio</p>
            </div>

            <div class="charts">
                <div class="charts-card">
                    <p class="chart-title">Datos del socio</p>
                    <div>
                        <form method="post" action="/socio/store">
                            <label>DNI</label>
                            <input class="full-width" type="text" name="dni"><br>
                            <label>Nombre</label>
                            <input class="full-width" type="text" name="nombre"><br>
                            <label>Apellidos</label>
                            <input class="full-width" type="text" name="apellidos"><br>
                            <label>Fecha de nacimiento</label>
                            <input class="full-width" type="date" name="nacimiento"><br>
                            <label>Correo electrónico</label>
                            <input class="full-width" type="email" name="email"><br>
                            <label>Dirección</label>
                            <input class="full-width" type="text" name="direccion"><br>
                            <label>Código postal</label>
                            <input class="full-width" type="text" name="cp" maxlength="5"><br>
                            <label>Población</label>
                            <input class="full-width" type="text" name="poblacion"><br>
                            <label>Provincia</label>
                            <input class="full-width" type="text" name="provincia"><br>
                            <label>Teléfono</label>
                            <input class="full-width" type="text" name="telefono"><br>

                            <input type="submit" name="guardar" value="Guardar">
                        </form>
                    </div>
                </div>

                <div class="charts-card">
                    <a class="nav-link" href="/socio/list">Volver al listado</a>
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