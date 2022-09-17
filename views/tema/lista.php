<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de temas - <?= APP_TITLE ?></title>
    <link rel="stylesheet" type="text/css" href="/css/estilo.css">
</head>

<body>
    <h1>Temas de la biblioteca</h1>
    <?php include '../views/components/menu.php'; ?>
    <?php include '../views/components/login.php'; ?>

    <h2>Lista de temas</h2>
    <table border="1">
        <tr>
            <th>Tema</th>
            <th>Descripción</th>
            <th>Operaciones</th>
        </tr>
        <?php
        foreach ($temas as $tema) {
            echo "<tr>";
            echo "<td>$tema->tema</td>";
            echo "<td>$tema->descripcion</td>";
            echo "<td>";
            echo " <a href='/tema/show/$tema->id'>V</a>";
            echo " - <a href='/tema/edit/$tema->id'>E</a>";
            echo " - <a href='/tema/delete/$tema->id'>B</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>