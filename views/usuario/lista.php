<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Lista de usuarios - <?= APP_TITLE ?></title>

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
                <p class="font-weight-bold">Usuarios de la biblioteca</p>
            </div>

            <div class="charts">
                <div class="charts-card">
                    <a class="new-button" href="/usuario/create">Nuevo usuario</a>
                    <div>
                        <table border="1">
                            <tr>
                                <th>Usuario</th>
                                <th>Privilegio</th>
                                <th>Administrador</th>
                                <th>Email</th>
                                <th>Operaciones</th>
                            </tr>
                            <?php
                            foreach ($usuarios as $usuario) {
                                echo "<tr>";
                                echo "<td>$usuario->usuario</td>";
                                echo "<td>$usuario->privilegio</td>";
                                echo "<td>" . ($usuario->administrador ? "Sí" : "No") . "</td>";
                                echo "<td>$usuario->email</td>";
                                echo "<td class='options'>";
                                echo " <a class='cursor-pointer' href='/usuario/show/$usuario->id'><span class='material-icons-outlined'>visibility</span></a>";
                                echo " <a class='cursor-pointer' href='/usuario/edit/$usuario->id'><span class='material-icons-outlined'>edit</span></a>";
                                echo " <a class='cursor-pointer' href='/usuario/delete/$usuario->id'><span class='material-icons-outlined'>delete</span></a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </table>
                    </div>
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