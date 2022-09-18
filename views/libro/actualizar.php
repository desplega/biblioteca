<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Actualizar libro "<?= $libro->titulo ?>" - <?= APP_TITLE ?></title>

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
                <p class="font-weight-bold">Actualizar libro</p>
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
                        <form method="post" action="/libro/update">
                            <input type="hidden" name="id" value="<?= $libro->id ?>">

                            <label>ISBN</label>
                            <input class="full-width" type="text" name="isbn" value="<?= $libro->isbn ?>"><br>
                            <label>Título</label>
                            <input class="full-width" type="text" name="titulo" value="<?= $libro->titulo ?>"><br>
                            <label>Editorial</label>
                            <input class="full-width" type="text" name="editorial" value="<?= $libro->editorial ?>"><br>
                            <label>Autor</label>
                            <input class="full-width" type="text" name="autor" value="<?= $libro->autor ?>"><br>
                            <label>Idioma</label>
                            <input class="full-width" type="text" name="idioma" value="<?= $libro->idioma ?>"><br>
                            <label>Ediciones</label>
                            <input class="full-width" type="number" min="0" name="ediciones" value="<?= $libro->ediciones ?>"><br>
                            <label>Edad</label>
                            <input class="full-width" type="number" min="0" max="99" name="edadrecomendada" value="<?= $libro->edadrecomendada ?>"><br>

                            <input type="submit" name="actualizar" value="Actualizar">
                        </form>
                    </div>
                </div>

                <div class="charts-card">
                    <p class="chart-title">Temas del libro</p>
                    <?php
                    if ($lista_temas) {
                        if ($temas) {
                            echo '<ul>';
                            foreach ($temas as $tema) {
                                echo "<li>$tema";
                                echo "<form style='display:inline' method='POST' action='/libro/removeTema'>";
                                echo "<input type='hidden' name='idlibro' value='$libro->id'>";
                                echo "<input type='hidden' name='idtema' value='$tema->id'>";
                                echo "<button type='submit' class='cursor-pointer' name='remove' value='Borrar'>";
                                echo "<span class='material-icons-outlined'>delete</span>";
                                echo "</button>";
                                echo "</form>";
                                echo "</li>";
                            }
                            echo '</ul>';
                        } else {
                            echo '<p>No hay temas asociados a este libro.</p>';
                        }
                    } else {
                        echo 'No hay temas disponibles para ser asociados al libro.';
                    }
                    ?>
                    <form method="post" action="/libro/addTema">
                        <input type="hidden" name="idlibro" value="<?= $libro->id ?>">
                        <label for="idtema">Selecciona un tema para añadirlo al libro: </label>
                        <select class="full-width" name="idtema">
                            <?php
                            foreach ($lista_temas as $t) {
                                echo "<option value='$t->id'>$t->tema</option>";
                            }
                            ?>
                        </select>
                        <input class="cursor-pointer" type="submit" name="add" value="Añadir">
                    </form>
                </div>

                <div class="charts-card">
                    <p class="chart-title">Ejemplares</p>
                    <?php
                    if ($ejemplares) {
                        echo '<ul>';
                        foreach ($ejemplares as $ejemplar) {
                            echo "<li>$ejemplar <a class='cursor-pointer' href='/ejemplar/delete/$ejemplar->id'><span class='material-icons-outlined'>delete</span></a></li>";
                        }
                        echo '</ul>';
                    } else {
                        echo '<p>No tenemos ejemplares de este libro.</p>';
                    }
                    ?>
                    <a class="cursor-pointer" href="/ejemplar/create/<?= $libro->id ?>">Nuevo ejemplar</a>
                </div>

                <div class="charts-card">
                    <a class="nav-link" href="/libro/show/<?= $libro->id ?>">Detalles</a> |
                    <a class="nav-link" href="/libro/list">Volver al listado</a>
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