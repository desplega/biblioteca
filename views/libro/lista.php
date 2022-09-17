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

    <h2>Lista de libros</h2>
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
            echo " - <a href='/libro/edit/$libro->id'>E</a>";
            echo " - <a href='/libro/delete/$libro->id'>B</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>