<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de socios - <?= APP_TITLE ?></title>
    <link rel="stylesheet" type="text/css" href="/css/estilo.css">
</head>

<body>
    <h1>Socios de la biblioteca</h1>
    <?php include '../views/components/menu.php'; ?>

    <h2>Lista de socios</h2>
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
            echo "<td>";
            echo " <a href='/socio/show/$socio->id'>V</a>";
            echo " - <a href='/socio/edit/$socio->id'>E</a>";
            echo " - <a href='/socio/delete/$socio->id'>B</a>";
            echo " &nbsp;&nbsp;<a href='/prestamo/create/$socio->id'>Nuevo Préstamo</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>