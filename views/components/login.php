<div>
    <?php
    $identificado = Login::get();
    if ($identificado) {
        echo "Hola ";
        echo "<a href='/usuario/show/$identificado->id'>$identificado->nombre</a>";
        echo " | <a href='/login/logout'>Salir</a>";
    } else {
        echo "<a href='/login'>Identificarse</a>";
    }
    ?>
</div>