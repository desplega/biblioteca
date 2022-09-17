<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de libros - <?= APP_TITLE ?></title>
    <link rel="stylesheet" type="text/css" href="/css/estilo.css">
</head>

<body>
    <h1>Libros de la biblioteca</h1>
    <?php include '../views/components/menu.php'; ?>
    <?php include '../views/components/login.php'; ?>

    <h2>Lista de libros</h2>

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

    <a href="/libro">Quitar filtros</a><br><br>

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
            echo "<td>";
            echo " <a href='/libro/show/$libro->id'>V</a>";
            if (Login::isAdmin() || Login::hasPrivilege(500)) {
                echo " - <a href='/libro/edit/$libro->id'>E</a>";
                echo " - <a href='/libro/delete/$libro->id'>B</a>";
            }
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>