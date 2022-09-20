<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Biblioteca</title>

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
                <p class="font-weight-bold">APLICACIÓN BIBLIOTECA</p>
            </div>

            <div class="charts">
                <div class="charts-card">
                    <p class="chart-title">Bienvenid@ a nuestra aplicación</p>
                    <div>
                        <p>Esta es una aplicación de prueba para comprender el MVC.</p>
                        <img class="welcome" src="/images/trinity-college.jpg"/>
                        <p><b>Instrucciones</b></p>
                        <p>Como <b>Socio</b>, sin logearte, puedes ver un listado de los libros de los que disponemos en nuestra fantástica biblioteca.</p>
                        <p>Deberás logearte como <b>Bibliotecario</b> para acceder a la lista de temas, socios y gestionar préstamos.</p>
                        <p>También puedes entrar como <b>Administrador</b> para, además, gestionar los usuarios.</p>
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
    <script src="js/scripts.js"></script>
</body>

</html>