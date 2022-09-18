<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Nuevo usuario - <?= APP_TITLE ?></title>

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
                <p class="font-weight-bold">Nuevo usuario</p>
            </div>

            <div class="charts">
                <div class="charts-card">
                    <p class="chart-title">Datos del usuario</p>
                    <div>
                        <form method="post" action="/usuario/store">
                            <label>Usuario</label>
                            <input class="full-width" type="text" name="usuario"><br>
                            <label>Contraseña</label>
                            <input class="full-width" type="password" name="clave"><br>
                            <label>Nombre</label>
                            <input class="full-width" type="text" name="nombre"><br>
                            <label>Primer apellido</label>
                            <input class="full-width" type="text" name="apellido1"><br>
                            <label>Segundo apellido</label>
                            <input class="full-width" type="text" name="apellido2"><br>
                            <label>Correo electrónico</label>
                            <input class="full-width" type="email" name="email"><br>

                            <h3>Operaciones solo para el admin</h3>
                            <label>Privilegio</label>
                            <input class="full-width" type="number" min="0" max="9999" name="privilegio" value="0"><br>
                            <input type="checkbox" id="administrador" name="administrador">
                            <label for="administrador">Dar permisos de administrador</label><br>

                            <input type="submit" name="guardar" value="Guardar">
                        </form>
                    </div>
                </div>

                <div class="charts-card">
                    <a class="nav-link" href="/usuario/list">Volver al listado</a>
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