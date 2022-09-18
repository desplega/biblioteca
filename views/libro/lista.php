<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Lista de libros - <?= APP_TITLE ?></title>

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
                <p class="font-weight-bold">Libros de la biblioteca</p>
            </div>

            <div class="charts">
                <div class="charts-card">
                    <div>
                        <form method="post" action="/libro/search">
                            <label>Campo:</label>
                            <select name="campo">
                                <option value="titulo" <?= !empty($campo) && $campo == 'titulo' ? ' selected' : '' ?>>Título</option>
                                <option value="isbn" <?= !empty($campo) && $campo == 'isbn' ? ' selected' : '' ?>>ISBN</option>
                                <option value="editorial" <?= !empty($campo) && $campo == 'editorial' ? ' selected' : '' ?>>Editorial</option>
                                <option value="autor" <?= !empty($campo) && $campo == 'autor' ? ' selected' : '' ?>>Autor</option>
                            </select>

                            <label>Valor:</label>
                            <input type="text" name="valor" value="<?= $valor ?? '' ?>">

                            <select name="orden">
                                <option value="titulo" <?= !empty($campo) && $campo == 'titulo' ? ' selected' : '' ?>>Título</option>
                                <option value="isbn" <?= !empty($campo) && $campo == 'isbn' ? ' selected' : '' ?>>ISBN</option>
                                <option value="editorial" <?= !empty($campo) && $campo == 'editorial' ? ' selected' : '' ?>>Editorial</option>
                                <option value="autor" <?= !empty($campo) && $campo == 'autor' ? ' selected' : '' ?>>Autor</option>
                            </select>

                            <input type="radio" name="sentido" value="ASC" <?= (empty($sentido) || $sentido == 'ASC') ? ' checked' : '' ?>>
                            <label>Ascendente</label>

                            <input type="radio" name="sentido" value="DESC" <?= (!empty($sentido) && $sentido == 'DESC') ? ' checked' : '' ?>>
                            <label>Descendente</label>

                            <input type="submit" name="buscar" value="Buscar">
                        </form>
                        <br>
                        <a class="cursor-pointer" href="/libro">Quitar filtros</a><br><br>
                    </div>
                </div>

                <div class="charts-card">
                    <?php
                    if (Login::isAdmin() || Login::hasPrivilege(500))
                        echo "<a class='new-button' href='/libro/create'>Nuevo libro</a>";
                    ?>
                    <div>
                        <table border="1">
                            <tr>
                                <th>Título</th>
                                <th>Autor</th>
                                <th>Editorial</th>
                                <th>Operaciones</th>
                            </tr>
                            <?php
                            foreach ($libros as $libro) {
                                echo "<tr>";
                                echo "<td>$libro->titulo</td>";
                                echo "<td>$libro->autor</td>";
                                echo "<td>$libro->editorial</td>";
                                echo "<td class='options'>";
                                echo " <a class='nav-link' href='/libro/show/$libro->id'><span class='material-icons-outlined'>visibility</span></a>";
                                if (Login::isAdmin() || Login::hasPrivilege(500)) {
                                    echo " <a class='nav-link' href='/libro/edit/$libro->id'><span class='material-icons-outlined'>edit</span></a>";
                                    echo " <a class='nav-link' href='/libro/delete/$libro->id'><span class='material-icons-outlined'>delete</span></a>";
                                }
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