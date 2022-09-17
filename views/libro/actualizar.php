<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Actualizar libro "<?= $libro->titulo ?>" - <?= APP_TITLE ?></title>
    <link rel="stylesheet" type="text/css" href="/css/estilo.css">
</head>

<body>
    <h1>Actualizar libro</h1>
    <h2><?= $libro->titulo ?></h2>
    <?php include '../views/components/menu.php'; ?>
    <?php include '../views/components/login.php'; ?>

    <h2>Formulario de edición</h2>
    <?= empty($GLOBALS['success']) ? "" : "<p style='color:#060'>" . $GLOBALS['success'] . "</p>" ?>
    <?= empty($GLOBALS['error']) ? "" : "<p style='color:#600'>" . $GLOBALS['error'] . "</p>" ?>

    <form method="post" action="/libro/update">
        <input type="hidden" name="id" value="<?= $libro->id ?>">

        <label>ISBN</label>
        <input type="text" name="isbn" value="<?= $libro->isbn ?>"><br>
        <label>Título</label>
        <input type="text" name="titulo" value="<?= $libro->titulo ?>"><br>
        <label>Editorial</label>
        <input type="text" name="editorial" value="<?= $libro->editorial ?>"><br>
        <label>Autor</label>
        <input type="text" name="autor" value="<?= $libro->autor ?>"><br>
        <label>Idioma</label>
        <input type="text" name="idioma" value="<?= $libro->idioma ?>"><br>
        <label>Ediciones</label>
        <input type="number" min="0" name="ediciones" value="<?= $libro->ediciones ?>"><br>
        <label>Edad</label>
        <input type="number" min="0" max="99" name="edadrecomendada" value="<?= $libro->edadrecomendada ?>"><br>

        <input type="submit" name="actualizar" value="Actualizar">
    </form>

    <h2>Ejemplares</h2>
    <a href="/ejemplar/create/<?= $libro->id ?>">Nuevo ejemplar</a>
    <?php
    if ($ejemplares) {
        echo '<ul>';
        foreach ($ejemplares as $ejemplar) {
            echo "<li>$ejemplar <a href='/ejemplar/delete/$ejemplar->id'>Borrar</a></li>";
        }
        echo '</ul>';
    } else {
        echo '<p>No tenemos ejemplares de este libro.</p>';
    }
    ?>

    <h2>Temas del libro</h2>
    <?php
    if ($lista_temas) {
    ?>
        <form method="POST" action="/libro/addTema">
            <input type="hidden" name="idlibro" value="<?=$libro->id?>">
            <label for="idtema">Selecciona un tema: </label>
            <select name="idtema">
                <?php
                foreach ($lista_temas as $t) {
                    echo "<option value='$t->id'>$t->tema</option>";
                }
                ?>
            </select>
            <input type="submit" name="add" value="Añadir">
        </form>
    <?php
        if ($temas) {
            echo '<ul>';
            foreach ($temas as $tema) {
                echo "<li>$tema";
                echo "<form style='display:inline' method='POST' action='/libro/removeTema'>";
                echo "<input type='hidden' name='idlibro' value='$libro->id'>";
                echo "<input type='hidden' name='idtema' value='$tema->id'>";
                echo "<input type='submit' name='remove' value='Borrar'>";
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

    <a href="/libro/show/<?= $libro->id ?>">Detalles</a>
    <a href="/libro/list">Volver al listado</a>
</body>

</html>