<!-- Header -->
<header class="header">
    <div class="menu-icon" onclick="openSidebar()">
        <span class="material-icons-outlined">menu</span>
    </div>
    <div class="header-left">
        <?php
        $identificado = Login::get();
        if ($identificado) {
            echo '<span class="material-icons-outlined">account_circle</span>';
            echo "Hola, ";
            echo "<a class='cursor-pointer' href='/usuario/show/$identificado->id'>$identificado->nombre</a>";
        }
        ?>
    </div>
    <div class="header-right">
        <?php
        if ($identificado)
            echo '<a href="/login/logout"><span class="material-icons-outlined cursor-pointer">logout</span></a>';
        else
            echo '<a href="/login"><span class="material-icons-outlined cursor-pointer">login</span></a>';
        ?>
    </div>
</header>
<!-- End Header -->