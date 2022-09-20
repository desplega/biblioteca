<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Lista de socios - <?= APP_TITLE ?></title>

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
                <p class="font-weight-bold">Socios de la biblioteca</p>
            </div>

            <div class="charts">
                <div class="charts-card">
                    <div>
                        <form method="post" action="/socio/search">
                            <label>Campo:</label>
                            <select name="campo">
                                <option value="nombre" <?= !empty($campo) && $campo == 'nombre' ? ' selected' : '' ?>>Nombre</option>
                                <option value="apellidos" <?= !empty($campo) && $campo == 'apellidos' ? ' selected' : '' ?>>Apellidos</option>
                                <option value="dni" <?= !empty($campo) && $campo == 'dni' ? ' selected' : '' ?>>DNI</option>
                                <option value="poblacion" <?= !empty($campo) && $campo == 'poblacion' ? ' selected' : '' ?>>Población</option>
                                <option value="telefono" <?= !empty($campo) && $campo == 'telefono' ? ' selected' : '' ?>>Teléfono</option>
                            </select>

                            <label>Valor:</label>
                            <input type="text" name="valor" value="<?= $valor ?? '' ?>">

                            <select name="orden">
                                <option value="nombre" <?= !empty($orden) && $orden == 'nombre' ? ' selected' : '' ?>>Nombre</option>
                                <option value="apellidos" <?= !empty($orden) && $orden == 'apellidos' ? ' selected' : '' ?>>Apellidos</option>
                                <option value="dni" <?= !empty($orden) && $orden == 'dni' ? ' selected' : '' ?>>DNI</option>
                                <option value="poblacion" <?= !empty($orden) && $orden == 'poblacion' ? ' selected' : '' ?>>Población</option>
                                <option value="telefono" <?= !empty($orden) && $orden == 'telefono' ? ' selected' : '' ?>>Teléfono</option>
                            </select>

                            <input type="radio" name="sentido" value="ASC" <?= (empty($sentido) || $sentido == 'ASC') ? ' checked' : '' ?>>
                            <label>Ascendente</label>

                            <input type="radio" name="sentido" value="DESC" <?= (!empty($sentido) && $sentido == 'DESC') ? ' checked' : '' ?>>
                            <label>Descendente</label>

                            <input type="submit" name="buscar" value="Buscar">
                        </form>
                        <br>
                        <a class="cursor-pointer" href="/socio">Quitar filtros</a><br><br>
                    </div>
                </div>

                <div class="charts-card">
                    <a class="new-button" href="/socio/create">Nuevo socio</a>
                    <div>
                        <table border="1">
                            <tr>
                                <th>DNI</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Población</th>
                                <th>Operaciones</th>
                            </tr>
                            <?php
                            foreach ($socios as $socio) {
                                echo "<tr>";
                                echo "<td>$socio->dni</td>";
                                echo "<td>$socio->nombre</td>";
                                echo "<td>$socio->apellidos</td>";
                                echo "<td>$socio->poblacion</td>";
                                echo "<td class='options'>";
                                echo " <a class='cursor-pointer' href='/socio/show/$socio->id'><span class='material-icons-outlined'>visibility</span></a>";
                                echo " <a class='cursor-pointer' href='/socio/edit/$socio->id'><span class='material-icons-outlined'>edit</span></a>";
                                echo " <a class='cursor-pointer' href='/socio/delete/$socio->id'><span class='material-icons-outlined'>delete</span></a>";
                                echo " &nbsp;&nbsp;<a class='cursor-pointer' href='/prestamo/create/$socio->id'>Nuevo Préstamo</a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </table>
                    </div>
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