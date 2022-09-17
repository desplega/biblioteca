<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de usuarios - <?= APP_TITLE ?></title>
    <link rel="stylesheet" type="text/css" href="/css/estilo.css">
</head>

<body>
    <h1>Usuarios de la biblioteca</h1>
    <?php include '../views/components/menu.php'; ?>

    <h2>Lista de usuarios</h2>
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
            echo "<td>";
            echo " <a href='/usuario/show/$usuario->id'>V</a>";
            echo " - <a href='/usuario/edit/$usuario->id'>E</a>";
            echo " - <a href='/usuario/delete/$usuario->id'>B</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>