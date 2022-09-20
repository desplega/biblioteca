<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Login - <?= APP_TITLE ?></title>

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
                <p class="font-weight-bold">Formulario de contacto</p>
            </div>

            <div class="charts">
                <div class="charts-card">
                    <p class="chart-title">Introduce tus datos y tu consulta:</p>
                    <div>
                        <form method="post" action="/contacto/send">
                            <label class="label-block">Correo electrónico</label>
                            <input type="email" name="email" required><br>
                            <label class="label-block">Nombre</label>
                            <input type="text" name="nombre" required><br>
                            <label class="label-block">Asunto</label>
                            <input type="text" name="asunto" required><br>
                            <label class="label-block">Mensaje</label>
                            <textarea name="mensaje" cols="50" required></textarea><br>

                            <input type="submit" name="enviar" value="Enviar">
                        </form>
                    </div>
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