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
    <?php include '../views/components/login.php'; ?>

    <h2>Lista de socios</h2>

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
            <option value="nombre" <?= !empty($campo) && $campo == 'nombre' ? ' selected' : '' ?>>Nombre</option>
            <option value="apellidos" <?= !empty($campo) && $campo == 'apellidos' ? ' selected' : '' ?>>Apellidos</option>
            <option value="dni" <?= !empty($campo) && $campo == 'dni' ? ' selected' : '' ?>>DNI</option>
            <option value="poblacion" <?= !empty($campo) && $campo == 'poblacion' ? ' selected' : '' ?>>Población</option>
            <option value="telefono" <?= !empty($campo) && $campo == 'telefono' ? ' selected' : '' ?>>Teléfono</option>
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