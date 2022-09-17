<a href="/">Inicio</a>
<ul>
    <li><a href="/libro">Lista de libros</a></li>
    <?php
    if (Login::isAdmin() || Login::hasPrivilege(500))
        echo '<li><a href="/libro/create">Nuevo libro</a></li>';
    ?>
</ul>

<?php
if (Login::isAdmin() || Login::hasPrivilege(500)) {
?>
    <ul>
        <li><a href="/socio">Lista de socios</a></li>
        <li><a href="/socio/create">Nuevo socio</a></li>
    </ul>

    <ul>
        <li><a href="/tema">Lista de temas</a></li>
        <li><a href="/tema/create">Nuevo tema</a></li>
    </ul>
<?php
}
if (Login::isAdmin()) {
?>
    <ul>
        <li><a href="/usuario">Lista de usuarios</a></li>
        <li><a href="/usuario/create">Nuevo usuario</a></li>
    </ul>
<?php
}
